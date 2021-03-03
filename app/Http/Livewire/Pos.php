<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class Pos extends Component{

    public $cart = [];

    public function render(){
        
        $user = User::find(1);
        $data['users'] = $user->roles;

        $role = Role::find(2);
        $data['roles'] = $role->users;


        return view('livewire.pos',$data);
    }
}
