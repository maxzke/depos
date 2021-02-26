<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;


class RolesComponent extends Component
{
    public $nombre,$role_id;
    public $text_boton = "Guardar";
    public $editar = FALSE;
    
    public function render()
    {
        $data['roles'] = Role::latest('id')->get();
        return view('livewire.roles-component',$data);
    }

    public function store(){
        $validatedData = $this->validate();
        Role::create([
            'nombre' => $this->nombre
        ]);
        $this->reset(['nombre']);
    }

    public function edit(Role $rol){
        $this->editar = TRUE;
        $this->nombre = $rol->nombre;
        $this->role_id = $rol->id;
        $this->text_boton = "Actualizar";
    }

    public function update(){
        $validatedData = $this->validate();
        $rol = Role::find($this->role_id);
        $rol->update([
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
