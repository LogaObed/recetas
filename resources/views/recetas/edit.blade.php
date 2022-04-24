@extends('layouts.app')
@section('botones')
    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-white">Mis Receta</a>
@endsection
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css" integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <h2 class="text-center mb-2">Editar Receta: {{$receta->titulo}}</h2>
    <div class="row justify-content-center mt-2" novalidate>
        <div class="col-md-8">
            <form method="POST" action="{{ route('recetas.update',['receta'=>$receta->id]) }}" enctype="multipart/form-data" novalidate>
                {{-- @csrf token necesario para que el formulario sea enviado --}}
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="titulo">Tittulo Receta</label>
                    <input type="text" value="{{$receta->titulo}}" 
                        class="form-control @error('titulo') is-invalid @enderror" name="titulo" id="titulo"
                        placeholder="Titulo receta">
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    {{-- <input type="text" value="{{ old('categoria') }}"
                         name="categoria" id="categoria"
                        placeholder="Categoria receta"> --}}
                    <select name="categoria" id="categoria" class="form-control @error('categoria') is-invalid @enderror">
                        <option value="">Seleccionar Categoria</option>
                        @foreach ($categorias as $categoria)
                            {{-- El campo $receta_id ==  $categoria->$id ? 'selected':'' contiene un if en ? y el : es else --}}

                            <option value="{{ $categoria->id }}" {{ $receta->categoria_id == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="preparacion">Preparación</label>
                    {{-- <input type="text" value="{{ old('preparacion') }}"
                        class="form-control @error('preparacion') is-invalid @enderror" name="preparacion" id="preparacion"
                        placeholder="preparacion receta"> --}}
                        <input type="hidden" name="preparacion" id="preparacion" value="{{$receta->preparacion}}" {{ old('preparacion') }}>
                        <trix-editor input="preparacion" ></trix-editor>
                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ingredientes">Ingredientes</label>
                    {{-- <input type="text" value="{{ old('ingredientes') }}"
                        class="form-control @error('ingredientes') is-invalid @enderror" name="ingredientes"
                        id="ingredientes" placeholder="ingredientes receta"> --}}
                        <input type="hidden" name="ingredientes" id="ingredientes" value="{{$receta->ingredientes}}" {{ old('ingredientes') }}>
                        <trix-editor input="ingredientes" ></trix-editor>
                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror" id="imagen">
                    <div class="mt-4">
                        <p>Imagen Actual</p>
                        <img src="/storage/{{$receta->imagen}}" alt="" style="width: 100%">
                    </div>
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
                        <input type="submit" value="Editar" class="btn btn-primary">
                    </center>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>   
@endsection