<?php

namespace App\Http\Controllers;

use App\Models\Calzado;
use App\Models\User;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{


    
    public function addFavorite($calzadoId)
    {
        $usuario = auth()->user();
        $calzado = Calzado::findOrFail($calzadoId);
        $usuario->favorites()->attach($calzado);

        return back(); // Redirigir de vuelta a la página del producto
    }

    public function removeFavorite($calzadoId)
    {
        $usuario = auth()->user();
        $calzado = Calzado::findOrFail($calzadoId);
        $usuario->favorites()->detach($calzado);

        return back(); // Redirigir de vuelta a la página del producto
    }
}
