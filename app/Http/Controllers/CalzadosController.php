<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calzado;

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
        // Obtener el calzado por su ID
        $calzado = Calzado::findOrFail($id);

        // Pasar el calzado a la vista de detalles
        return view('detalle', compact('calzado'));
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
