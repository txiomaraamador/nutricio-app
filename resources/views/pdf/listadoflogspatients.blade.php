@extends('layouts.pdfinicio')
@section('content')

<div class="container">
    <img src="images\logo.jpg" class="card-img-top">
        <div class="container-fluid">
            <h1 class="display-10">Historial de Comidas</h1>
            <h5 class="display-10">Paciente: {{ $patient->lastname }}, {{ $patient->name }} </h5>
            <h5 class="display-10">Edad: {{ $patient->age }} </h5>
            <h5 class="display-10">Sexo: {{ $patient->sex }} </h5>
        </div>
        <!-- Mostrar la lista de comidas del paciente -->
        <table class="table table-hover">
            <!-- Encabezados de la tabla -->
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Contenido</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <!-- Cuerpo de la tabla -->
            <tbody class="table-group-divider">
                @foreach ($flogs as $flog)
                    <tr>
                        <td>{{ $flog->type }}</td>
                        <td>{{ $flog->content }}</td>
                        <td>{{ $flog->date }}</td>
                        <td>{{ $flog->hour }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection