@extends('layouts.app')
@section('title', 'Patient Edit')
@section('content')
@include('header')
<div class="container mt-5">
    <h1 class="display-6">Editar Paciente</h1>
    <hr style="color: #000000;" />


    <form class="row g-3 needs-validation" method="POST" action="{{ route('patients.update', $patient->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- Usa el método PUT para actualización --}}

        <div class="col-md-6">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" name="name" class="form-control" value="{{$patient->name}}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="code" class="form-label">Code:</label>
            <input type="text" name="code" class="form-control" value="{{$patient->code}}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="sex" class="form-label">Sex:</label>
            <input type="text" name="sex" class="form-control" value="{{$patient->sex}}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="user_id" class="form-label">Nutriologo:</label>
            <input type="text" name="user_id" class="form-control" value="{{$patient->user_id}}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Guardar cambios</button>
            <a href="/patients" class="btn btn-primary mt-3">Volver a la lista de pacientes</a>
          </div>
    </form>
</div>
@endsection
