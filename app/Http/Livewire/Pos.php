<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class Pos extends Component{

    public $cart = [];
    public $idp,$nombre,$precio,$importe,$cantidad,$abono;
    
    public $tab="";

    public function render(){
        $this->importe = (floatval($this->cantidad))*(floatval($this->precio));
        $user = User::find(1);
        $data['users'] = $user->roles;

        $role = Role::find(1);
        $data['roles'] = $role->users;
        $data['productos'] = $this->cart;
        return view('livewire.pos',$data);
    }

    public function addtocart(){
        $this->idp = Str::random(9);
        $producto = array(
            'id' => $this->idp,
            'nombre'=> $this->nombre,
            'cantidad' =>$this->cantidad, 
            'precio' => $this->precio,
            'importe'=>$this->importe
        );
        array_push($this->cart,$producto);
        $this->reset(['nombre','cantidad','precio','importe']);
    }

    public function producto_increment($id){
        foreach ($this->cart as $key => $v) {
            if ($v['id'] == $id) {
                $v['cantidad'] = intval($v['cantidad'])+1 ;
                $this->cart[$key]['cantidad'] = intval($this->cart[$key]['cantidad']) +1;
                $this->cart[$key]['importe'] = intval($this->cart[$key]['cantidad']) * intval($this->cart[$key]['precio']);                
            }
        } 
    }
    public function producto_decrement($id){
        foreach ($this->cart as $key => $v) {
            if ($v['id'] == $id) {
                $v['cantidad'] = intval($v['cantidad'])+1 ;
                $this->cart[$key]['cantidad'] = intval($this->cart[$key]['cantidad']) -1;
                $this->cart[$key]['importe'] = intval($this->cart[$key]['cantidad']) * intval($this->cart[$key]['precio']);                
                /**
                 * Si cantidad < 0 se elimina el producto del array
                 */
                if ($this->cart[$key]['cantidad']<0) {
                    unset($this->cart[$key]);
                }
            }
        }        
    }






















}
