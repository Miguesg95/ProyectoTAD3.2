@extends('layouts.clientLayout')

@section('main')
<main class="container panel py-3 my-4 text-dark">

    <!-- Contenido Principal -->
    <div class="container my-5">
        <!-- Botón de cambio de idioma -->
        <div class="mb-3 text-end">
            <a href="{{ route('setLanguage', ['lang' => 'es']) }}" class="btn btn-secondary">Español</a>
            <a href="{{ route('setLanguage', ['lang' => 'en']) }}" class="btn btn-secondary">English</a>
        </div>
        
        <!-- Sección de Productos -->
        <section>
            <h2 class="mb-4">{{ __('messages.our_products') }}</h2>
            <!-- Desplegable para seleccionar una categoría -->
            <div class="mb-3">
                <label for="categoria" class="form-label">{{ __('messages.select_category') }}</label>
                <select class="form-select" id="categoria" onchange="location = this.value;">
                    <option value="{{ route('index.go') }}">Todos</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ route('calzadoPorCategoria', $categoria->id) }}" 
                            {{ isset($currentCategoria) && $currentCategoria->id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
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
            <h2 class="my-4">{{ __('messages.our_reviews') }}</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('messages.satisfied_customer') }}</h5>
                            <p class="card-text">"{{ __('messages.satisfied_customer_text') }}"</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('messages.great_quality') }}</h5>
                            <p class="card-text">"{{ __('messages.great_quality_text') }}"</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección de Nuestros Valores -->
        <section>
            <h2 class="my-4">{{ __('messages.our_values') }}</h2>
            <p>{{ __('messages.values_text') }}</p>
        </section>

        <!-- Otra Sección -->
        <section>
            <h2 class="my-4">{{ __('messages.join_community') }}</h2>
            <p>{{ __('messages.community_text') }}</p>
            <form>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">{{ __('messages.email_address') }}</label>
                    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">{{ __('messages.email_help') }}</div>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('messages.subscribe') }}</button>
            </form>
        </section>
    </div>

</main>
@endsection
