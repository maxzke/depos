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
    
    public $tab="";

    public function render(){
        $this->importe = (floatval($this->cantidad))*(floatval($this->precio));
        $user = User::find(1);
        $data['users'] = $user->roles;

        $role = Role::find(3);
        $data['roles'] = $role->users;
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
            $this->subtotal += $this->cart[$key]['importe'];
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
        'cliente_search.required' => 'Debes ingresar un nombre para buscar'
    ];




















}//endo f line
