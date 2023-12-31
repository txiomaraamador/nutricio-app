@extends('layouts.app')

@section('title', 'Historial de Comidas')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <div class="container">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <h1 class="display-10">Historial de Comidas para {{ $patient->name }} </h1>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="/patients" class="btn btn-outline-success">Regresar</a>
                    <a href="{{ url('/patients/' . $patient->id . '/generate-pdf') }}" class="btn btn-outline-success">Descargar en PDF</a>
                </div>
            </div>
        </nav>
        <hr style="color: #000000;" />
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
@foreach ($foods as $date => $groupedFoods)
<h4>Comidas para la fecha: {{ $date }}</h4>

        <!-- Mostrar la lista de comidas del paciente -->
        <table class="table table-hover">
            <!-- Encabezados de la tabla -->
            <thead>
                <tr>
                   
                    <th>Contenido</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <!-- Cuerpo de la tabla -->
            <tbody class="table-group-divider">

                @foreach ($groupedFoods as $food)
                
                    <tr>
                        <td>{{ $food->type }}</td>
                        <td>{{ $food->date }}</td>
                        <td>{{ $food->hour }}</td>
                        <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                <!-- Botón para editar el cliente -->
                                {!! Form::open(['route' => ['foods.edit', $food->id], 'method' => 'GET']) !!}
                                    {!! Form::button('Editar', ['type' => 'submit', 'class' => 'btn btn-success']) !!}
                                {!! Form::close() !!}

                                <!-- Botón de eliminación -->
                                {!! Form::open(['route' => ['foods.destroy', $food->id], 'method' => 'DELETE']) !!}
                                    {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                
                            </div>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
                    {!! Form::open(['route' => ['foods.showFoodsToday', $food->id], 'method' => 'GET']) !!}
                        {!! Form::button('Mostrar detalles', ['type' => 'submit', 'class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                    <a href="{{ url('/foods/'.$food->id.'/foodspdftoday') }}" class="btn btn-outline-success">PDF <i class="bi bi-download"></i></a>
        </div>
        @endforeach
    </div>
    <hr style="color: #000000;" />
@endsection
