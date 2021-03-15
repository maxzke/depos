<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detalle;
use App\Models\Abono;

class Venta extends Model{

    use HasFactory;
    
    public function detalles(){
        return $this->hasMany(Detalle::class);
    }

    public function abonos(){
        return $this->hasMany(Abono::class);
    }
}
