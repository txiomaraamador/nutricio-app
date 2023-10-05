@extends('layouts.app')

@section('title', 'Flogs Index')

@section('content')
<div class="container">
    <h2>Listado de comidas</h2>
        @foreach ($flogs as $flog)
            <div class="card">
                <h5 class="card-header">{{$flog->type}}</h5>
                <div class="card-body">
                    <h5 class="card-title">{{$flog->content}}</h5>
                    <a href="#" class="btn btn-primary">Ver Detalle</a>
                </div>
        @endforeach
    </div>
</div>
@endsection
