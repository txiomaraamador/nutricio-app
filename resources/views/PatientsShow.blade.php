@extends('layouts.app')

@section('title', 'Patient Show')

@section('content')

    <div class="container">
        <script>
            function confirmDelete(id) {
                if (confirm("¿Estás seguro de que quieres eliminar este paciente?")) {
                    // Si el usuario confirma, redirigir al controlador para eliminar el paciente
                    window.location.href = '/patients/delete/' + id;
                }
            }
        </script>
        <nav class="navbar bg-body-tertiary">
            <h1 class="display-6">Detalles de Paciente</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="/patients" class="btn btn-outline-success mt-3">Regresar</a>
            </div>
        </nav>
        <hr style="color: #000000;" />
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ $patient->lastname }}, {{ $patient->name }}</h5>
                    </div>
                    <div class="card-body">
                        
                        <br>
                        <p class="card-text">Fecha de nacimiento: {{ $patient->date_of_birth }}</p>
                        <p class="card-text">Edad: {{ $patient->age }} años</p>
                        <p class="card-text">Peso: {{ $patient->weight }} kg</p>
                        <p class="card-text">Altura: {{ $patient->height }} m</p>
                        <p class="card-text">Sexo: {{ $patient->sex }}</p>
                        <p class="card-text">Nutriologo: {{ $patient->nameuser->name }}</p>
                        <!-- Botones de editar y eliminar con formato de Bootstrap -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                            <!-- Botón para editar el cliente -->
                            {!! Form::open(['route' => ['patients.edit', $patient->id], 'method' => 'GET']) !!}
                                {!! Form::button('Editar', ['type' => 'submit', 'class' => 'btn btn-success']) !!}
                            {!! Form::close() !!}

                            <!-- Botón de eliminación -->
                            {!! Form::open(['route' => ['patients.destroy', $patient->id], 'method' => 'DELETE']) !!}
                                {!! csrf_field() !!}
                                {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'confirmDelete('.$patient->id.')']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        {{ $patient->id }}: {{ $patient->code }}
                    </div>
                </div>
                
            </div>
        </div>
        <script>
            @if(session('success'))
                alert("{{ session('success') }}");
            @elseif(session('error'))
                alert("{{ session('error') }}");
            @endif
        </script>
    </div>
@endsection
