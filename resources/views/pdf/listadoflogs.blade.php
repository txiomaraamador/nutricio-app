@extends('layouts.pdfinicio')

@section('content')
<div class="container">
    <nav class="navbar bg-body-tertiary">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <img src="images\logo2.jpg" style="height: 100px; width: 100px;">
        </div>
        <h3 class="display-6">NUTRICIO<br>Historial de comidas<br>Lista de chequeo</a></h3>

    </nav>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Contenido</th>
                    <th>Paciente</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($flogs as $flog)
                    <tr>
                        <td>{{ $flog->type }}</td>
                        <td>{{ $flog->content }}</td>
                        <td>{{ $flog->namepatients->name }}</td>
                        <td>{{ $flog->date }}</td>
                        <td>{{ $flog->hour }}</td>                      
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
