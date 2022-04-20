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
                    <input type="text" value="{{ old('titulo') }}" class="form-control @error('titulo') is-invalid @enderror"
                        name="titulo" id="titulo" placeholder="Titulo receta">
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <input type="text" value="{{ old('categoria') }}"
                        class="form-control @error('categoria') is-invalid @enderror" name="categoria" id="categoria"
                        placeholder="Categoria receta">
                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ingredientes">Ingredientes</label>
                    <input type="text" value="{{ old('ingredientes') }}"
                        class="form-control @error('ingredientes') is-invalid @enderror" name="ingredientes" id="ingredientes"
                        placeholder="ingredientes receta">
                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              
                <div class="form-group">
                    <label for="preparacion">Preparación</label>
                    <input type="text" value="{{ old('preparacion') }}"
                        class="form-control @error('preparacion') is-invalid @enderror" name="preparacion" id="preparacion"
                        placeholder="preparacion receta">
                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror" id="imagen">
                    {{-- <input type="text" value="{{ old('preparacion') }}"
                        class="form-control @error('preparacion') is-invalid @enderror" name="preparacion" id="preparacion"
                        placeholder="preparacion receta"> --}}
                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                   <center>
                    <input type="submit" value="Registrar" class="btn btn-primary">
                   </center>
                </div>
            </form>
        </div>
    </div>
@endsection
