@extends('layouts.app')
@section('botones')
    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-white">Mis Receta</a>
@endsection
@section('content')
    <h2 class="text-center mb-2">Crear Nueva Receta</h2>
    <div class="row justify-content-center mt-2" novalidate>
        <div class="col-md-8">
            <form method="POST" action="{{ route('recetas.store') }}">
                @csrf
                <div class="form-group">
                    <label for="titulo">Tittulo Receta</label>
                    <input type="text" value="{{old('titulo')}}" class="form-control @error('titulo')  is-invalid @enderror" name="titulo" id="titulo" placeholder="Titulo receta">
                @error('titulo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <input type="submit" value="Registrar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
