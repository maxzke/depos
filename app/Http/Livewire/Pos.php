<?php

namespace App\Http\Livewire;

use App\Models\Abono;
use App\Models\Cliente;
use App\Models\Credito;
use App\Models\Detalle;
use App\Models\Factura;
use App\Models\Metodo;
use App\Models\Role;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;

class Pos extends Component{

    public $cart = [];
    public $idp,$nombre,$precio,$importe,$cantidad;
    public $subtotal=0,$iva,$total;
    public $abono;
    public $cliente_search;
    public $listado_clientes;
    /**
     * DATOS CLIENTE
     */
    public $cliente_id = 0;
    public $cliente_seleccionado;
    public $cliente_nombre;
    public $cliente_direccion;
    public $cliente_telefono;
    public $cliente_correo;
    public $cliente_rfc;
    public $cliente_razon_social;

    public $importe_pagado;
    public $metodo_pago = "efectivo";
    public $facturar;

    public $id_venta;
    public $id_user = 1;
    public $id_cliente;

    public $mensaje_pago;

    public $tab="";

    public function render(){
        $this->importe = (floatval($this->cantidad))*(floatval($this->precio));
        /**
         * Prueba de relaciones
         */
        $user = User::find(1);
        $data['users'] = null;
        if ($user) {
            $data['users'] = $user->roles;
        }        
        $role = Role::find(1);
        $data['roles'] = null;
        if ($role) {
            $data['roles'] = $role->users;
        }
        /**
         * Fin Prueba de relaciones
         */
        
        $data['seleccionado'] = $this->cliente_seleccionado;
        $data['productos'] = $this->cart;
        $data['metodos'] = Metodo::get();
        return view('livewire.pos',$data);
    }

    public function addtocart(){
        $this->validate();
        $this->idp = Str::random(9);
        $producto = array(
            'id' => $this->idp,
            'nombre'=> $this->nombre,
            'cantidad' =>$this->cantidad, 
            'precio' => $this->precio,
            'importe'=>$this->importe
        );
        array_push($this->cart,$producto);
        $this->subtotal += $this->importe;
        $this->reset(['nombre','cantidad','precio','importe']);
    }

    public function producto_increment($id){
        $this->subtotal = 0;
        foreach ($this->cart as $key => $v) {
            if ($v['id'] == $id) {
                $v['cantidad'] = floatval($v['cantidad'])+1 ;
                $this->cart[$key]['cantidad'] = floatval($this->cart[$key]['cantidad']) +1;
                $this->cart[$key]['importe'] = floatval($this->cart[$key]['cantidad']) * floatval($this->cart[$key]['precio']);                
            }
            $this->subtotal += $this->cart[$key]['importe'];
        } 
    }
    public function producto_decrement($id){
        $this->subtotal = 0;
        
        foreach ($this->cart as $key => $v) {
            if ($v['id'] == $id) {
                $v['cantidad'] = floatval($v['cantidad'])+1 ;
                $this->cart[$key]['cantidad'] = floatval($this->cart[$key]['cantidad']) -1;
                $this->cart[$key]['importe'] = floatval($this->cart[$key]['cantidad']) * floatval($this->cart[$key]['precio']);                
                /**
                 * Si cantidad < 0 se elimina el producto del array
                 */
                if ($this->cart[$key]['cantidad']<0) {
                    unset($this->cart[$key]);
                }
            }
            if (!empty($this->cart)) {
                $this->subtotal += $this->cart[$key]['importe'];
            }   
        }     
    }

    public function buscar_cliente(){
        $this->validate([
            'cliente_search' => 'required'
            ]);
        $this->listado_clientes = Cliente::where('nombre','like','%'.$this->cliente_search.'%')->get();
    }

    public function set_cliente_buscado($id){
        $this->cliente_seleccionado = Cliente::find($id);   
        $this->id_cliente = $this->cliente_seleccionado->id;     
    }    

