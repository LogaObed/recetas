@extends('layouts.app')
@section('botones')
    <a href="{{ route('recetas.create') }}" class="btn btn-primary mr-2 text-white">Crear Receta</a>
@endsection
@section('content')
    <h2 class="text-center mb-2">Eliminar Receta: </h2>
    <div class="col-md-10 mx-auto bg-white p-3">
        <div class="table-responsive">
         {{$receta}}
        </div>
    </div>
@endsection
