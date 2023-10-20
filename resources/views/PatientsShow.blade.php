@extends('layouts.app')
@section('title', 'Patient Show')
@section('content')

<div class="container">
    <h1 class="display-6">Detalles de Paciente</h1>
    <hr style="color: #000000;" />
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Paciente
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$patient->name}}</h5>
                    <br>
                    <p class="card-text">Codigo: {{$patient->code}}</p>
                    <p class="card-text">Sexo: {{$patient->sex}}</p>

                    <!-- Botones de editar y eliminar con formato de Bootstrap -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                        <!-- Botón para editar el cliente -->
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-success" role="button">Editar</a>

                        <!-- Botón de eliminación -->
                        <form method="POST" action="{{ route('patients.destroy', $patient->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" role="button">Eliminar</button>
                        </form>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    {{$patient->id}}: {{$patient->code}}
                </div>
            </div>
            <a href="/patients" class="btn btn-primary mt-3">Volver a la lista de pacientes</a>
        </div>
    </div>
</div>

@endsection
