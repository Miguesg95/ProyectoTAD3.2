@extends('layouts.clientLayout')




@section('main')
<main class="container panel py-3 my-4 text-black">
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <h4 class="mt-1 mb-5 pb-1">Cambiar Contraseña</h4>
                                    </div>

                                    @if (session('mensaje'))
                                        <div class="alert alert-success">
                                            {{ session('mensaje') }}
                                        </div>
                                    @endif

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('password.update', Auth::user()->id) }}">
                                        @csrf

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Introduzca su Email" required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="old_password">Contraseña Antigua</label>
                                            <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Introduzca su contraseña antigua" required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="new_password">Nueva Contraseña</label>
                                            <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Introduzca su nueva contraseña" required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="new_password_confirmation">Confirmar Nueva Contraseña</label>
                                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" placeholder="Confirme su nueva contraseña" required />
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Actualizar Contraseña</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">MARYUPO</h4>
                                    <p class="small mb-0">¡Actualiza tu contraseña para mantener tu cuenta segura!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</main>
@endsection
