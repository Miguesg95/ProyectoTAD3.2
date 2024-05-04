@extends('layouts.basicLayout')

@section('main')
    <main class="container panel py-3 my-4 text-white border-top border-bottom">

        <h2 class="text-center">Panel de Administrador</h2>

        <section id="listar">
            <div class="container" id="hanging-icons">
                <div class="row py-5 justify-content-center text-center">
                    <div class="col">
                        <div>
                            <button class="navbar-toggler rounded border text-white fs-5 p-2 bgButton" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarCalzados">
                                Calzados
                            </button>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <button class="navbar-toggler rounded border text-white fs-5 p-2 bgButton" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarUsers">
                                Usuarios
                            </button>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <button class="navbar-toggler rounded border text-white fs-5 p-2 bgButton" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarRoles">
                                Roles
                            </button>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <button class="navbar-toggler border text-white fs-5 p-2 bgButton" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarCarritos">
                                Carritos
                            </button>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <button class="navbar-toggler border text-white fs-5 p-2 bgButton" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarVentas">
                                Ventas
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse mb-4 mx-4 show" id="navbarCalzados">
                <h3>Calzados en el sistema</h3>
                <div class="table-responsive">
                    <table class="table text-center border table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th class="align-middle border-dark text-start border">Nombre</th>
                                <th class="align-middle border-dark border">Marca</th>
                                <th class="align-middle border-dark border">Descripción</th>
                                <th class="align-middle border-dark border">Precio</th>
                                <th class="align-middle border-dark border">Stock</th>
                                <th colspan="2" class="align-middle border-dark border"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($calzados as $calzado)
                                <tr>
                                    <form action="{{ route('calzadoAdmin.actualizar', $calzado->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <td scope="row" class="align-middle border-dark text-start border col-md-3">
                                            <input type="text" class="form-control" id="validationDefault01"
                                                name="nombre" value="{{ $calzado->nombre }}" required>
                                        </td>
                                        <td class="align-middle border-dark border col-md-2">
                                            <input type="text" class="form-control" id="validationDefault01"
                                                name="marca" value="{{ $calzado->marca }}" required>
                                        </td>
                                        <td class="align-middle border-dark border col-md-4">
                                            <input type="text" class="form-control" id="validationDefault01"
                                                name="descripcion" value="{{ $calzado->descripcion }}" required>
                                        </td>
                                        <td class="align-middle border-dark border col-md-1">
                                            <input type="number" step="0.01" class="form-control"
                                                id="validationDefault02" name="precio" value="{{ $calzado->precio }}"
                                                required>
                                        </td>
                                        <td class="align-middle border-dark border col-md-1">
                                            <input type="number" step="0.01" class="form-control"
                                                id="validationDefault02" name="stock" value="{{ $calzado->stock }}"
                                                required>
                                        </td>
                                        <td class="align-middle border-dark border"><button
                                                class="border text-white bgButton rounded"
                                                type="submit">Actualizar</button></td>
                                    </form>
                                    <td class="align-middle border-dark border">
                                        <form action="{{ route('calzadoAdmin.eliminar', $calzado->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="border text-white bgButton rounded"
                                                type="submit">Eliminar</button>
                                    </td>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-primary">
                            <tr>
                                <th class="align-middle border-dark text-start border">Nombre</th>
                                <th class="align-middle border-dark border">Marca</th>
                                <th class="align-middle border-dark border">Descripción</th>
                                <th class="align-middle border-dark border">Precio</th>
                                <th class="align-middle border-dark border">Stock</th>
                                <th colspan="2" class="align-middle border-dark border"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <h3>Alta Calzado</h3>
                @if (session('mensaje'))
                    <div class="text-white">
                        <p>{{ session('mensaje') }}</p>
                    </div>
                @endif
                <form class="row" action="{{ route('calzadoAdmin.crear') }}" method="POST">
                    @csrf
                    <div class="col-md-3">
                        <label for="validationDefault01" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="validationDefault01" name="nombre" required>
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefault01" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="validationDefault01" name="marca" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault01" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="validationDefault01" name="descripcion" required>
                    </div>
                    <div class="col-md-1">
                        <label for="validationDefault01" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="validationDefault02"
                            name="precio" required>
                    </div>
                    <div class="col-md-1">
                        <label for="validationDefault01" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="validationDefault02" name="stock" required>
                    </div>
                    <div class="col-12 my-3 ">
                        <button class="border rounded text-white bgButton py-1 px-2" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="collapse mb-4 mx-4" id="navbarUsers">
                <h3>Usuarios en el sistema</h3>
                <div class="table-responsive">
                    <table class="table text-center border table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th class="align-middle border-dark text-start border">Nombre de Usuario</th>
                                <th class="align-middle border-dark border">Email</th>
                                <th class="align-middle border-dark border">Contraseña</th>
                                <th class="align-middle border-dark border">Rol</th>
                                <th colspan="2" class="align-middle border-dark border"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <form action="{{ route('userAdmin.actualizar', $user->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <td scope="row" class="align-middle border-dark text-start border col-md-3">
                                            <input type="text" class="form-control" id="validationDefault01"
                                                name="username" value="{{ $user->username }}" required>
                                        </td>
                                        <td class="align-middle border-dark border col-md-3">
                                            <input type="text" class="form-control" id="validationDefault01"
                                                name="email" value="{{ $user->email }}" required>
                                        </td>
                                        <td class="align-middle border-dark border col-md-3">
                                            <input type="text" class="form-control" id="validationDefault01"
                                                name="password" value="{{ $user->password }}" required>
                                        </td>
                                        <td class="align-middle border-dark border col-md-2">
                                            <select class="form-select" id="validationDefault04" name="rol_id" required>
                                                <option selected value="{{ $user->rol->id }}">{{ $user->rol->name }}
                                                </option>
                                                @foreach ($roles as $rol)
                                                    <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="align-middle border-dark border"><button
                                                class="border text-white bgButton rounded"
                                                type="submit">Actualizar</button></td>
                                    </form>
                                    <td class="align-middle border-dark border">
                                        <form action="{{ route('userAdmin.eliminar', $user->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="border text-white bgButton rounded"
                                                type="submit">Eliminar</button>
                                    </td>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-primary">
                            <tr>
                                <th class="align-middle border-dark text-start border">Nombre de Usuario</th>
                                <th class="align-middle border-dark border">Email</th>
                                <th class="align-middle border-dark border">Contraseña</th>
                                <th class="align-middle border-dark border">Rol</th>
                                <th colspan="2" class="align-middle border-dark border"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <h3>Alta Usuario</h3>
                @if (session('mensaje'))
                    <div class="text-white">
                        <p>{{ session('mensaje') }}</p>
                    </div>
                @endif
                <form class="row" action="{{ route('userAdmin.crear') }}" method="POST">
                    @csrf
                    <div class="col-md-3">
                        <label for="validationDefault01" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="validationDefault01" name="username" required>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault01" class="form-label">Email</label>
                        <input type="text" class="form-control" id="validationDefault01" name="email" required>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault01" class="form-label">Contraseña</label>
                        <input type="text" class="form-control" id="validationDefault01" name="password" required>
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefault01" class="form-label">Rol</label>
                        <select class="form-select" id="validationDefault04" name="rol_id" required>
                            <option selected disabled value="0">...</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 my-3 ">
                        <button class="border rounded text-white bgButton py-1 px-2" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="collapse mb-4 mx-4" id="navbarRoles">
                <h3>Roles en el sistema</h3>
                <div class="table-responsive">
                    <table class="table text-center border table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th class="align-middle border-dark text-start border">Nombre</th>
                                <th class="align-middle border-dark border">Usuarios que tienen este rol</th>
                                <th colspan="2" class="align-middle border-dark border"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                                <tr>
                                    <form action="{{ route('rolAdmin.actualizar', $rol->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <td scope="row" class="align-middle border-dark text-start border col-md-3">
                                            <input type="text" class="form-control" id="validationDefault01"
                                                name="name" value="{{ $rol->name }}" required>
                                        </td>
                                        <td class="align-middle border-dark border col-md-4">
                                            {{ $rol->listarUsers() }}
                                        </td>
                                        <td class="align-middle border-dark border"><button
                                                class="border text-white bgButton rounded"
                                                type="submit">Actualizar</button></td>
                                    </form>
                                    <td class="align-middle border-dark border">
                                        <form action="{{ route('rolAdmin.eliminar', $rol->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="border text-white bgButton rounded"
                                                type="submit">Eliminar</button>
                                    </td>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-primary">
                            <tr>
                                <th class="align-middle border-dark text-start border">Nombre</th>
                                <th class="align-middle border-dark border">Usuarios que tienen este rol</th>
                                <th colspan="2" class="align-middle border-dark border"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <h3>Alta Rol</h3>
                @if (session('mensaje'))
                    <div class="text-white">
                        <p>{{ session('mensaje') }}</p>
                    </div>
                @endif
                <form class="row" action="{{ route('rolAdmin.crear') }}" method="POST">
                    @csrf
                    <div class="col-md-3">
                        <label for="validationDefault01" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="validationDefault01" name="name" required>
                    </div>
                    <div class="col-12 my-3 ">
                        <button class="border rounded text-white bgButton py-1 px-2" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="collapse mb-4 mx-4" id="navbarCarritos">
                <h3>Carritos en el sistema</h3>
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
                            @foreach ($carritos as $carrito)
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
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-primary">
                            <tr>
                                <th class="align-middle border-dark text-start border">Usuario</th>
                                <th class="align-middle border-dark border">Última actualización</th>
                                <th class="align-middle border-dark border">Contenido</th>
                                <th class="align-middle border-dark border">Importe Total</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <h3>Añadir Linea de Carrito</h3>
                <form class="row" action="{{ route('lineaDeCarritoAdmin.crear') }}" method="POST">
                    @csrf
                    <div class="col-md-3">
                        <label for="validationDefault01" class="form-label">Carrito</label>
                        <select class="form-select" id="validationDefault04" name="carrito_id" required>
                            <option selected disabled value="">....</option>
                            @foreach ($carritos as $carrito)
                                <option value="{{ $carrito->id }}">{{ $carrito->id }} - {{ $carrito->user->username }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault01" class="form-label">Calzado</label>
                        <select class="form-select" id="validationDefault04" name="calzado_id" required>
                            <option selected disabled value="">....</option>
                            @foreach ($calzados as $calzado)
                                <option value="{{ $calzado->id }}">{{ $calzado->nombre }} - {{ $calzado->precio }}$
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label for="validationDefault01" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="validationDefault01" name="cantidad" required>
                    </div>
                    <div class="col-12 my-3 ">
                        <button class="border rounded text-white bgButton py-1 px-2" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="collapse mb-4 mx-4" id="navbarVentas">
                <h3>Ventas en el sistema</h3>
                <div class="table-responsive">
                    <table class="table text-center border table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th class="align-middle border-dark text-start border">Usuario</th>
                                <th class="align-middle border-dark border">Identificador</th>
                                <th class="align-middle border-dark border">Fecha de Realización</th>
                                <th class="align-middle border-dark border">Estado</th>
                                <th class="align-middle border-dark border">Contenido</th>
                                <th class="align-middle border-dark border">Importe Total</th>
                                <th colspan="2" class="align-middle border-dark border"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ventas as $venta)
                                <tr>
                                    <form action="{{ route('ventaAdmin.actualizar', $venta->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <td scope="row" class="border-dark text-start border col-md-2">
                                            {{ $venta->user->username }}
                                        </td>
                                        <td class="border-dark border col-md-1">
                                            {{ $venta->id }}
                                        </td>
                                        <td class="border-dark border col-md-2">
                                            {{ $venta->created_at }}
                                        </td>
                                        <td class="border-dark border col-md-2">
                                            <input type="text" class="form-control" id="validationDefault01"
                                                name="estado" value="{{ $venta->estado }}" required>
                                        </td>
                                        <td class="border-dark border col-md-4">
                                            @foreach ($venta->lineaDeVentas as $linea)
                                                <p class="text-start"><a
                                                        href="{{ route('lineaDeVentaAdmin.eliminar', $linea->id) }}"
                                                        class="border text-white bgButton rounded px-2 text-decoration-none"
                                                        type="submit">X</a>
                                                    <span>{{ $linea->calzado->nombre }} - cantidad: {{ $linea->cantidad }}
                                                        -
                                                        {{ $linea->importeParcial }}$</span>
                                                </p>
                                            @endforeach
                                        </td>
                                        <td class="border-dark border col-md-1">
                                            {{ $venta->importeTotal }}
                                        </td>
                                        <td class="border-dark border"><button class="border text-white bgButton rounded"
                                                type="submit">Actualizar</button></td>
                                    </form>
                                    <td class="border-dark border">
                                        <form action="{{ route('ventaAdmin.eliminar', $venta->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="border text-white bgButton rounded"
                                                type="submit">Eliminar</button>
                                    </td>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-primary">
                            <tr>
                                <th class="align-middle border-dark text-start border">Usuario</th>
                                <th class="align-middle border-dark border">Identificador</th>
                                <th class="align-middle border-dark border">Fecha de Realización</th>
                                <th class="align-middle border-dark border">Estado</th>
                                <th class="align-middle border-dark border">Contenido</th>
                                <th class="align-middle border-dark border">Importe Total</th>
                                <th colspan="2" class="align-middle border-dark border"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <h3>Alta Venta</h3>
                @if (session('mensaje'))
                    <div class="text-white">
                        <p>{{ session('mensaje') }}</p>
                    </div>
                @endif
                <form class="row" action="{{ route('ventaAdmin.crear') }}" method="POST">
                    @csrf
                    <div class="col-md-4">
                        <label for="validationDefault01" class="form-label">Carrito</label>
                        <select class="form-select" id="validationDefault04" name="carrito_id" required>
                            <option selected disabled value="">....</option>
                            @foreach ($carritos as $carrito)
                                <option value="{{ $carrito->id }}">{{ $carrito->user->username }} - {{ $carrito->user->email }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefault01" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="validationDefault01" name="estado"
                            value="Confirmado" required>
                    </div>
                    <div class="col-12 my-3 ">
                        <button class="border rounded text-white bgButton py-1 px-2" type="submit">Enviar</button>
                    </div>
                </form>
                <h3>Añadir Linea de Venta</h3>
                <form class="row" action="{{ route('lineaDeVentaAdmin.crear') }}" method="POST">
                    @csrf
                    <div class="col-md-3">
                        <label for="validationDefault01" class="form-label">Venta</label>
                        <select class="form-select" id="validationDefault04" name="venta_id" required>
                            <option selected disabled value="">....</option>
                            @foreach ($ventas as $venta)
                                <option value="{{ $venta->id }}">{{ $venta->id }} - {{ $venta->user->username }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault01" class="form-label">Calzado</label>
                        <select class="form-select" id="validationDefault04" name="calzado_id" required>
                            <option selected disabled value="">....</option>
                            @foreach ($calzados as $calzado)
                                <option value="{{ $calzado->id }}">{{ $calzado->nombre }} - {{ $calzado->precio }}$
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label for="validationDefault01" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="validationDefault01" name="cantidad" required>
                    </div>
                    <div class="col-12 my-3 ">
                        <button class="border rounded text-white bgButton py-1 px-2" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection
