@extends('layouts.app')

@section('title', 'Patient Edit')

@section('content')
    @include('header')
    <div class="container mt-5">
        <h1 class="display-6">Editar Paciente de Nutriologo {{ $patient->nameuser->name }}</h1>
        <hr style="color: #000000;" />

        {!! Form::model($patient, ['route' => ['patients.update', $patient->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'row g-3 needs-validation']) !!}
        {!! csrf_field() !!}

        <div class="col-md-6">
            {!! Form::label('name', 'Nombre:', ['class' => 'form-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            {!! Form::label('code', 'Code:', ['class' => 'form-label']) !!}
            {!! Form::text('code', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            {!! Form::label('sex', 'Sexo:', ['class' => 'form-label']) !!}
            {!! Form::text('sex', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="d-grid gap-2">
            {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary']) !!}
            <a href="/patients" class="btn btn-primary mt-3">Volver a la lista de pacientes</a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
