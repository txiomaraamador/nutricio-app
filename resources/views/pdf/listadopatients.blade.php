@extends('layouts.pdfinicio')


@section('content')

    <div class="container">
        <nav class="navbar bg-body-tertiary">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <img src="images\logo2.jpg" style="height: 100px; width: 100px;">
            </div>
            <h3 class="display-6">NUTRICIO<br>Historial de pacientes<br>Lista de chequeo</a></h3>
    
        </nav>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Nutriologo</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->code }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->nameuser->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
