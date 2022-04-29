@extends('layouts.app')
@section('botones')
    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-white">Mis Receta</a>
@endsection
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css"
        integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <h1 class="text-center">Editar Perfil {{ $perfil->usuario->name }} {{ $perfil->usuario->apellidop }}
        {{ $perfil->usuario->apellidom }}</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-8">
                <form action="{{ route('perfiles.update', ['perfil' => $perfil->id]) }}" method="post"
                    enctype="multipart/form-data" novalidate>
                    {{-- csrf es el token del formulario --}}
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" value="{{ $perfil->usuario->name }}" name="nombre"
                            id="nombre">
                        @error('nombre')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="apellidop">Apellido Paterno</label>
                        <input type="text" class="form-control @error('apellidop') is-invalid @enderror"
                            value="{{ $perfil->usuario->apellidop }} " name="apellidop" id="apellidop">
                        @error('apellidop')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="apellidom">Apellido Materno</label>
                        <input type="text" class="form-control @error('apellidom') is-invalid @enderror"
                            value="{{ $perfil->usuario->apellidom }}" name="apellidom" id="apellidom">
                        @error('apellidom')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="biografia">Biografia</label>
                        <input type="hidden" name="biografia" id="biografia" value="{{$perfil->biografia}}">
                        <trix-editor input="biografia" class="h-auto form-control @error('biografia') is-invalid @enderror"></trix-editor>
                        @error('biografia')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="@error('imagen') is-invalid @enderror form-control" id="imagen"
                            class="imagen">
                        @if ($perfil->imagen)
                            <div class="mt-4">
                                <p>Imagen Actual</p>
                                <img src="/storage/{{ $perfil->imagen }}" alt="" style="width: 100%">
                            </div>
                        @endif
                        @error('imagen')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <center>
                            <input type="submit" value="Editar" class="mt-2 btn btn-primary">
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js"
        integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection
