@extends('layouts.app')
@section('content')
    <article class="contenido-receta">
        <h1 class="text-center mb-4">{{$receta->titulo}}</h1>
        <div class="imagen-receta">
            <img src="/storage/{{$receta->imagen}}" class="w-100" alt="">
        </div>
        <div class="receta-meta">
            <p>
                <span class="font-weight-bold text-primary">Escrito En:</span>
                {{$receta->categoria->nombre}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">Autor:</span>
                <a href="{{route('perfiles.show',$receta->user_id)}}" >{{$receta->autor->name}} {{$receta->autor->apellidop}} {{$receta->autor->apellidom}}</a>
            </p>
            <p>
                <span class="font-weight-bold text-primary">Fecha De Creción:</span>
                {{-- usando moment --}}
                <fecha-receta hola="{{$receta->created_at}}"></fecha-receta>
            </p>
            <p>
                <span class="font-weight-bold text-primary">Fecha De Actualizacion:</span>
                {{-- usando moment --}}
                <fecha-receta hola="{{$receta->updated_at}}"></fecha-receta>
            </p>
        </div>
        <div  class="ingredientes text-justify">
        <h2 class="my-3 text-primary">Ingredientes:</h2>
        {{-- imprimir los ingredientes con codigo html --}}
        
        {!!$receta->ingredientes!!}
    </div>
    <div class="preparacion text-justify">
        <h2 class="my-3 text-primary">Preparación:</h2>
        {!!$receta->preparacion!!}
        </div>
    </article>
@endsection
