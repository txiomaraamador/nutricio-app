@extends('layouts.app')

@section('title', 'Editar Comida')
@section('content')
    @include('header')
    <div class="container mt-5">
        <h1 class="display-6">Editar Comida de {{ $flog->namepatients->name }}</h1>
        <hr style="color: #000000;" />

        {!! Form::model($flog, ['route' => ['flogs.update', $flog->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'row g-3 needs-validation']) !!}
            {!! csrf_field() !!}
            @include('FormFlogsDatos')
            <div class="d-grid gap-2">
                {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary']) !!}
                <a href="/flogs" class="btn btn-primary mt-3">Volver a la lista de Comidas</a>
            </div>
        {!! Form::close() !!}
    </div>
@endsection

