<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calzado;
use App\Models\User;
use App\Models\Venta;
use App\Models\Rol;

class AdminsController extends Controller
{
    public function __invoke(){
        $calzados = Calzado::all();
        $users = User::all();
        $ventas = Venta::all();
        $roles = Rol::all();
        return view("adminPanel",@compact("calzados","users","ventas","roles"));
    }

    public function crearCalzado(Request $request) {
        $calzado = new Calzado;
        $calzado -> nombre = $request -> nombre;
        $calzado -> marca = $request -> marca;
        $calzado -> precio = $request -> precio;
        $calzado -> descripcion = $request -> descripcion;
        $calzado -> stock = $request -> stock;
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
            'stock' => 'required',
            ]);
        $calzado = Calzado::findOrFail($id);
        $calzado -> nombre = $request -> nombre;
        $calzado -> marca = $request -> marca;
        $calzado -> precio = $request -> precio;
        $calzado -> descripcion = $request -> descripcion;
        $calzado -> stock = $request -> stock;
        $calzado -> save();
        return back();
    }

    public function crearUser(Request $request) {
        $user = new User;
        $user -> username = $request -> username;
        $user -> email = $request -> email;
        $user -> password = $request -> password;
        $user -> rol_id = $request -> rol_id;
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
        $user -> save();
        return back();
    }

    public function crearRol(Request $request) {
        $rol = new Rol;
        $rol -> name = $request -> name;
        $rol -> save();
        return back() -> with('mensaje', 'Rol dado de alta con éxito');
    }

    public function eliminarRol($id) {
        $rol = Rol::findOrFail($id);
        $rol -> delete();
        return back();
    }

    public function actualizarRol(Request $request, $id) {
        $request -> validate([
            'name' => 'required'
            ]);
        $rol = Rol::findOrFail($id);
        $rol -> name = $request -> name;
        $rol -> save();
        return back();
    }

    public function crearVenta(Request $request) {
        $venta = new Venta;
        $venta -> name = $request -> name; 
        $venta -> save();
        return back() -> with('mensaje', 'Rol dado de alta con éxito');
    }

    public function eliminarVenta($id) {
        $venta = Venta::findOrFail($id);
        $venta -> delete();
        return back();
    }

    public function actualizarVenta(Request $request, $id) {
        $request -> validate([
            'name' => 'required'
            ]);
        $venta = Venta::findOrFail($id);
        $venta -> name = $request -> name;
        $venta-> save();
        return back();
    }
}
