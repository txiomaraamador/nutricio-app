@extends('layouts.pdfinicio')


@section('content')

    <div class="container">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <h1 class="display-10">Listado de Pacientes</h1>
            </div>
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
