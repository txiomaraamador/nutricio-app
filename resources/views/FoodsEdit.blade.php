@extends('layouts.app')

@section('title', 'Editar Comida')
@section('content')

    <div class="container mt-5">
        <h1 class="display-6">Editar Comida de {{ $foods->namepatients->name }}</h1>
        <hr style="color: #000000;" />

        {!! Form::model($foods, ['route' => ['foods.update', $foods->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'row g-3 needs-validation']) !!}
            {!! csrf_field() !!}
            @include('FormFoodsDatos')
            <div class="d-grid gap-2">
                {!! Form::submit('Guardar cambios', ['class' => 'btn btn-success']) !!}
                <a href="/foods" class="btn btn-success mt-3">Volver a la lista de Comidas</a>
            </div>
        {!! Form::close() !!}
    </div>
@endsection

