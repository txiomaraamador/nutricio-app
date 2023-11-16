@extends('layouts.app')

@section('title', 'Alimentos Index')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <div class="container">
        
        <script>
            function confirmDelete(id) {
                if (confirm("¿Estás seguro de que quieres eliminar esta comida?")) {
                    // Si el usuario confirma, redirigir al controlador para eliminar el registro
                    window.location.href = '/flogs/delete/' + id;
                } else {
                    // Si el usuario cancela, no hacer nada
                    return false;
                }
            }

        </script>
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
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <h1 class="display-10">Listado de Alimentos</h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            {!! Form::open(['url' => '/flogs/create', 'class' => 'd-flex', 'role' => 'search']) !!}
                {!! Form::button('Agregar alimento', ['type' => 'submit', 'class' => 'btn btn-outline-success']) !!}
            {!! Form::close() !!}
            <form action="{{ route('searchflog') }}" method="GET" class="d-flex" role="search">
                <input type="search" name="query" placeholder="Buscar..." class="form-control me-2" >
                <button class="btn btn-outline-warning" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>
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
                <td>{{ $flog->aliment }}</td>
                <td>{{ $flog->kcal }} kcal</td>
                <td>{{ $flog->protein }} g</td>
                <td>{{ $flog->carbohydrates }} g</td>
                <td>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                        <!-- Botón para editar el cliente -->
                        

                        <!-- Botón de eliminación -->
                        {!! Form::open(['route' => ['flogs.destroy', $flog->id], 'method' => 'DELETE']) !!}
                        {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return confirmDelete('.$flog->id.')']) !!}

                        {!! Form::close() !!}
                    </div>
                </td> 
            </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center mt-4">
    <a href="{{ url('/flogs') }}" class="btn btn-success">Mostrar Todos</a>
</div>



@else
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <h1 class="display-10">Listado de Alimentos</h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            {!! Form::open(['url' => '/flogs/create', 'class' => 'd-flex', 'role' => 'search']) !!}
                {!! Form::button('Agregar alimento', ['type' => 'submit', 'class' => 'btn btn-outline-success']) !!}
            {!! Form::close() !!}
            <a href="{{route('listadofoods.pdf')}}" class="btn btn-outline-success">PDF <i class="bi bi-download"></i></a>

            <form action="{{ route('searchfood') }}" method="GET" class="d-flex" role="search">
                <input type="search" name="query" placeholder="Buscar..." class="form-control me-2" >
                <button class="btn btn-outline-warning" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>
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
<table class="table table-hover">
    <thead>
        <tr>
            <th>Tipo de alimento</th>
            <th>Nombre</th>
            <th>Calorias por 100g</th>
            <th>Proteina por 100g</th>
            <th>Carbohidratos por 100g</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($flogs as $flog)
            <tr>
                <td>{{ $flog->type }}</td>
                <td>{{ $flog->aliment }}</td>
                <td>{{ $flog->kcal }} kcal</td>
                <td>{{ $flog->protein }} g</td>
                <td>{{ $flog->carbohydrates }} g</td>
                <td>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                        <!-- Botón para editar el cliente -->
                        

                        <!-- Botón de eliminación -->
                        {!! Form::open(['route' => ['flogs.destroy', $flog->id], 'method' => 'DELETE']) !!}
                        {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return confirmDelete('.$flog->id.')']) !!}

                        {!! Form::close() !!}
                    </div>
                </td> 
            </tr>
        @endforeach
    </tbody>
        @endif
    </div>
@endsection
