@extends('layouts.indexLayout')

@section('main')
<main class="container panel py-3 my-4 text-dark">

<!-- Contenido Principal -->
<div class="container my-5">
    <!-- Sección de Productos -->
    <section>
            <h2 class="mb-4">Nuestros Productos</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- Iterar sobre cada producto -->
                @foreach ($calzados as $calzado)
                <div class="col">
                    <div class="card h-100">
                        <!-- Enlace a los detalles del producto -->
                        <a href="{{ route('calzado.detalle', $calzado->id) }}">
                            <!-- Imagen del producto -->
                            <img src="producto-sin-imagen.png" class="card-img-top" alt="{{ $calzado->nombre }}">
                        </a>
                        <div class="card-body">
                            <!-- Nombre del producto -->
                            <h5 class="card-title"><a href="{{ route('calzado.detalle', $calzado->id) }}">{{ $calzado->nombre }}</a></h5>
                            <!-- Precio del producto -->
                            <p class="card-text">{{ $calzado->precio }} €</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

    <!-- Sección de Reseñas -->
    <section>
        <h2 class="my-4">Nuestras Reseñas</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Cliente Satisfecho</h5>
                        <p class="card-text">"¡Me encantan los zapatos que compré en Mayupo! Son cómodos y elegantes."</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Gran calidad</h5>
                        <p class="card-text">"Los zapatos de Mayupo son de gran calidad y durabilidad. ¡Los recomiendo totalmente!"</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Nuestros Valores -->
    <section>
        <h2 class="my-4">Nuestros Valores</h2>
        <p>En Mayupo nos esforzamos por ofrecer productos de la más alta calidad a precios accesibles. Valoramos la satisfacción de nuestros clientes por encima de todo y nos comprometemos a brindar un excelente servicio en todo momento.</p>
    </section>

    <!-- Otra Sección -->
    <section>
        <h2 class="my-4">¡Únete a Nuestra Comunidad!</h2>
        <p>¿Quieres estar al tanto de las últimas novedades y ofertas exclusivas de Mayupo? ¡Suscríbete a nuestro boletín informativo ahora!</p>
        <form>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">Nunca compartiremos tu correo electrónico con nadie más.</div>
            </div>
            <button type="submit" class="btn btn-primary">Suscribirse</button>
        </form>
    </section>
</div>

</main>
@endsection
