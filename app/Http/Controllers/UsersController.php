<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Venta;
use App\Models\Rol;
use App\Models\LineaDeVenta;

class UsersController extends Controller
{
    public function __invoke(){
        $user = User::findOrFail(2);
        return view("cliente",@compact("user"));
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

    public function actualizarPassword(Request $request, $id) {
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
        return back()-> with('mensaje', 'Su contraseña ha sido actualizada');
    }

    public function cancelarCompra($id) {
        $venta = Venta::findOrFail($id);
        $venta -> delete();
        return back();
    }

    public function eliminarLineaDeVentaEnCompra($id) {
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
}
