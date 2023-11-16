@extends('layouts.app')

@section('title', 'Editar Alimento')
@section('content')

    <div class="container mt-5">
        <h1 class="display-6">Editar Alimento</h1>
        <hr style="color: #000000;" />

        {!! Form::model($flog, ['route' => ['foods.update', $flog->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'row g-3 needs-validation']) !!}
            {!! csrf_field() !!}
            @include('FormFlogsDatos')
            <div class="d-grid gap-2">
                {!! Form::submit('Guardar cambios', ['class' => 'btn btn-success']) !!}
                <a href="/flogs" class="btn btn-success mt-3">Volver a la lista de Comidas</a>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
