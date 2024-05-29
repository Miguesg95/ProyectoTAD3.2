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

class CarritosController extends Controller
{

    public function __invoke(Request $request){
        $calzados = Calzado::all();

        //obtenemos de la sesion el usuario
        $usuario = auth()->user();
        if (!$usuario) {
            return redirect()->route('login');
        }
        
        //sacamos su id
        $usuarioId = $usuario->id;
        $carrito = Carrito::where('user_id', $usuarioId)->first();

        if (!$carrito) {
            $carrito = new Carrito();
            $carrito->user_id = $usuarioId;
            $carrito->importeTotal = 0;
            $carrito->save();
        }

        //faltaria añadir el usuario al comapact
        return view("carrito",@compact("carrito","calzados","usuario"));
    }
    

    public function crearVenta(){
        //obtenemos de la sesion el usuario
        $usuario = auth()->user();
        if (!$usuario) {
            return redirect()->route('login');
        }
        
        //sacamos su id
        $usuarioId = $usuario->id;
        $carrito = Carrito::where('user_id', $usuarioId)->first();

        //Sacamos las lineas de carrito
        $lineasDeCarrito = $carrito->lineaDeCarritos;

        // Inicializar el importe total de la venta
        $importeTotalVenta = 0;
        
        //Creamos el objeto venta
        $venta = new Venta();
        $venta->user_id = $usuarioId;
        $venta->importeTotal = $importeTotalVenta;
        $venta->estado = "En Proceso";
        $venta->save();
        

        //Copiamos las lineas de carrito a lineas de venta
        foreach ($lineasDeCarrito as $lineaDeCarrito) {
            // Crear una nueva línea de venta
            $lineaDeVenta = new LineaDeVenta();
            $lineaDeVenta->cantidad = $lineaDeCarrito->cantidad; 
            $lineaDeVenta->importeParcial = $lineaDeCarrito->importeParcial;
            $lineaDeVenta->calzado_id = $lineaDeCarrito->calzado_id;
            $lineaDeVenta->venta_id = $venta->id; 
            $importeTotalVenta += $lineaDeCarrito->importeParcial;
            $lineaDeVenta->save();

            // Decrementamos el stock del calzado
            $calzado = Calzado::findOrFail($lineaDeCarrito->calzado_id);
            $calzado->stock -= $lineaDeCarrito->cantidad;
            $calzado->save();

            // Eliminamos la línea de carrito
            $lineaDeCarrito->delete();
            
            
        }
        $venta->importeTotal = $importeTotalVenta;
        $venta->estado = "Confirmado";
        $venta->save();

        $carrito->delete();
        return redirect()->route('carrito');

    }

    public function agregarProductoAlCarrito(Request $request, $id){

        // Obtener el carrito del usuario actual
        $usuario = auth()->user();
        if (!$usuario) {
            return redirect()->route('login');
        }
        $usuarioId = $usuario->id;
        $carrito = Carrito::where('user_id', $usuarioId)->first();
    
        // Crear un nuevo carrito si es nulo
        if ($carrito === null) {
            $carrito = new Carrito();
            $carrito->user_id = $usuarioId; // Asegúrate de cambiar esto por la lógica para obtener el ID del usuario actual
            $carrito->importeTotal = '0';
            $carrito->save();
        }
    
        // Obtener el calzado por su ID
        $calzado = Calzado::find($id);
    
        // Verificar si el calzado existe
        if (!$calzado) {
            return redirect()->back()->with('error', 'El calzado no existe.');
        }
    
        // Verificar si el calzado está en stock
        if ($calzado->stock <= 0) {
            return redirect()->back()->with('error', 'El calzado está agotado.');
        }
    
        // Obtener la cantidad del calzado del formulario
        $cantidad = $request->input('cantidad');
    
        // Verificar si la cantidad es válida
        if ($cantidad <= 0 || $cantidad > $calzado->stock) {
            return redirect()->back()->with('error', 'La cantidad seleccionada no es válida.');
        }
    
        // Crear una nueva línea de carrito con la cantidad especificada
        $lineaDeCarrito = new LineaDeCarrito();
        $lineaDeCarrito->calzado_id = $calzado->id;
        $lineaDeCarrito->cantidad = $cantidad;
        $lineaDeCarrito->importeParcial = $calzado->precio * $cantidad;
        $carrito->importeTotal += $lineaDeCarrito->importeParcial;
    
        // Guardar la línea de carrito en la base de datos
        $carrito->lineaDeCarritos()->save($lineaDeCarrito);
    
        $carrito->save();
    
        return redirect()->route('carrito');
    }


}
