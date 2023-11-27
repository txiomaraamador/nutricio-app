
@extends('layouts.pdfinicio')
@section('content')



<div class="container">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <h1 class="display-10">Historial de Comidas para {{ $patient->name }} </h1>
        </div>
    </nav>
    <hr style="color: #000000;" />
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
@foreach ($foods as $date => $groupedFoods)
<h4>Comidas para la fecha: {{ $date }}</h4>

    <!-- Mostrar la lista de comidas del paciente -->
    <table class="table table-hover">
        <!-- Encabezados de la tabla -->
        <thead>
            <tr>
               
                <th>Contenido</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>
        </thead>
        <!-- Cuerpo de la tabla -->
        <tbody class="table-group-divider">

            @foreach ($groupedFoods as $food)
            
                <tr>
                    <td>{{ $food->type }}</td>
                    <td>{{ $food->date }}</td>
                    <td>{{ $food->hour }}</td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                        </div>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>

    @endforeach
</div>
@endsection