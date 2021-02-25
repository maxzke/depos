<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Sucursales extends Component{

    public $sucursal;

    public function render(){
        return view('livewire.sucursales');
    }

    public function store(){
        $validatedData = $this->validate();
        $this->sucursal = "guardado";
    }


    /**
     * DEFINO REGLAS
     */
    protected $rules = [
        'sucursal' => 'required|min:6'
    ];
    /**
     * pERSONALIZO MENSAJES DE ERROR
     */
    protected $messages = [
        'sucursal.required' => 'Debes ingresar un nombre',
        'sucursal.min' => 'Minimo 6 caracteres',
    ];
}
