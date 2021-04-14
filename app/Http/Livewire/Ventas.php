<?php

namespace App\Http\Livewire;

use App\Models\Abono;
use App\Models\Credito;
use App\Models\Metodo;
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
    public $subtotal = 0;
    public $metodo_pago = 'efectivo';
    public $saldo = null;
    public $cliente = null;
    public $facturar = false;

    public $venta_seleccionada = null;
    //importe recibido
    public $importeAbono = null;
    //importe a guardar en la BD luego de dar cambio
    public $importe_pagado;
    public $credito = FALSE;


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
        $data['metodos'] = Metodo::get();
        return view('livewire.ventas',$data);
    }

    public function show($id){
        $this->venta_seleccionada = $id;
        $venta = Venta::find($id);
        $this->facturar = $venta->factura;
        $this->detalles = $venta->detalles;
        $this->cliente = $venta->cliente;
        $this->abonos = $venta->abonos;
        $this->saldo = $venta->creditos;
        $this->subtotal = $this->getSubtotalVenta($this->detalles);
    }

    private function actualizaCredito($venta_id,$importe){
        $credit = DB::table('creditos')
        ->where('venta_id',$venta_id);
        $credit->update([
            'importe' => $importe
        ]);
    }

    private function getSubtotalVenta($detalles){
        $subt = 0;
        foreach ($detalles as $detalle) {
            $subt += $detalle->importe;
        }
        return $subt;
    }

    public function storeAbono(){
        $creditoRestante = floatval($this->saldo->importe) - floatval($this->importe_pagado);

        $this->store_abono($this->venta_seleccionada,$this->metodo_pago,$this->importe_pagado); 

        $this->actualizaCredito($this->venta_seleccionada,$creditoRestante);

        $this->showAlerta("success","Abono Guardado!");
    }

    public function abonar(){
        if ($this->venta_seleccionada == null && $this->saldo == 0) {
            $this->showAlerta("error","Seleccionar una venta!");
        }
        //$this->tab = "pagar";
        $respuesta = $this->verifica_abono($this->saldo->importe,$this->importeAbono);
        $mensaje_pago = $respuesta['mensaje'];
        $this->showAlerta("info",$mensaje_pago);
        $this->setImportePago($respuesta['importe']);
    }

    private function setImportePago($importe){
        $this->importe_pagado = $importe;
    }

    private function verifica_abono($total,$abono){
        $msg['mensaje'] = "";
        $msg['importe'] = 0;
        if ($total>0) {
            if ($abono>=$total) {
                $cambio = floatval($abono)-floatval($total);
                $msg['mensaje'] = "Su Cambio: ".number_format($cambio,1,'.',',');  
                $msg['importe'] = $total;
                $this->credito = FALSE;
            }else{
                $this->credito = TRUE;
                $falta =  floatval($total)-floatval($abono);
                //$this->importe_credito = $falta;
                $msg['mensaje'] = "Saldo pendiente ".number_format($falta,1,'.',',');
                $msg['importe'] = $abono;
            }
        }
        return $msg;
    }

    private function store_abono($venta_id,$metodo,$importe){
        if ($importe > 0) {
            $abono = new Abono;
            $abono->venta_id = $venta_id;
            $abono->metodo = $metodo;
            $abono->importe = $importe;
            $abono->save();
        }
    }

    private function showAlerta($tipo,$mensaje){
        $this->alert($tipo, $mensaje, [
            'position' =>  'bottom', 
            'timer' =>  3000,  
            'toast' =>  true, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false, 
      ]);
    }





}
