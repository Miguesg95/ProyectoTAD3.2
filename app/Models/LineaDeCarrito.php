<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaDeCarrito extends Model
{
    use HasFactory;

    public function carrito (){
        return $this->belongsTo(Carrito::class);
    }

    public function calzado (){
        return $this->hasOne(Calzado::class);
    }
}
