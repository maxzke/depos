<?php

namespace App\Models;
use App\Models\Pedido;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model{

    use HasFactory;

    /**
     * Relacion 1:1 con pedidos
     */
    public function pedido(){
        return $this->hasOne(Pedido::class);
    }




}



