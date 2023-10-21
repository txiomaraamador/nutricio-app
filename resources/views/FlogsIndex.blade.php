@extends('layouts.app')

@section('title', 'Patients Index')

@section('content')
@include('header')
<div class="container">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <h1 class="display-10">Listado de Comidas</h1>
            <form class="d-flex" role="search">  
                <a href="/flogs/create" class="btn btn-outline-primary">Agregar comida</a>
            </form>
        </div>
    </nav>
    <script>
        function confirmDelete(id) {
            if (confirm("¿Estás seguro de que quieres eliminar esta comida?")) {
                // Si el usuario confirma, redirigir al controlador para eliminar el paciente
                window.location.href = '/flogs/delete/' + id;
            }
        }
    </script>
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
                <td>{{$flog->Patients->name}}</td>
                <td>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                        <!-- Botón para editar el cliente -->
                        <a href="{{ route('flogs.edit', $flog->id) }}" class="btn btn-primary" role="button">Editar</a>

                        <!-- Botón de eliminación -->
                        <form method="POST" action="{{ route('flogs.destroy', $flog->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" role="button" onclick="confirmDelete({{ $flog->id }})">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
