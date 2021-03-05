<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lona;

class Tramo extends Model
{
    use HasFactory;
    protected $fillable = ['medida'];

    public function lonas(){
        return $this->belongsToMany(Lona::class);
    }
}
