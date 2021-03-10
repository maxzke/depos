<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lona;
use App\Models\Tramo;
use App\Models\Acabado;

class LonasComponent extends Component
{
    public $nombre,$calidad_360,$calidad_720,$calidad_1024,$calidad_fullhd,$lona_id;
    public $text_boton = "Guardar";
    public $editar = FALSE;
    public $check_tramos = [];
    public function render(){
        $data['lonas'] = Lona::latest('id')->get();
        $pertenece = Lona::find(1);
        if ($pertenece) {
            $data['pertenece'] = $pertenece->tramos;
        }else{
            $data['pertenece'] = null;
        }
        
        $data['tramos'] = Tramo::latest('id')->get();
        $data['acabados'] = Acabado::latest('id')->get();
        $data['array_tramos'] = $this->check_tramos;
        return view('livewire.lonas-component',$data);
    }

    public function store(){
        $validatedData = $this->validate();
        $lona = Lona::create([
            'nombre' => $this->nombre,
            'calidad_360' => $this->calidad_360,
            'calidad_720' => $this->calidad_720,
            'calidad_1024' => $this->calidad_1024,
            'calidad_fullhd' => $this->calidad_fullhd,
        ]);
        $lona->id;
        foreach ($this->check_tramos as $key => $value) {
            if($this->check_tramos){
                $lona->tramos()->attach($value);
            }
        }
        $this->reset(['nombre']);
    }

    public function check(Tramo $t){
        $this->check_tramos = $t;
    }

    public function edit(Lona $rol){
        $this->editar = TRUE;
        $this->nombre = $rol->nombre;
        $this->calidad_360 = $rol->calidad_360;
        $this->calidad_720 = $rol->calidad_720;
        $this->calidad_1024 = $rol->calidad_1024;
        $this->calidad_fullhd = $rol->calidad_fullhd;
        // $this->lona_id = $rol->id;
        // $tramos_lona = Lona::find(1);
        //$this->check_tramos = $tramos_lona->tramos;
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
        'calidad_fullhd' => 'required',
        'check_tramos' => 'required',
    ];
    /**
     * pERSONALIZO MENSAJES DE ERROR
     */
    protected $messages = [
        'nombre.required' => 'Debes ingresar un nombre',
        'check_tramos.required' => 'Debes ingresar un tramo',
        'nombre.unique' => 'El nombre de lona ya se encuentra registrado',
        'calidad_360.required' => 'Debes ingresar un precio para calidad 360',
        'calidad_720.required' => 'Debes ingresar un precio para calidad 720',
        'calidad_1024.required' => 'Debes ingresar un precio para calidad 1024',
        'calidad_fullhd.required' => 'Debes ingresar un precio para calidad fullhd',
    ];


}
