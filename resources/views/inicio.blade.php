@extends('layouts.app')
@section('title', 'inicio')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div id="carouselExampleDark" class="carousel carousel-dark slide" style="width: 100%; max-width: 1200px;">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="images/nutricion1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>NUTRICIÓN</h5>
          <p>Planifica tus comidas, rastrea tu progreso y alcanza tus metas nutricionales.</p>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="images/nutricion2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Pacientes</h5>
          <p>Como tu nutricionista personal, estoy aquí para brindarte orientación experta, apoyo comprensivo y conocimientos especializados para ayudarte a alcanzar tus metas de salud y bienestar.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/nutricion3.jpeg" class="d-block w-100" alt="...">
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
@endsection
