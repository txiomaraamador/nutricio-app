@extends('layouts.app')

@section('title', 'Patients Index')

@section('content')
<div class="container">
    <h2>Listado de Pacientes</h2>
        @foreach ($patients as $patient)
            <div class="card">
                <h5 class="card-header">{{$patient->name}}</h5>
                <div class="card-body">
                    <h5 class="card-title">{{$patient->code}}</h5>
                    <p class="card-text">{{$patient->sex}}</p>
                    <p class="card-text">{{$patient->user_id}}</p>
                    <a href="#" class="btn btn-primary">Ver historial de comidas</a>
                </div>
        @endforeach
    </div>
</div>
@endsection
