<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RolesComponent extends Component
{
    public $nombre;
    
    public function render()
    {
        return view('livewire.roles-component');
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
