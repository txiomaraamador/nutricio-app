@extends('layouts.pdfinicio')
@section('content')

    <div class="container">
        <nav class="navbar bg-body-tertiary">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <img src="images\logo3.jpg" style="height: 100px; width: 130px;">
            </div>
            <h3 class="display-6">NUTRICIO<br>Historial de pacientes<br>Lista de chequeo</a></h3>
        </nav>

        <table class="table table-hover">
            <thead>
                <tr>
                    
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Nutriologo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($foods as $food)
                    <tr>
                        
                        <td>{{ $food->type }}</td>
                        <td>{{ $food->content }}</td>
                        <td>{{ $food->namepatients->name }}</td>
                        <td>{{ $food->date }}</td>
                        <td>{{ $food->hour }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
