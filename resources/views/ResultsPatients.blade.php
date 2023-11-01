@extends('layouts.app')
@section('title', 'Resultados de Búsqueda')
@section('content')

<h2>Resultados de Búsqueda</h2>

<form action="{{ route('search') }}" method="GET">
    <input type="text" name="query" placeholder="Buscar...">
    <button type="submit">Buscar</button>
</form>

@if ($results->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                    <th>Nombre</th>
                    <th>Nutriologo</th>
                    <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $patient)
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
@else
    <p>No se encontraron resultados para la consulta: <strong>{{ request('query') }}</strong></p>
@endif
@endsection
