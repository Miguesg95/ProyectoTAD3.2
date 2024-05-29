<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calzados MARYUPO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa; /* Color de fondo */
            color: #212529; /* Color del texto */
        }

        header {
            background-color: #007bff; /* Azul */
            color: white;
            padding: 20px 0;
        }

        footer {
            background-color: #007bff; /* Azul */
            color: white;
            padding: 20px 0;
        }

        .bgButton {
            background-color: #0056b3 !important; /* Azul oscuro */
        }

        .bgButton:hover {
            background-color: #004f9b !important; /* Azul más oscuro al pasar el mouse */
        }

        .logo {
            width: 60px;
            height: 60px;
            margin-right: 10px;
        }

        h1 {
            font-size: 1.5rem;
            margin-bottom: 0;
        }

        .logout-link {
            text-decoration: none;
            color: white;
            padding: 8px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .logout-link:hover {
            background-color: #004f9b;
        }

        .back-to-top {
            text-decoration: none;
            color: white;
            border: 1px solid white;
            padding: 8px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-to-top:hover {
            background-color: #004f9b;
        }

        .footer-text {
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
<header id="header" class="container-fluid text-center">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <img src="{{asset('logo.jpg')}}" class="logo" alt="Logo">
                    <h1 class="mb-0">Calzados MARYUPO</h1>
                </div>
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="/adminPanel" class="btn btn-outline-light me-3">Panel de Control</a>
                    <a href="/login" class="btn btn-outline-light me-3">Iniciar Sesión</a>
                    <a href="/carrito" class="text-white "><i class="bi bi-cart-fill fs-4"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>



    @yield('main')

    <footer class="container-fluid text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <a href="#header" class="back-to-top"> Volver arriba</a>
                </div>
            </div>
            <br>
            <div class="row mt-3">
                <div class="col">
                    <p>&copy; {{ date('Y') }} Mayupo - Todos los derechos reservados</p>
                </div>
            </div>

        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
