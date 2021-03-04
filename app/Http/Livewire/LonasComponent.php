<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lona;
class LonasComponent extends Component
{
    public $nombre,$calidad_360,$calidad_720,$calidad_1024,$calidad_fullhd,$lona_id;
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
            'nombre' => $this->nombre,
            'calidad_360' => $this->calidad_360,
            'calidad_720' => $this->calidad_720,
            'calidad_1024' => $this->calidad_1024,
            'calidad_fullhd' => $this->calidad_fullhd,
        ]);
        $this->reset(['nombre']);
    }

    public function edit(Lona $rol){
        $this->editar = TRUE;
        $this->nombre = $rol->nombre;
        $this->calidad_360 = $rol->calidad_360;
        $this->calidad_720 = $rol->calidad_720;
        $this->calidad_1024 = $rol->calidad_1024;
        $this->calidad_fullhd = $rol->calidad_fullhd;
        $this->lona_id = $rol->id;
        $this->text_boton = "Actualizar";
    }

    public function update(){
        $validatedData = $this->validate();
        $rol = Lona::find($this->lona_id);
        $rol->update([
            'nombre' => $this->nombre,
            'calidad_360' => $this->calidad_360,
            'calidad_720' => $this->calidad_720,
            'calidad_1024' => $this->calidad_1024,
            'calidad_fullhd' => $this->calidad_fullhd
        ]);
        $this->text_boton = "Guardar";
        $this->reset(['nombre']);
    }

    /**
     * DEFINO REGLAS
     */
    protected $rules = [
        'nombre' => ['required','unique:lonas,nombre'],
        'calidad_360' => 'required',
        'calidad_720' => 'required',
        'calidad_1024' => 'required',
        'calidad_fullhd' => 'required'
    ];
    /**
     * pERSONALIZO MENSAJES DE ERROR
     */
    protected $messages = [
        'nombre.required' => 'Debes ingresar un nombre',
        'nombre.unique' => 'El nombre de lona ya se encuentra registrado',
        'calidad_360.required' => 'Debes ingresar un precio para calidad 360',
        'calidad_720.required' => 'Debes ingresar un precio para calidad 720',
        'calidad_1024.required' => 'Debes ingresar un precio para calidad 1024',
        'calidad_fullhd.required' => 'Debes ingresar un precio para calidad fullhd',
    ];


}
