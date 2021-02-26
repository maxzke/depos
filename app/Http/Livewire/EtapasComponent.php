<?php

namespace App\Http\Livewire;

use App\Models\Etapa;
use Livewire\Component;

class EtapasComponent extends Component
{

    public $nombre,$etapa_id;
    public $text_boton = "Guardar";
    public $editar = FALSE;
    
    public function render()
    {
        $data['etapas'] = Etapa::latest('id')->get();
        return view('livewire.etapas-component',$data);
    }

    public function store(){
        $validatedData = $this->validate();
        Etapa::create([
            'nombre' => $this->nombre
        ]);
        $this->reset(['nombre']);
    }

    public function edit(Etapa $etapa){
        $this->editar = TRUE;
        $this->nombre = $etapa->nombre;
        $this->etapa_id = $etapa->id;
        $this->text_boton = "Actualizar";
    }

    public function update(){
        $validatedData = $this->validate();
        $etapa = Etapa::find($this->etapa_id);
        $etapa->update([
            'nombre' => $this->nombre
        ]);
        $this->text_boton = "Guardar";
        $this->reset(['nombre']);
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
