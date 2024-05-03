<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TAD EPD 3.1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="cd.png">
</head>

<body class="bg-dark">
    <header id="header">
        <div class="container px-3 py-2 bg-dark text-white border-bottom">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <div class="d-flex my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                    <h1 class="text-primary">@yield('mainTitle')</h1>
                </div>
                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li>
                        <a href="{{ route('videoclubs.go') }}" class="nav-link text-white">
                            <img src="cintavhs.jpg" class="bi d-block mx-auto mb-1" width="45" height="40" />
                            Videoclubs
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('soportes.go') }}" class="nav-link text-white">
                            <img src="cd.png" class="bi d-block mx-auto mb-1" width="40" height="40" />
                            Soportes
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('clientes.go') }}" class="nav-link text-white">
                            <img src="clientes.png" class="bi d-block mx-auto mb-1" width="40" height="40" />
                            Clientes
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <main class="container py-3 my-4 text-white">
        @yield('main')
    </main>
    <footer class="container bg-dark text-white py-3 my-4 border-top">
        <ul class="nav justify-content-center pb-3 mb-3">
            <li class="button nav-item"><a href="#header" class="nav-link px-2 text-primary">BACK TO TOP</a></li>
        </ul>
        <p class="text-center text-white">Calzados MARYUPO, 2024</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>