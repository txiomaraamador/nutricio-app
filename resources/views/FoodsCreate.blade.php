@extends('layouts.app')

@section('title', 'Flog Create')
@section('content')

    <div class="container mt-5">
        <h1 class="display-6">Agregar Comida</h1>
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

        {!! Form::open(['url' => '/foods', 'method' => 'POST', 'class' => 'row g-3 needs-validation']) !!}
            {!! csrf_field() !!}
            <div class="col-md-6">
                {!! Form::label('patient_id', 'Paciente:', ['class' => 'form-label']) !!}
                {!! Form::select('patient_id', $patients->pluck('name', 'id'), null, ['class' => 'form-select', 'required' => 'required', 'placeholder' => 'Elige el paciente']) !!}
            </div>
            @include('FormFoodsDatos')
            <h2>Agregar alimentos</h2>
        <form method="POST" action="{{ route('foods.store') }}">
            @csrf
            <div class="form-group">
                {!! Form::label('flog_type', 'Selecciona el Tipo de Flogs:') !!}
                {!! Form::select('flog_type', $flogs->pluck('type', 'id'), null, ['class' => 'form-select', 'required' => 'required', 'placeholder' => 'Eligir tipo de alimento']) !!}
            </div>
            
            <!-- Resto del formulario -->
            <div class="form-group">
                {!! Form::label('flogs', 'Selecciona los Flogs:') !!}
                {!! Form::select('flogs[]', $flogs->pluck('aliment', 'id'), null,['class' => 'form-select', 'required' => 'required', 'placeholder' => 'Eligir un alimento']) !!}
            </div>
            
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="/foods" class="btn btn-success">Cancelar</a>
        </form>
        
        {!! Form::close() !!}
        
    </div>
@endsection