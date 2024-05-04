<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaDeVenta extends Model
{
    use HasFactory;

    public function venta (){
        return $this->belongsTo(Venta::class);
    }

    public function calzado (){
        return $this->belongsTo(Calzado::class);
    }
}
