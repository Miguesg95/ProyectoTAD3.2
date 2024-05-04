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
    @yield('main')
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