<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calzado;
use App\Models\Categoria; 

class CalzadosController extends Controller
{
    // Otros métodos del controlador...

    /**
     * Muestra los detalles de un calzado específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detalle($id)
    {
        $calzado = Calzado::findOrFail($id);
        $user_id = 2; // ID del usuario
        $isFavorited = \App\Models\User::find($user_id)->favorites()->where('calzado_id', $calzado->id)->exists();


        return view('detalle', compact('calzado', 'isFavorited'));
    }


    public function calzadoPorCategoria($id) {
        $categoria = Categoria::findOrFail($id);
        $calzados = $categoria->calzados;
        $categorias = Categoria::all(); // Incluir también las categorías para el menú desplegable
        return view('index', compact('calzados', 'categoria', 'categorias'));
    }

    /**
     * Muestra la vista principal del controlador.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        // Obtener el calzado por su ID
        $calzado = Calzado::findOrFail($id);

        // Pasar el calzado a la vista de detalles
        return view('detalle', compact('calzado'));
    }
}
