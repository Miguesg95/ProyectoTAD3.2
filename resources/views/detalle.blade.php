@extends('layouts.indexLayout')

@section('main')
<main class="container panel py-3 my-4 text-dark">

    <!-- Contenido Principal -->
    <div class="container my-5">
        <!-- Detalles del Calzado -->
        <section>
            <div class="row">
                <!-- Imagen del Calzado -->
                <div class="col-md-6">
                    <img src="{{asset('producto-sin-imagen.png')}}" class="img-fluid rounded mx-auto d-block" width="400" alt="{{ $calzado->nombre }}">
                </div>
                <!-- Información del Calzado -->
                <div class="col-md-6">
                    <h2 class="mb-4">{{ $calzado->nombre }}</h2>
                    <p class="mb-3">Marca: {{ $calzado->marca }}</p>
                    <p class="mb-3">Descripción: {{ $calzado->descripcion }}</p>
                    <p class="mb-3">Precio: {{ $calzado->precio }} €</p>
                    <p class="mb-3">Stock: {{ $calzado->stock }}</p>
                    <!-- Formulario para Añadir al Carrito -->
                    <form action="{{ route('carrito.agregar', $calzado->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad:</label>
                            <input type="number" id="cantidad" name="cantidad" min="1" max="{{ $calzado->stock }}" value="1" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Añadir al Carrito</button>
                    </form>
                </div>
            </div>
        </section>
    </div>

</main>
@endsection
