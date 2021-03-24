<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lona;
class Acabado extends Model
{
    use HasFactory;

    public function lonas(){
        return $this->belongsToMany(Lona::class);
    }
}
