@extends('layouts.basicLayout')

@section('main')
    <main class="container panel py-3 my-4 text-white border-top border-bottom">

        <h2 class="text-center">Tu Carrito</h2>

        <section id="listar">
            <div class="collapse mb-4 mx-4 show" id="navbarCarritos">
                @if($carrito)
                    <h3>Carrito de {{ $carrito->user->username }}</h3>
                    <div class="table-responsive">
                        <table class="table text-center border table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th class="align-middle border-dark text-start border">Usuario</th>
                                    <th class="align-middle border-dark border">Última actualización</th>
                                    <th class="align-middle border-dark border">Contenido</th>
                                    <th class="align-middle border-dark border">Importe Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row" class="border-dark text-start border col-md-2">
                                        {{ $carrito->user->username }} - {{ $carrito->user->email }}
                                    </td>
                                    <td class="border-dark border col-md-2">
                                        {{ $carrito->updated_at }}
                                    </td>
                                    <td class="border-dark border col-md-4">
                                        @foreach ($carrito->lineaDeCarritos as $linea)
                                            <p class="text-start"><a
                                                    href="{{ route('lineaDeCarritoAdmin.eliminar', $linea->id) }}"
                                                    class="border text-white bgButton rounded px-2 text-decoration-none"
                                                    type="submit">X</a>
                                                <span>{{ $linea->calzado->nombre }} - cantidad: {{ $linea->cantidad }} -
                                                    {{ $linea->importeParcial }}$</span>
                                            </p>
                                        @endforeach
                                    </td>
                                    <td class="border-dark border col-md-1">
                                        {{ $carrito->importeTotal }}
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot class="table-primary">
                                <tr>
                                    <th class="align-middle border-dark text-start border"></th>
                                    <th class="align-middle border-dark border"></th>
                                    <th class="align-middle border-dark border"></th>
                                    <th class="align-middle border-dark border"></th>
                                </tr>
                            </tfoot>
                        </table>
                        <form action="{{ route('crearVenta') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">Crear Venta</button>
                        </form>
                    </div>
                @else
                    <p class="text-center">Tu carrito está vacío.</p>
                @endif
            </div>
        </section>
    </main>
@endsection
