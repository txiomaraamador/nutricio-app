@extends('layouts.app') 
@section('title', 'Inicio')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 px-0">
      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="images/n1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>NUTRICIÓN</h5>
              <p>Planifica tus comidas, rastrea tu progreso y alcanza tus metas nutricionales.</p>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="images/p1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Pacientes</h5>
              <p>Como tu nutricionista personal, estoy aquí para brindarte orientación experta, apoyo comprensivo y conocimientos especializados para ayudarte a alcanzar tus metas de salud y bienestar.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/nutricion1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Comidas</h5>
              <p>Mantengo un registro detallado de tu dieta para una vida más saludable. Haz que tus comidas cuenten: registra tus elecciones alimenticias para un futuro más saludable.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <div class="col-md-6 px-0">
      <div class="container my-5">
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="images/logo2.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h1 class="card-title"> NUTRICIO</h1>
                <p class="card-text">Planifica tus Comidas, Rastrea tu Progreso y Alcanza tus Metas Nutricionales.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card text-white bg-success mb-3">
          <div class="card-header">Bienvenido a NUTRICIO</div>
          <div class="card-body">
            <p class="card-title">Registra las comidas para llevar un control detallado de la dieta y de tus pacientes para alcanzar sus objetivos de salud y bienestar.</p>
          </div>
        </div>
        <div class="card border-success mb-3">
          <div class="card-header">Redes sociales</div>
          <div class="card-body text-success">
            <h5 class="card-title">
              <i class="bi bi-facebook"> Nutricio</i><br>
              <i class="bi bi-instagram"> nutricio_12</i><br>
              <i class="bi bi-envelope-at"> nutricio@gmail.com</i>
            </h5>
            <p class="card-text">Síguenos.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="card mb-3">
            <div class="card-body">
              <h3 class="card-title">Pacientes</h3>
              <p class="card-text">Como su nutricionista personal, estoy aquí para brindarle orientación experta, apoyo comprensivo y conocimientos especializados para ayudarlo a alcanzar sus metas de salud y bienestar.</p>
              {!! Form::open(['url' => '/patients/create', 'class' => 'd-flex', 'role' => 'search']) !!}
                {!! Form::button('Agregar paciente', ['type' => 'submit', 'class' => 'btn btn-outline-success']) !!}
              {!! Form::close() !!}
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Comidas</h3>
              <p class="card-text">Mantengo un Registro Detallado de tu Dieta para una Vida Más Saludable. Haz que tus Comidas Cuenten: Registra tus Elecciones Alimenticias para un Futuro Más Saludable</p>
              {!! Form::open(['url' => '/flogs/create', 'class' => 'd-flex', 'role' => 'search']) !!}
                {!! Form::button('Agregar comida', ['type' => 'submit', 'class' => 'btn btn-outline-success']) !!}
              {!! Form::close() !!}
              <!-- Código de instalación Cliengo para xiomaralizethamadoraguilera@gmail.com -->
              <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/65440c5a14ee5c0032c5059c/65440c5d14ee5c0032c5059f.js?platform=view_installation_code'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
