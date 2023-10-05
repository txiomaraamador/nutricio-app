@extends('layouts.app')

@section('title', 'Patients Create')
@section('content')
<div class="container mt-5">
    <h1 class="display-6">Agregar Paciente</h1>
    <hr style="color: #0056b2;" />
    <form class="row g-3 needs-validation" method="POST" action="/patients">
        @csrf
        <div class="col-md-6">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" name="name" class="form-control" id="name" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="address" class="form-label">Code:</label>
            <input type="text" name="code" class="form-control" id="code" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="twitter" class="form-label">Sex:</label>
            <input type="text" name="sex" class="form-control" id="sex" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="facebook" class="form-label">Nutriologo:</label>
            <input type="text" name="user_id" class="form-control" id="user_id" required>
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
