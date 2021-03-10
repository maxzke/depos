<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tramo;

class TramosComponent extends Component
{
    
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $medida,$tramo_id;
    public $text_boton = "Guardar";
    public $editar = FALSE;

    public function render(){
        $data['tramos'] = Tramo::latest('id')->paginate(3);
        // $data['tramos'] = null;
        // if ( $solicitud != null) {
        //     $data['tramos'] = $solicitud;
        // }
        return view('livewire.tramos-component',$data);
    }

    public function store(){
        $validatedData = $this->validate();
        Tramo::create([
            'medida' => $this->medida
        ]);
        $this->reset(['medida']);
    }

    public function edit(Tramo $tramo){
        $this->editar = TRUE;
        $this->medida = $tramo->medida;
        $this->tramo_id = $tramo->id;
        $this->text_boton = "Actualizar";
    }

    public function update(){
        $validatedData = $this->validate();
        $tramo = Tramo::find($this->tramo_id);
        $tramo->update([
            'medida' => $this->medida
        ]);
        $this->text_boton = "Guardar";
        $this->reset(['medida']);
    }


    /**
     * DEFINO REGLAS
     */
    protected $rules = [
        'medida' => 'required'
    ];
    /**
     * pERSONALIZO MENSAJES DE ERROR
     */
    protected $messages = [
        'medida.required' => 'Debes ingresar un medida'
    ];
}
