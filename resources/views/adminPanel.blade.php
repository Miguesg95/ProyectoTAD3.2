<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TAD EPD 3.2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="logo.jpg">
    <link rel="stylesheet" href="<?php echo asset('css/admin.css'); ?>" type="text/css">
</head>

<body class="">
    <header id="header" class="container panel px-3 py-2 text-white border-bottom">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <div class="d-flex my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <img src="logo.jpg" class=" border bi d-block mx-2 mb-2" width="60" height="60" />
                <h1 class="text-white">Calzados MARYUPO</h1>
            </div>
            <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                <li>
                    <a href="#" class="nav-link rounded text-white border bgButton">
                        LogOut
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <main class="container panel py-3 my-4 text-white border-top border-bottom">

        <h2 class="text-center">Panel de Administrador</h2>

        <section id="listar">
            <div class="container" id="hanging-icons">
                <div class="row py-5 justify-content-center text-center">
                    <div class="col-3">
                        <div>
                            <button class="navbar-toggler rounded border text-white fs-5 p-2 bgButton" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarCalzados">
                                Calzados
                            </button>
                        </div>
                    </div>
                    <div class="col-3">
                        <div>
                            <button class="navbar-toggler rounded border text-white fs-5 p-2 bgButton" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarUsers">
                                Usuarios
                            </button>
                        </div>
                    </div>
                    <div class="col-3">
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
                                        <td class="align-middle border-dark border"><button
                                                class="border text-white bgButton rounded"
                                                type="submit">Actualizar</button></td>
                                    </form>
                                    <td class="align-middle border-dark border">
                                        <form action="{{ route('calzadoAdmin.eliminar', $calzado->id) }}"
                                            method="POST">
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
                        <input type="text" class="form-control" id="validationDefault01" name="descripcion"
                            required>
                    </div>
                    <div class="col-md-1">
                        <label for="validationDefault01" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="validationDefault02"
                            name="precio" required>
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
                                        <td scope="row"
                                            class="align-middle border-dark text-start border col-md-3">
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
                                        <td class="align-middle border-dark border col-md-1">
                                            <input type="text" class="form-control" id="validationDefault02"
                                                name="rol_id" value="{{ $user->rol_id }}" required>
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
                        <input type="text" class="form-control" id="validationDefault01" name="password"
                            required>
                    </div>
                    <div class="col-md-1">
                        <label for="validationDefault01" class="form-label">Rol</label>
                        <input type="number" class="form-control" id="validationDefault02"
                            name="rol_id" required>
                    </div>
                    <div class="col-12 my-3 ">
                        <button class="border rounded text-white bgButton py-1 px-2" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="collapse mb-4 text-center" id="navbarVentas">

            </div>
        </section>
    </main>
    <footer class="container panel text-white py-3 mt-4 border-top">
        <ul class="nav justify-content-center pb-3 mb-3">
            <li class=" nav-item"><a href="#header" class="button border bgButton nav-link px-2 text-white">BACK
                    TO
                    TOP</a></li>
        </ul>
        <p class="text-center text-white">Calzados MARYUPO, 2024</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
