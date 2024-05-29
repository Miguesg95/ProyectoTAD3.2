@extends('layouts.clientLayout')

@section('main')
    <main class="container panel py-3 my-4 text-black">
        <!-- Contenido Principal -->
        <div class="container my-5">
            <!-- Detalles del Calzado -->
            <section>
                <div class="row">
                    <!-- Foto de perfil -->
                    <div class="col-md-3">
                        <img src="{{ asset('foto-perfil.png') }}" class="img-fluid rounded mx-auto d-block"
                            width="200" alt="foto perfil">
                    </div>
                    <!-- Información del Cliente-->
                    <div class="col-md-6">
                        <h2 class="mb-4">{{ $user->username }}</h2>
                        <p class="mb-3">Email: {{ $user->email }}</p>
                        <!-- Formulario para cambiar contraseña -->
                        <form action="{{ route('pass.change')}}" method="GET">
                            <button type="submit" class="btn btn-primary">Modificar perfil</button>
                        </form>
                    </div>
                </div>
            </section>
            <section>
                <div class="mb-4 mx-4 mt-5">
                    <h3>Compras de {{ $user->username }}</h3>
                    @if ($user->ventas)
                        <div class="table-responsive">
                            <table class="table text-center border table-striped">
                                <thead class="table-primary">
                                    <tr>
                                        <th class="align-middle border-dark text-start border">Identificador</th>
                                        <th class="align-middle border-dark border">Fecha de Realización</th>
                                        <th class="align-middle border-dark border">Estado</th>
                                        <th class="align-middle border-dark border">Contenido</th>
                                        <th class="align-middle border-dark border">Importe Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->ventas->sortByDesc("id") as $venta)
                                        <tr>
                                            <td scope="row" class="border-dark text-start border col-md-2">
                                                {{ $venta->id }}
                                            </td>
                                            <td class="border-dark border col-md-2">
                                                {{ $venta->created_at }}
                                            </td>
                                            <td class="border-dark border col-md-2">
                                                {{ $venta->estado }}
                                            </td>
                                            <td class="border-dark border col-md-4">
                                                @foreach ($venta->lineaDeVentas as $linea)
                                                    <p class="text-start">
                                                        <span>{{ $linea->calzado->nombre }} - cantidad:
                                                            {{ $linea->cantidad }}
                                                            -
                                                            {{ $linea->importeParcial }}$</span>
                                                    </p>
                                                @endforeach
                                            </td>
                                            <td class="border-dark border col-md-1">
                                                {{ $venta->importeTotal }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center">No ha realizado ninguna compra.</p>
                    @endif
                </div>
            </section>
            <section>
                <div class="mb-4 mx-4 mt-5">
                    <h3>Productos favoritos de {{ $user->username }}</h3>
                    @if ($user->favorites->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table text-center border table-striped">
                                <thead class="table-primary">
                                    <tr>
                                        <th class="align-middle border-dark text-start border">ID</th>
                                        <th class="align-middle border-dark border">Nombre del Producto</th>
                                        <th class="align-middle border-dark border">Descripción</th>
                                        <th class="align-middle border-dark border">Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->favorites as $favorite)
                                        <tr>
                                            <td class="border-dark text-start border">{{ $favorite->id }}</td>
                                            <td class="border-dark border">{{ $favorite->nombre }}</td>
                                            <td class="border-dark border">{{ $favorite->descripcion }}</td>
                                            <td class="border-dark border">{{ $favorite->precio }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center">No tiene productos favoritos.</p>
                    @endif
                </div>
            </section>
        </div>
    </main>
@endsection
