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
use App\Models\Lona;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;

class Pos extends Component{

    public $cart = [];
    public $idp,$nombre,$precio,$importe,$cantidad;
    public $subtotal=0,$iva,$total;
    public $abono;
    public $cliente_search;
    //public $listado_clientes;
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

    public $importe_pagado = 0;
    public $metodo_pago = "efectivo";
    public $facturar = false;
    public $credito = FALSE;
    public $importe_credito=0;

    public $id_venta;
    public $id_user = 1;
    public $id_cliente = null;

    public $mensaje_pago;
    /**
     * LONAS
     */
    public $id_lona=null;
    public $tramos_lonas;
    public $lonasearh;
    public $id_tramos_lonas;
    public $acabados_lonas;
    public $id_acabados_lonas;
    public $precio_calidad_lona;
    public $inputAncho;
    public $inputAlto;
    public $area_1;
    public $optimo_1;
    public $area_2;
    public $optimo_2;
    /**
     * CLICK EN COBRAR SIN CLIENTE OR CART[]
     */
    public $campos_insuficientes = FALSE;
    public $venta_exitosa = FALSE;

    public $tab="";

    public function render(){
        $data['lonas'] = Lona::get();
        if(!empty($this->id_lona)) {
            $this->lonasearh = Lona::find($this->id_lona);
            $this->tramos_lonas = $this->lonasearh->tramos;
            $this->acabados_lonas = $this->lonasearh->acabados;
        }


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
        $data['listado_clientes'] = DB::table('clientes')
            ->select('clientes.*')
            ->where('clientes.nombre','LIKE',"%{$this->cliente_search}%")
            ->orderBy('clientes.created_at', 'desc')
            ->paginate(6);
        return view('livewire.pos',$data);
    }

    public function calcular_lona(){
        $this->area_1 = $this->obtenerArea($this->inputAncho,$this->inputAlto,$this->tramos_lonas);
        //$this->area_2 = $this->obtenerArea($this->inputAlto,$this->tramos_lonas);
        // $this->area_2 = $this->tramos_lonas;
    }

    private function obtenerArea($ancho,$alto,$arrayTramos){
        $tramo = 0;
        $optimo1 = 0;
        $area1 = 0;
        foreach ($arrayTramos as $itemTramo) {
            $tramo = floatval($itemTramo->medida);
            // if (floatval($ancho) <= floatval($tramo)) {
            if ( bccomp(floatval($ancho),$tramo)=== -1) {
                $optimo1 = $tramo;
            }
        }
        $area1 = (floatval($optimo1)) * (floatval($ancho));

        $tramo = 0;
        $optimo2 = 0;
        $area2 = 0;
        foreach ($arrayTramos as $itemTramo) {
            $tramo = floatval($itemTramo->medida);
            // if (floatval($alto) <= floatval($tramo)) {
            if ( bccomp(floatval($alto),$tramo)=== -1) {
                $optimo2 = $tramo;
            }
             
        }
        $area2 = (floatval($optimo2)) * (floatval($alto));

        if (bccomp($area1,$area2)== -1) {
            $msg = "1-a1=".$area1."a2=".$area2."optimo1=".$optimo1."optimo2=".$optimo2."ancho=".$ancho."alto=".$alto;
        }else{
            $msg = "2-a1=".$area1."a2=".$area2."optimo1=".$optimo1."optimo2=".$optimo2."alto=".$alto."ancho=".$ancho;
        }

        return $msg;
        
    }



    // private function obtenerArea($lado,$arrayTramos){
    //     $tramo = 0;
    //     $optimo = 0;
    //     $area = 0;
    //     foreach ($arrayTramos as $itemTramo) {
    //         $tramo = $itemTramo->medida;
    //         if (floatval($lado) <= floatval($tramo)) {
    //             $optimo = $tramo;
    //         }
    //     }
    //     $area = (floatval($optimo)) * (floatval($lado));
    //     $msg=array(
    //         'area' => $area,
    //         'tramo' => $optimo
    //     );
    //     return $msg;
    // }

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

    // public function buscar_cliente(){
    //     $this->validate([
    //         'cliente_search' => 'required'
    //         ]);
    //     $this->listado_clientes = Cliente::where('nombre','like','%'.$this->cliente_search.'%')->get();
    // }

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
        /**
         * VALIDAR CAMPOS REQUERIDOS PARA PROCEDER A GUARDAR VENTA
         */
        $this->tab = "pagar";
        if ($this->id_user !=null && $this->id_cliente !=null && count($this->cart)!=0 && $this->abono != "") {
            DB::transaction(function () {
                $this->id_venta = $this->store_venta($this->id_user,$this->id_cliente,$this->facturar);
                $this->store_detalles($this->id_venta,$this->cart);
                $this->store_abono($this->id_venta,$this->metodo_pago,$this->importe_pagado); 
                if ($this->credito) {
                    $this->store_credito($this->id_venta,$this->importe_credito);
                }
                /**
                 * RESET VALORES
                 */
                $this->campos_insuficientes = FALSE;                
                $this->venta_exitosa = TRUE;
                $this->cliente_seleccionado = "";
                $this->cart = [];
                $this->abono = "";
                $this->subtotal = 0;
                $this->id_cliente = null;
                $this->credito = FALSE;
                $this->setImportePago(0);
            }); 
        }else{
            $this->tab = "pagar";
            $this->campos_insuficientes = TRUE;
            $this->venta_exitosa = FALSE;
        }
               
    }

    public function abonar(){
        if ($this->id_user !=null && $this->id_cliente !=null && count($this->cart)!=0) {
            $this->campos_insuficientes = FALSE;
        }
        $this->tab = "pagar";
        $respuesta = $this->verifica_abono($this->subtotal,$this->abono);
        $this->mensaje_pago = $respuesta['mensaje'];
        $this->setImportePago($respuesta['importe']);
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
                $this->credito = FALSE;
            }else{
                $this->credito = TRUE;
                $falta =  floatval($total)-floatval($abono);
                $this->importe_credito = $falta;
                $msg['mensaje'] = "Saldo pendiente ".number_format($falta,1,'.',',');
                $msg['importe'] = $abono;
            }
        }
        return $msg;
    }

    private function store_venta($user_id,$cliente_id,$factura){
        $venta = new Venta;
        $venta->user_id = $user_id;
        $venta->cliente_id = $cliente_id;
        $venta->factura = $factura;
        $venta->save();
        return $venta->id;
    }

    private function store_abono($venta_id,$metodo,$importe){
        if ($importe > 0) {
            $abono = new Abono;
            $abono->venta_id = $venta_id;
            $abono->metodo = $metodo;
            $abono->importe = $importe;
            $abono->save();
        }
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

    private function store_credito($venta_id,$importe){
        $credito = new Credito;
        $credito->venta_id = $venta_id;
        $credito->importe = $importe;
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
