<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> 

<section class="vh-100" >
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="images/logo2.jpg" class="img-fluid" style="border-radius: 1rem 0 0 1rem;">
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">NUTRICIO</span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Ingrese a su cuenta</h5>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                        <label class="form-label" for="email">Correo electronico</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                                        <label class="form-label" for="password">Contraseña</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-success btn-lg btn-block"  type="submit">Inisiar sesion</button>
                                    </div>

                                    @if (Route::has('password.request'))
                                    <a class="small text-muted" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                                    @endif

                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">¿No tienes una cuenta? <a href="{{ route('register') }}" style="color: #393f81;">Registrate aquí</a></p>
                                    
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

