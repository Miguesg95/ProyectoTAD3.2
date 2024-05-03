<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class AdminsController extends Controller
{
    public function __invoke(){
        $calzados = Calzado::all();
        $users = null;
        $ventas = null;
        return view("adminPanel",@compact("calzados","users","ventas"));
    }
}
