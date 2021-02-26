<?php

namespace App\Http\Livewire;

use App\Models\Metodo;
use Livewire\Component;


class MetodosComponent extends Component
{

    public $nombre,$metodo_id;
    public $text_boton = "Guardar";
    public $editar = FALSE;
    
    public function render()
    {
        $data['metodos'] = Metodo::latest('id')->get();
        return view('livewire.metodos-component',$data);
    }

    public function store(){
        $validatedData = $this->validate();
        Metodo::create([
            'nombre' => $this->nombre
        ]);
        $this->reset(['nombre']);
    }

    public function edit(Metodo $metodo){
        $this->editar = TRUE;
        $this->nombre = $metodo->nombre;
        $this->metodo_id = $metodo->id;
        $this->text_boton = "Actualizar";
    }

    public function update(){
        $validatedData = $this->validate();
        $metodo = Metodo::find($this->metodo_id);
        $metodo->update([
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
