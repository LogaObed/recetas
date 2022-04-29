@extends('layouts.app')
@section('botones')
    <a href="{{ route('perfiles.edit',$perfil->user_id)}}" class="btn btn-primary mr-2 text-white">Editar Perfil</a>
@endsection
@section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-12">
            Imagen
        </div>
        <div class="col-md-7 col-sm-12">
    
            <h1 class="text-primary text-center">Perfil De: {{ $perfil->usuario->name }} {{ $perfil->usuario->apellidop }}
                {{ $perfil->usuario->apellidom }}</h2>
                <div class="biografia">
                    {!!$perfil->biografia!!}
                </div>
    
        </div>
      </div>
  </div>
@endsection
