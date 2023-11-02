@extends('layouts.app')
@section('title', 'inicio')
@section('content')


<div class="container my-5">
  <nav class="navbar bg-body-tertiary">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <div class="card mb-3 mx-md-2" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="images/logo2.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h1 class="card-title">NUTRICIO</h1>
                      <p class="card-text">Planifica tus Comidas, Rastrea tu Progreso y Alcanza tus Metas Nutricionales.</p>
                    </div>
                  </div>
                </div>
      </div>
            </div>
              <div class="card text-bg-success mx-md-2" style="max-width: 18rem;">
                <div class="card-header">Bienvenido a NUTRICIO</div>
                <div class="card-body">
                  <p class="card-title">Registra las comidas para llevar un control detallado de la dieta y de tus pacientes para alcanzar sus objetivos de salud y bienestar.</p>
                </div>
                
            </div>
    <div class="card border-success mb-3" style="max-width: 16rem;">
      <div class="card-header">Redes sociales</div>
      <div class="card-body text-success">
        <h5 class="card-title">Facebook: Nutricio<br>Instagram: nutricio_12<br>Correo: nutricio@gmail.com<br></h5>
        <p class="card-text">Siguenos.</p>
      </div>
    </div>
  </nav>

  <div class="row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="card">
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
        </div>
      </div>
    </div>
  </div>
</div>

  @endsection