<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Calzado extends Model
{
    use HasFactory;

    public function lineaDeProducto (){
        return $this->belongsTo(LineaDeProducto::class);
    }

    public function favoritedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites', 'calzado_id', 'user_id');
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'calzado_categoria');
    }
}
