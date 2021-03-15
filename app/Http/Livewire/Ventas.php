<?php

namespace App\Http\Livewire;

use App\Models\Detalle;
use App\Models\Venta;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Ventas extends Component{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';    
    
    public $tab = "pendientes";

    public $detalles = null;
    public $abonos = null;
    public $search_pendiente;
    public $search_historial;

    public function render(){
        $data['ventas_historial'] = DB::table('ventas')
                        ->join('clientes','ventas.cliente_id','=','clientes.id')
                        ->select('ventas.*','clientes.nombre','clientes.id as id_cliente')
                        ->where('clientes.nombre','LIKE',"%{$this->search_historial}%")
                        ->orderBy('ventas.created_at', 'desc')
                        ->paginate(6);
        // $data['creditos'] = DB::table('creditos')
        //                 ->leftJoin('ventas','ventas.id','=','creditos.venta_id')
        //                 ->join('clientes','ventas.cliente_id','=','clientes.id')
        //             ->select('creditos.venta_id as id','creditos.created_at','creditos.importe','creditos.id as id_credito','clientes.nombre','clientes.id as id_cliente')
        //                 ->get();
        $data['creditos'] = DB::table('ventas')
                        ->join('creditos','ventas.id','=','creditos.venta_id')
                        ->join('clientes','ventas.cliente_id','=','clientes.id')
                        ->select('ventas.*','creditos.importe','creditos.id as id_credito','clientes.nombre','clientes.id as id_cliente')
                        ->where('clientes.nombre','LIKE',"%{$this->search_pendiente}%")
                        ->orderBy('ventas.created_at', 'desc')
                        ->paginate(6);
        $data['productos'] = $this->detalles;
        $data['abonos'] = $this->abonos;
        return view('livewire.ventas',$data);
    }

    public function show($id){
        $venta = Venta::find($id);
        $this->detalles = $venta->detalles;
        $this->abonos = $venta->abonos;
    }
}
