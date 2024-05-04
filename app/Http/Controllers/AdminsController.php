<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calzado;
use App\Models\User;
use App\Models\Venta;

class AdminsController extends Controller
{
    public function __invoke(){
        $calzados = Calzado::all();
        $users = User::all();
        $ventas = Venta::all();
        return view("adminPanel",@compact("calzados","users","ventas"));
    }

    public function crearCalzado(Request $request) {
        $calzado = new Calzado;
        $calzado -> nombre = $request -> nombre;
        $calzado -> marca = $request -> marca;
        $calzado -> precio = $request -> precio;
        $calzado -> descripcion = $request -> descripcion;
        $calzado -> save();
        return back() -> with('mensaje', 'Calzado dado de alta con éxito');
    }

    public function eliminarCalzado($id) {
        $calzado = Calzado::findOrFail($id);
        $calzado -> delete();
        return back();
    }

    public function actualizarCalzado(Request $request, $id) {
        $request -> validate([
            'nombre' => 'required',
            'marca' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            ]);
        $calzado = Calzado::findOrFail($id);
        $calzado -> nombre = $request -> nombre;
        $calzado -> marca = $request -> marca;
        $calzado -> precio = $request -> precio;
        $calzado -> descripcion = $request -> descripcion;
        $calzado -> save();
        return back();
    }

    public function crearUser(Request $request) {
        $user = new User;
        $user -> username = $request -> username;
        $user -> email = $request -> email;
        $user -> password = $request -> password;
        $user -> rol_id = $request -> rol_id;
        #$user -> rol() -> attach($request -> rol_id);
        $user -> save();
        return back() -> with('mensaje', 'Usuario dado de alta con éxito');
    }

    public function eliminarUser($id) {
        $user = User::findOrFail($id);
        $user -> delete();
        return back();
    }

    public function actualizarUser(Request $request, $id) {
        $request -> validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'rol_id' => 'required',
            ]);
        $user = User::findOrFail($id);
        $user -> username = $request -> username;
        $user -> email = $request -> email;
        $user -> password = $request -> password;
        $user -> rol_id = $request -> rol_id;
        #$user -> rol() -> detach();
        #$user -> rol() -> attach($request -> rol_id);
        $user -> save();
        return back();
    }
}
