<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Role;
use App\Models\User;
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
    public $cliente_nombre;
    public $cliente_direccion;
    public $cliente_telefono;
    public $cliente_correo;
    public $cliente_rfc;
    public $cliente_razon_social;

    
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
        $data['productos'] = $this->cart;
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

    public function select_cliente($id){
        
    }

    public function add_cliente(){
        $this->validate([
            'cliente_nombre' => ['required','unique:clientes,nombre']
            ]);
        $cliente = new Cliente;
        $cliente->nombre = $this->cliente_nombre;
        $cliente->telefono = "2818701339";
        $cliente->save();
        $this->cliente_id = $cliente->id;
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
