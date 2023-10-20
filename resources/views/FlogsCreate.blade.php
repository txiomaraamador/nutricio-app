@extends('layouts.app')

@section('title', 'Flog Create')
@section('content')
<div class="container mt-5">
    <h1 class="display-6">Agregar Comida</h1>
    <hr style="color: #0056b2;" />
    <form class="row g-3 needs-validation" method="POST" action="/flogs">
        @csrf
        <div class="col-md-6">
            <label for="type" class="form-label">Tipo:</label>
            <input type="text" name="type" class="form-control" id="type" required>
            <div class="valid-feedback">
                Looks good!
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
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Guardar</button>
        </div>
    </form>
</div>
@endsection
