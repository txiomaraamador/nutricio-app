@extends('layouts.app')

@section('title', 'Flog Create')
@section('content')
@include('header')
<div class="container mt-5">
    <h1 class="display-6">Agregar Comida</h1>
    <hr style="color: #000000;" />
    <form class="row g-3 needs-validation" method="POST" action="/flogs">
        @csrf
        <div class="col-md-6">
            <label for="type" class="form-label">Tipo:</label>
            <select name="type" class="form-select" id="type" required>
                <option selected>Elige uno</option>
                <option value="Comida">Comida</option>
                <option value="Cena">Cena</option>
                <option value="Desayuno">Desayuno</option>
                <option value="Colacion">Colación</option>
            </select>
            <div class="valid-feedback">
                ¡Selecciona un tipo de flog!
            </div>
        </div>
        <div class="col-md-6">
            <label for="content" class="form-label">Contenido:</label>
            <input type="text" name="content" class="form-control" id="content" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="patient_id" class="form-label">Paciente:</label>
            <input type="text" name="patient_id" class="form-control" id="patient_id" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a href="/flogs" class="btn btn-primary">Cancelar</a>
              </div>
        
    </form>
</div>
@endsection
