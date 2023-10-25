@extends('layouts.app')

@section('title', 'Patients Index')

@section('content')
    @include('header')
    <div class="container">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <h1 class="display-10">Listado de Pacientes</h1>
                {!! Form::open(['url' => '/patients/create', 'class' => 'd-flex', 'role' => 'search']) !!}
                    {!! Form::button('Agregar paciente', ['type' => 'submit', 'class' => 'btn btn-outline-primary']) !!}
                {!! Form::close() !!}
            </div>
        </nav>

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

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Nutriologo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->code }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->nameuser->name }}</td>
                        <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                {!! Form::open(['route' => ['patients.showFlogs', $patient->id], 'method' => 'GET']) !!}
                                    {!! Form::button('Ver historial de comidas', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                                {!! Form::open(['route' => ['patients.show', $patient->id], 'method' => 'GET']) !!}
                                    {!! Form::button('Ver Detalles', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
