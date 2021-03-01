<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Pos extends Component{

    public $cart = [];

    public function render(){
        return view('livewire.pos');
    }
}
