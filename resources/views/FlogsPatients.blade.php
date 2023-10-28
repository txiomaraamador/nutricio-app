@extends('layouts.app')

@section('title', 'Historial de Comidas')

@section('content')
    @include('header')

    <div class="container">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <h1 class="display-10">Historial de Comidas para {{ $patient->name }} </h1>
                {!! Form::open(['url' => '/patients', 'class' => 'd-flex', 'role' => 'search']) !!}
                    {!! Form::button('Regresar', ['type' => 'submit', 'class' => 'btn btn-outline-primary']) !!}
                {!! Form::close() !!}
                <a href="{{ url('/patients/' . $patient->id . '/generate-pdf') }}" class="btn btn-outline-primary">Descargar en PDF</a>

            </div>
        </nav>pg

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

        <!-- Mostrar la lista de comidas del paciente -->
        <table class="table table-hover">
            <!-- Encabezados de la tabla -->
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Contenido</th>
                </tr>
            </thead>
            <!-- Cuerpo de la tabla -->
            <tbody class="table-group-divider">
                @foreach ($flogs as $flog)
                    <tr>
                        <td>{{ $flog->type }}</td>
                        <td>{{ $flog->content }}</td>
                        <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                <!-- Botón para editar el cliente -->
                                {!! Form::open(['route' => ['flogs.edit', $flog->id], 'method' => 'GET']) !!}
                                    {!! Form::button('Editar', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}

                                <!-- Botón de eliminación -->
                                {!! Form::open(['route' => ['flogs.destroy', $flog->id], 'method' => 'DELETE']) !!}
                                    {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
