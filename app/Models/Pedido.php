<?php

namespace App\Models;
use App\Models\Detalle;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;


    public function detalle(){
        return $this->belongsTo(Detalle::class);
    }
}
