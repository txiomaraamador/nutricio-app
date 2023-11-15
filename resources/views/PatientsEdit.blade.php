@extends('layouts.app')

@section('title', 'Patient Edit')

@section('content')
    <div class="container mt-5">
        <h1 class="display-6">Editar Paciente de Nutriologo {{ $patient->nameuser->name }}</h1>
        <hr style="color: #000000;" />

        {!! Form::model($patient, ['route' => ['patients.update', $patient->id], 'method' => 'PUT', 'class' => 'row g-3 needs-validation','enctype' => 'multipart/form-data']) !!}
        {!! csrf_field() !!}

        @include('FormPacienteDatos')
        <div class="d-grid gap-2">
            {!! Form::submit('Guardar cambios', ['class' => 'btn btn-success']) !!}
            <a href="/patients" class="btn btn-success mt-3">Volver a la lista de pacientes</a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
