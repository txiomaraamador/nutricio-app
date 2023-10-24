@extends('layouts.app')

@section('title', 'Flog Create')
@section('content')
@include('header')
<div class="container mt-5">
    <h1 class="display-6">Editar Comida de {{ $flog->namepatients->name }}</h1>
    <hr style="color: #000000;" />


    <form class="row g-3 needs-validation" method="POST" action="{{ route('flogs.update', $flog->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- Usa el método PUT para actualización --}}

        <div class="col-md-6">
            <label for="type" class="form-label">Tipo:</label>
            <select type="text" name="type" class="form-select" value="{{$flog->type}}" required>
            <option selected>Elige uno</option>
                <option value="Comida">Comida</option>
                <option value="Cena">Cena</option>
                <option value="Desayuno">Desayuno</option>
                <option value="Colacion">Colación</option>
            </select>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="content" class="form-label">Contenido:</label>
            <input type="text" name="content" class="form-control" value="{{$flog->content}}"required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Guardar cambios</button>
            <a href="/flogs" class="btn btn-primary mt-3">Volver a la lista de Comidas</a>
          </div>
    </form>
</div>
@endsection
