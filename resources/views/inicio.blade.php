@extends('layouts.app')
@section('title', 'inicio')
@section('content')
@include('header')

<div class="card mb-3">
  
  <div class="card-body">
    <h5 class="card-title">Nutriologo</h5>
    <p class="card-text">Creo firmemente en el poder de la nutrición para mejorar la calidad de vida y prevenir enfermedades. Trabajo estrechamente con mis clientes para ayudarles a comprender los principios fundamentales de una dieta equilibrada, proporcionándoles no solo conocimientos, sino también las herramientas prácticas necesarias para tomar decisiones alimenticias informadas.</p>
    <p class="card-text"><small class="text-body-secondary">Educador Nutricional: Guiando hacia una Vida más Saludable</small></p>

  </div>
  <img src="images\nutriologo_1-6992293_20230916185037.jpg" class="card-img-top">
</div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Paciente</h5>
    <p class="card-text">Como su nutricionista personal, estoy aquí para brindarle orientación experta, apoyo comprensivo y conocimientos especializados para ayudarlo a alcanzar sus metas de salud y bienestar.</p>
    <p class="card-text"><small class="text-body-secondary">Bienvenido a su Viaje hacia la Salud y el Bienestar</small></p>
  </div>
  <img src="images\images.jpg" class="card-img-bottom">
</div>
  @endsection