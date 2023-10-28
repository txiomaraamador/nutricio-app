@extends('layouts.app')

@section('title', 'Patient Create')
@section('content')
    @include('header')
    <div class="container mt-5">
        <h1 class="display-6">Agregar Paciente</h1>
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

        {!! Form::open(['url' => '/patients', 'method' => 'POST', 'class' => 'row g-3 needs-validation']) !!}
            {!! csrf_field() !!}
            @include('FormPacienteDatos')
            <div class="col-md-6">
                {!! Form::label('user_id', 'Nutriologo:', ['class' => 'form-label']) !!}
                {!! Form::select('user_id', $users->pluck('name', 'id'), null, ['class' => 'form-select', 'required' => 'required', 'placeholder' => 'Elige un nutriologo']) !!}
            </div>

            <div class="d-grid gap-2">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="/patients" class="btn btn-primary">Cancelar</a>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
