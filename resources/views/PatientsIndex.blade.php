@extends('layouts.app')

@section('title', 'Patients Index')

@section('content')
<div class="container">
    <h1 class="display-6">Listado de Pacientes</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($patients as $patient)
            <tr>
                <td>{{$patient->code}}</td>
                <td>{{$patient->name}}</td>
                <td>
                    <a href="#" class="btn btn-primary">Ver historial de comidas</a>
                    <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-primary">Ver Detalles</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
