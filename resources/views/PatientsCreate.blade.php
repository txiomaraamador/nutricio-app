@extends('layouts.app')

@section('title', 'Patient Create')
@section('content')
@include('header')
<div class="container mt-5">
    <h1 class="display-6">Agregar Paciente</h1>
    <hr style="color: #000000;" />
    @if(session('error'))
    <div id="alert" class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div id="alert" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <script>
        // Código JavaScript para ocultar la alerta después de unos segundos
        setTimeout(function(){
            var alert = document.getElementById('alert');
            if(alert) {
                alert.style.display = 'none';
            }
        }, 3000); // La alerta se ocultará después de 5 segundos (5000 milisegundos)
    </script>
    
    <form class="row g-3 needs-validation" method="POST" action="/patients">
        @csrf
        <div class="col-md-6">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" name="name" class="form-control" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="code" class="form-label">Code:</label>
            <input type="text" name="code" class="form-control" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="sex" class="form-label">Sexo:</label>
            <select name="sex" class="form-select" required>
                <option selected>Elige uno</option>
                <option value="hombre">hombre</option>
                <option value="mujer">mujer</option>
            </select>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="user_id" class="form-label">Nutriologo:</label>
            <select name="user_id" class="form-select" required>
                <option selected>Elige un nutriologo</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="/patients" class="btn btn-primary">Cancelar</a>
          </div>
    </form>
</div>
@endsection
