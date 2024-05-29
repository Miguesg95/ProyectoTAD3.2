<?php

namespace App\Http\Controllers;

use App\Models\Calzado;
use App\Models\Categoria;


class IndexController extends Controller
{
    public function __invoke(){
        
        $calzados = Calzado::all();
        $categorias = Categoria::all(); // Suponiendo que tienes un modelo de Categoría
        return view('index', compact('calzados', 'categorias'));
        
    }
}