    public function add_cliente(){
        $this->validate([
            'cliente_nombre' => ['required','unique:clientes,nombre']
            ]);
        $cliente = new Cliente;
        $cliente->nombre = $this->cliente_nombre;
        $cliente->direccion = $this->cliente_direccion;
        $cliente->telefono = $this->cliente_telefono;
        $cliente->razon_social = $this->cliente_razon_social;
        $cliente->rfc = $this->cliente_rfc;
        $cliente->correo = $this->cliente_correo;
        $cliente->save();
        $this->cliente_id = $cliente->id;
        $this->set_cliente_buscado($this->cliente_id);
        $this->reset(['cliente_nombre','cliente_direccion','cliente_telefono','cliente_razon_social','cliente_rfc','cliente_correo']);
    }

    /**
     * store:
     * Guarda la venta en curso
     * Ventas
     * Detalles
     * Abonos
     * Creditos
     * Pedidos
     * Facturas
     */
    public function store(){
        DB::transaction(function () {
            $this->id_venta = $this->store_venta($this->id_user,$this->id_cliente);
            $this->store_detalles($this->id_venta,$this->cart);
            $this->store_abono($this->id_venta,$this->metodo_pago,$this->importe_pagado); 
        });        
    }

    public function abonar(){
        $this->tab = "pagar";
        $respuesta = $this->verifica_abono($this->subtotal,$this->abono);
        $this->mensaje_pago = $respuesta['mensaje'];
        $this->importe_pagado = $respuesta['importe'];
    }

    private function setImportePago($importe){
        $this->importe_pagado = $importe;
    }

    private function verifica_abono($total,$abono){
        $msg['mensaje'] = "";
        $msg['importe'] = 0;
        if ($total>0) {
            if ($abono>=$total) {
                $cambio = floatval($abono)-floatval($total);
                $msg['mensaje'] = "Su Cambio: ".number_format($cambio,1,'.',',');  
                $msg['importe'] = $total;
            }else{
                $falta =  floatval($total)-floatval($abono);
                $msg['mensaje'] = "Saldo pendiente ".number_format($falta,1,'.',',');
                $msg['importe'] = $abono;
            }
        }
        return $msg;
    }

    private function store_venta($user_id,$cliente_id){
        $venta = new Venta;
        $venta->user_id = $user_id;
        $venta->cliente_id = $cliente_id;
        $venta->save();
        return $venta->id;
    }

    private function store_abono($venta_id,$metodo,$importe){
        $abono = new Abono;
        $abono->venta_id = $venta_id;
        $abono->metodo = $metodo;
        $abono->importe = $importe;
        $abono->save();
    }

    private function store_detalles($venta_id,$productos){        
        foreach ($productos as $producto) {
            $detalle = new Detalle;
            $detalle->venta_id = $venta_id;
            $detalle->etapa_id = 1;
            $detalle->producto = $producto['nombre'];
            $detalle->cantidad = $producto['cantidad'];
            $detalle->precio = $producto['precio'];
            $detalle->importe = $producto['importe'];
            $detalle->save();
        }
    }

    private function store_credito($venta_id){
        $credito = new Credito;
        $credito->venta_id = $venta_id;
        $credito->save();
    }

    private function store_factura($venta_id, $rfc,$correo,$rs){
        $factura = new Factura;
        $factura->venta_id = $venta_id;
        $factura->rfc = $rfc;
        $factura->correo = $correo;
        $factura->razon_social = $rs;
        $factura->save();
    }



/**
     * DEFINO REGLAS
     */
    protected $rules = [
        'nombre' => 'required',
        'cantidad' => 'required',
        'precio' => 'required'
    ];
    /**
     * pERSONALIZO MENSAJES DE ERROR
     */
    protected $messages = [
        'nombre.required' => 'Debes ingresar un producto',
        'cantidad.required' => 'Debes ingresar una cantidad',
        'precio.required' => 'Debes ingresar un precio unitario',
        'cliente_search.required' => 'Debes ingresar un nombre para buscar',
        'cliente_nombre.required' => 'Debes ingresar un nombre de cliente',
        'cliente_nombre.unique' => 'El nombre de cliente ya se encuentra registrado',
    ];




















}//endo f line
