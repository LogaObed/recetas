@extends('layouts.app')
@section('botones')
    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-white">Mis Receta</a>
@endsection
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <h2 class="text-center mb-2">Crear Nueva Receta</h2>
    <div class="row justify-content-center mt-2" novalidate>
        <div class="col-md-8">
            <form method="POST" action="{{ route('recetas.store') }}" enctype="multipart/form-data" novalidate>
                {{-- @csrf token necesario para que el formulario sea enviado --}}
                @csrf
                <div class="form-group">
                    <label for="titulo">Tittulo Receta</label>
                    <input type="text" value="{{ old('titulo') }}"
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
                        @foreach ($categorias as $id => $categoria)
                            {{-- El campo old('categoria') == $id ? 'selected':'' contiene un if en ? y el : es else --}}

                            <option value="{{ $id }}" {{ old('categoria') == $id ? 'selected' : '' }}>
                                {{ $categoria }}</option>
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
                        <input type="hidden" name="preparacion" id="preparacion" value="{{ old('preparacion') }}">
                        <trix-editor input="preparacion"></trix-editor>
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
                        <input type="hidden" name="ingredientes" id="ingredientes" value="{{ old('ingredientes') }}">
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
@section('scripts')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
