<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Sucursales extends Component{

    public $nombre;

    public function render(){
        return view('livewire.sucursales');
    }

    public function store(){
        $validatedData = $this->validate();
        $this->nombre = "guardado";
    }


    /**
     * DEFINO REGLAS
     */
    protected $rules = [
        'nombre' => 'required'
    ];
    /**
     * pERSONALIZO MENSAJES DE ERROR
     */
    protected $messages = [
        'nombre.required' => 'Debes ingresar un nombre'
    ];
}
