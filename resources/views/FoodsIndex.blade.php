@extends('layouts.app')

@section('title', 'Patients Index')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <div class="container">
        
        <script>
            function confirmDelete(id) {
                if (confirm("¿Estás seguro de que quieres eliminar esta comida?")) {
                    // Si el usuario confirma, redirigir al controlador para eliminar el registro
                    window.location.href = '/food/delete/' + id;
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
        <h1 class="display-10">Listado de Comidas</h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            {!! Form::open(['url' => '/foods/create', 'class' => 'd-flex', 'role' => 'search']) !!}
                {!! Form::button('Agregar comida', ['type' => 'submit', 'class' => 'btn btn-outline-success']) !!}
            {!! Form::close() !!}
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
            <th>Tipo</th>
            <th>Contenido</th>
            <th>Paciente</th>
            <th>Fecha</th>
            <th>Hora</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($results as $food)
            <tr>
                <td>{{ $food->type }}</td>
                <td>{{ $food->content }}</td>
                <td>{{ $food->namepatients->name }}</td>
                <td>{{ $food->date }}</td>
                <td>{{ $food->hour }}</td>
                <td>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                        <!-- Botón para editar el cliente -->
                        {!! Form::open(['route' => ['foods.edit', $food->id], 'method' => 'GET']) !!}
                            {!! Form::button('Editar', ['type' => 'submit', 'class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}

                        <!-- Botón de eliminación -->
                        {!! Form::open(['route' => ['foods.destroy', $food->id], 'method' => 'DELETE']) !!}
                        {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return confirmDelete('.$food->id.')']) !!}

                        {!! Form::close() !!}
                    </div>
                </td> 
            </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center mt-4">
    <a href="{{ url('/foods') }}" class="btn btn-success">Mostrar Todos</a>
</div>
@else
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <h1 class="display-10">Listado de Comidas</h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            {!! Form::open(['url' => '/foods/create', 'class' => 'd-flex', 'role' => 'search']) !!}
                {!! Form::button('Agregar comida', ['type' => 'submit', 'class' => 'btn btn-outline-success']) !!}
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
                    <th>Tipo</th>
                    <th>Contenido</th>
                    <th>Paciente</th>
                    <th>Fecha</th>
                    <th>Hora</th>
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
                        <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                <!-- Botón para editar el cliente -->
                                {!! Form::open(['route' => ['foods.edit', $food->id], 'method' => 'GET']) !!}
                                    {!! Form::button('Editar', ['type' => 'submit', 'class' => 'btn btn-success']) !!}
                                {!! Form::close() !!}

                                <!-- Botón de eliminación -->
                                {!! Form::open(['route' => ['foods.destroy', $food->id], 'method' => 'DELETE']) !!}
                                {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return confirmDelete('.$food->id.')']) !!}
                                {!! Form::close() !!}

                                {!! Form::open(['route' => ['foods.show', $food->id], 'method' => 'GET']) !!}
                                    {!! Form::button('Ver Detalles', ['type' => 'submit', 'class' => 'btn btn-success']) !!}
                                {!! Form::close() !!}
                               <!-- Código de instalación Cliengo para xiomaralizethamadoraguilera@gmail.com --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/65440c5a14ee5c0032c5059c/65440c5d14ee5c0032c5059f.js?platform=view_installation_code'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>
                            </div>
                        </td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection
