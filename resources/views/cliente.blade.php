@extends('layouts.basicLayout')

@section('main')
    <main class="container panel py-3 my-4 text-white">
        <!-- Contenido Principal -->
        <div class="container my-5">
            <!-- Detalles del Calzado -->
            <section>
                <div class="row">
                    <!-- Foto de perfil -->
                    <div class="col-md-3">
                        <img src="{{ asset('producto-sin-imagen.png') }}" class="img-fluid rounded mx-auto d-block"
                            width="200" alt="foto perfil">
                    </div>
                    <!-- Información del Cliente-->
                    <div class="col-md-6">
                        <h2 class="mb-4">{{ $user->username }}</h2>
                        <p class="mb-3">Email: {{ $user->email }}</p>
                        <!-- Formulario para cambiar contraseña -->
                        <!--form action="{{-- route('pass.change', $user->id) --}}" method="POST">
                            <button type="submit" class="btn btn-primary">Cambiar la contraseña</button>
                        </form-->
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
                                        <!--th class="align-middle border-dark border"></th-->
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
                                                        <!--a
                                                            href="{{-- route('lineaDeVentaUser.eliminar', $linea->id) --}}"
                                                            class="border text-white bgButton rounded px-2 text-decoration-none"
                                                            type="submit">X</a-->
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
                                            <!--td class="border-dark border">
                                                <form action="{{-- route('ventaUser.eliminar', $venta->id) --}}"
                                                    method="POST">
                                                    @ method('DELETE')
                                                    @ csrf
                                                    <button class="border text-white bgButton rounded"
                                                        type="submit">Cancelar</button>
                                                </form>
                                            </td-->
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-primary">
                                    <tr>
                                        <th class="align-middle border-dark text-start border">Identificador</th>
                                        <th class="align-middle border-dark border">Fecha de Realización</th>
                                        <th class="align-middle border-dark border">Estado</th>
                                        <th class="align-middle border-dark border">Contenido</th>
                                        <th class="align-middle border-dark border">Importe Total</th>
                                        <!--th class="align-middle border-dark border"></th-->
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    @else
                        <p class="text-center">No ha realizado ninguna compra.</p>
                    @endif
                </div>
            </section>
        </div>

    </main>
@endsection
