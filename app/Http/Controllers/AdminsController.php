<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calzado;
use App\Models\User;
use App\Models\Venta;
use App\Models\Rol;
use App\Models\LineaDeVenta;
use App\Models\LineaDeCarrito;
use App\Models\Carrito;

class AdminsController extends Controller
{
    public function __invoke(){
        $calzados = Calzado::all();
        $users = User::all();
        $ventas = Venta::all();
        $roles = Rol::all();
        $carritos = Carrito::all();
        return view("adminPanel",@compact("calzados","users","ventas","roles","carritos"));
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
        $carrito = new Carrito;
        $carrito -> user_id = $user ->id;
        $carrito -> importeTotal = 0;
        $carrito -> save();
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
        $carrito = Carrito::findOrFail($request -> carrito_id);
        $venta -> user_id = $carrito -> user_id;
        $venta -> estado = $request -> estado;
        $venta -> importeTotal = $carrito -> importeTotal;
        $venta -> save();
        foreach($carrito->lineaDeCarritos as $lineaDeCarrito){
            $lineaDeVenta = new LineaDeVenta;
            $lineaDeVenta -> venta_id = $venta -> id;
            $lineaDeVenta -> calzado_id = $lineaDeCarrito -> calzado_id;
            $lineaDeVenta -> cantidad = $lineaDeCarrito -> cantidad;
            $lineaDeVenta -> importeParcial = $lineaDeCarrito -> importeParcial;
            $lineaDeVenta -> save();
            $lineaDeCarrito -> delete();
        }
        return back() -> with('mensaje', 'Venta dada de alta con éxito');
    }

    public function eliminarVenta($id) {
        $venta = Venta::findOrFail($id);
        $venta -> delete();
        return back();
    }

    public function actualizarVenta(Request $request, $id) {
        $request -> validate([
            'estado' => 'required'
            ]);
        $venta = Venta::findOrFail($id);
        $venta -> estado = $request -> estado;
        $venta-> save();
        return back();
    }

    public function crearLineaDeVenta(Request $request) {
        $lineaDeVenta = new LineaDeVenta;
        $lineaDeVenta -> venta_id = $request -> venta_id;
        $lineaDeVenta -> calzado_id = $request -> calzado_id;
        $lineaDeVenta -> cantidad = $request -> cantidad;
        $calzado = Calzado::findOrFail($lineaDeVenta -> calzado_id);
        $lineaDeVenta -> importeParcial = $calzado->precio * $lineaDeVenta -> cantidad;
        $lineaDeVenta -> save();
        $venta = Venta::findOrFail($lineaDeVenta -> venta_id);
        $venta -> importeTotal = 0;
        foreach($venta->lineaDeVentas as $lineaDeVenta){
            $venta -> importeTotal += $lineaDeVenta -> importeParcial;
        }
        $venta -> save();
        return back();
    }

    public function eliminarLineaDeVenta($id) {
        $lineaDeVenta = LineaDeVenta::findOrFail($id);
        $venta = Venta::findOrFail($lineaDeVenta -> venta_id);
        $lineaDeVenta -> delete();
        $venta -> importeTotal = 0;
        foreach($venta->lineaDeVentas as $lineaDeVenta){
            $venta -> importeTotal += $lineaDeVenta -> importeParcial;
        }
        $venta -> save();
        return back();
    }

    public function crearLineaDeCarrito(Request $request) {
        $lineaDeCarrito = new LineaDeCarrito;
        $lineaDeCarrito -> carrito_id = $request -> carrito_id;
        $lineaDeCarrito -> calzado_id = $request -> calzado_id;
        $lineaDeCarrito -> cantidad = $request -> cantidad;
        $calzado = Calzado::findOrFail($lineaDeCarrito -> calzado_id);
        $lineaDeCarrito -> importeParcial = $calzado->precio * $lineaDeCarrito -> cantidad;
        $lineaDeCarrito -> save();
        $carrito = Carrito::findOrFail($lineaDeCarrito -> carrito_id);
        $carrito -> importeTotal = 0;
        foreach($carrito->lineaDeCarritos as $lineaDeCarrito){
            $carrito -> importeTotal += $lineaDeCarrito -> importeParcial;
        }
        $carrito -> save();
        return back();
    }

    public function eliminarLineaDeCarrito($id) {
        $lineaDeCarrito = LineaDeCarrito::findOrFail($id);
        $carrito = Carrito::findOrFail($lineaDeCarrito -> carrito_id);
        $lineaDeCarrito -> delete();
        $carrito -> importeTotal = 0;
        foreach($carrito->lineaDeCarritos as $lineaDeCarrito){
            $carrito -> importeTotal += $lineaDeCarrito -> importeParcial;
        }
        $carrito -> save();
        return back();
    }
}
