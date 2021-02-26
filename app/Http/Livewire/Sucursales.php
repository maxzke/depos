<?php

namespace App\Http\Livewire;

use App\Models\Sucursale;
use Livewire\Component;
use Livewire\WithPagination;

class Sucursales extends Component{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $nombre,$sucursal_id;
    public $text_boton = "Guardar";
    public $editar = FALSE;

    public function render(){
        //$data['sucursales'] = Sucursale::latest('id')->get();
        $data['sucursales'] = Sucursale::latest('id')->paginate(3);
        return view('livewire.sucursales',$data);
    }

    public function store(){
        $validatedData = $this->validate();
        Sucursale::create([
            'nombre' => $this->nombre
        ]);
        $this->reset(['nombre']);
    }

    public function edit(Sucursale $sucursal){
        $this->editar = TRUE;
        $this->nombre = $sucursal->nombre;
        $this->sucursal_id = $sucursal->id;
        $this->text_boton = "Actualizar";
    }

    public function update(){
        $validatedData = $this->validate();
        $sucursal = Sucursale::find($this->sucursal_id);
        $sucursal->update([
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
