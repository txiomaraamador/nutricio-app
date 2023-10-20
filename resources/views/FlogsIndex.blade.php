@extends('layouts.app')

@section('title', 'Patients Index')

@section('content')
<div class="container">
    <h1 class="display-6">Listado de Comidas</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Contenido</th>
                <th>Paciente</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($flogs as $flog)
            <tr>
                <td>{{$flog->id}}</td>
                <td>{{$flog->type}}</td>
                <td>{{$flog->content}}</td>
                <td>{{$flog->patient_id}}</td>
                <td>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                        <!-- Botón para editar el cliente -->
                        <a href="{{ route('flogs.edit', $flog->id) }}" class="btn btn-success" role="button">Editar</a>

                        <!-- Botón de eliminación -->
                        <form method="POST" action="{{ route('flogs.destroy', $flog->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" role="button">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
