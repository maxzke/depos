<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class Pos extends Component{

    public $cart = [];
    public $idp,$nombre,$precio,$importe,$cantidad;
    public $tab="";

    public function render(){
        $this->importe = (intval($this->cantidad))*(intval($this->precio));
        $user = User::find(1);
        $data['users'] = $user->roles;

        $role = Role::find(3);
        $data['roles'] = $role->users;
        $data['productos'] = $this->cart;
        return view('livewire.pos',$data);
    }

    public function addtocart(){
        $this->idp = Str::random(9);
        $this->importe = (floatval($this->cantidad))*(floatval($this->precio));
        $producto = array(
            'id' => $this->idp,
            'nombre'=> $this->nombre,
            'cantidad' =>$this->cantidad, 
            'precio' => $this->precio,
            'importe'=>$this->importe
        );
        array_push($this->cart,$producto);
    }
}
