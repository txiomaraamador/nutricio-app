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
       
            @csrf

            <button type="button" id="addFormFlogs" class="btn btn-primary">Agregar otro FormFlogs</button>

            <div id="formFlogsContainer">
                @include('FormFlogs')
            </div>
        
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#addFormFlogs').click(function() {
                        // Clona el contenido de FormFlogs y agrega un identificador único
                        var clonedFormFlogs = $('#formFlogsContainer').children().first().clone();
                        var uniqueId = Date.now();
                        clonedFormFlogs.find('[id]').each(function() {
                            $(this).attr('id', $(this).attr('id') + uniqueId);
                        });
                        $('#formFlogsContainer').append(clonedFormFlogs);
                    });
                });
            </script>
            
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="/foods" class="btn btn-success">Cancelar</a>
        </form>
        
        {!! Form::close() !!}
        
    </div>
    
@endsection