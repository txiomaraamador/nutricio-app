@extends('layouts.pdfinicio')

@section('content')
    <div class="container">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <h1 class="display-10">Listado de Comidas</h1>
            </div>
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
