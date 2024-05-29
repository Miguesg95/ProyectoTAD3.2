<?php

namespace App\Http\Controllers;

use App\Models\Calzado;
use App\Models\User;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    private $userId = 2;

    public function addFavorite($calzadoId)
    {
        $user = User::findOrFail($this->userId);
        $calzado = Calzado::findOrFail($calzadoId);
        $user->favorites()->attach($calzado);

        return back(); // Redirigir de vuelta a la página del producto
    }

    public function removeFavorite($calzadoId)
    {
        $user = User::findOrFail($this->userId);
        $calzado = Calzado::findOrFail($calzadoId);
        $user->favorites()->detach($calzado);

        return back(); // Redirigir de vuelta a la página del producto
    }
}
