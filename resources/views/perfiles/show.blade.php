@extends('layouts.app')
{{-- @section('botones')
    <a href="{{ route('perfiles.edit', $perfil->user_id) }}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">Editar Perfil</a>
@endsection --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12">
                @if ($perfil->imagen)
                    <img src="/storage/{{ $perfil->imagen }}" class="w-100 rounded-circle" alt="">
                @endif
            </div>
            <div class="col-md-7 col-sm-12 mt-5 mt-md-0">
                <h1 class="text-primary text-center">Perfil De: {{ $perfil->usuario->name }}
                    {{ $perfil->usuario->apellidop }}
                    {{ $perfil->usuario->apellidom }}</h2>
                    <div class="biografia">
                        {!! $perfil->biografia !!}
                    </div>

            </div>
        </div>
    </div>
@endsection
