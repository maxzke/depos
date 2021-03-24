<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tramo;
use App\Models\Acabado;

class Lona extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','calidad_360','calidad_720','calidad_1024','calidad_fullhd'];

    public function tramos(){
        return $this->belongsToMany(Tramo::class);
    }

    public function acabados(){
        return $this->belongsToMany(Acabado::class);
    }
}
