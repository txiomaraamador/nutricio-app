@extends('layouts.app')

@section('title', 'Patients Index')

@section('content')
    @include('header')
    <div class="container">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <h1 class="display-10">Listado de Comidas</h1>
                {!! Form::open(['url' => '/flogs/create', 'class' => 'd-flex', 'role' => 'search']) !!}
                    {!! Form::button('Agregar comida', ['type' => 'submit', 'class' => 'btn btn-outline-primary']) !!}
                {!! Form::close() !!}
                <a href="{{route('listadoflogs.pdf')}}" class="btn btn-outline-primary">Descargar PDF</a>

                <form action="{{ route('searchflog') }}" method="GET" class="d-flex" role="search">
                    <input type="search" name="query" placeholder="Buscar..." class="form-control me-2" >
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
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
@if(isset($results) && count($results) > 0)
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
        @foreach ($results as $flog)
            <tr>
                <td>{{ $flog->type }}</td>
                <td>{{ $flog->content }}</td>
                <td>{{ $flog->namepatients->name }}</td>
                <td>{{ $flog->date }}</td>
                <td>{{ $flog->hour }}</td>
                <td>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                        <!-- Botón para editar el cliente -->
                        {!! Form::open(['route' => ['flogs.edit', $flog->id], 'method' => 'GET']) !!}
                            {!! Form::button('Editar', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}

                        <!-- Botón de eliminación -->
                        {!! Form::open(['route' => ['flogs.destroy', $flog->id], 'method' => 'DELETE']) !!}
                            {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'confirmDelete('.$flog->id.')']) !!}
                        {!! Form::close() !!}
                    </div>
                </td> 
            </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center mt-4">
    <a href="{{ url('/flogs') }}" class="btn btn-primary">Mostrar Todos</a>
</div>
@else
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
                        <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                <!-- Botón para editar el cliente -->
                                {!! Form::open(['route' => ['flogs.edit', $flog->id], 'method' => 'GET']) !!}
                                    {!! Form::button('Editar', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}

                                <!-- Botón de eliminación -->
                                {!! Form::open(['route' => ['flogs.destroy', $flog->id], 'method' => 'DELETE']) !!}
                                    {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'confirmDelete('.$flog->id.')']) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection
