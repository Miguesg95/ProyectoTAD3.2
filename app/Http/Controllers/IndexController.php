<?php

namespace App\Http\Controllers;

use App\Models\Calzado;

class IndexController extends Controller
{
    public function __invoke(){

        $calzados = Calzado::all();
        return view("index", @compact("calzados"));
        
    }
}
