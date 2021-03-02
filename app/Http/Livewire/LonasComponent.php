<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lona;
class LonasComponent extends Component
{
    public $nombre,$lona_id;
    public $text_boton = "Guardar";
    public $editar = FALSE;

    public function render()
    {
        $data['lonas'] = Lona::latest('id')->get();
        return view('livewire.lonas-component',$data);
    }

    public function store(){
        $validatedData = $this->validate();
        Lona::create([
            'nombre' => $this->nombre
        ]);
        $this->reset(['nombre']);
    }

    public function edit(Lona $rol){
        $this->editar = TRUE;
        $this->nombre = $rol->nombre;
        $this->lona_id = $rol->id;
        $this->text_boton = "Actualizar";
    }

    public function update(){
        $validatedData = $this->validate();
        $rol = Lona::find($this->lona_id);
        $rol->update([
            'nombre' => $this->nombre
        ]);
        $this->text_boton = "Guardar";
        $this->reset(['nombre']);
    }


}
