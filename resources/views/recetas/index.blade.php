@extends('layouts.app')
@section('botones')
    <a href="{{ route('recetas.create') }}" class="btn btn-primary mr-2 text-white">Crear Receta</a>
@endsection
@section('content')
    <h2 class="text-center mb-2">Recetas Laravel</h2>
    <div class="col-md-10 mx-auto bg-white p-3">
        <div class="table-responsive">
            <table class="table">
                <thead class="bg-primary text-light">
                    <tr>
                        <th scole="col">Titulo</th>
                        <th scole="col">Categoria</th>
                        <th scole="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recetas as $id => $receta)
                        <tr>
                            <td>{{ $receta->titulo }}</td>
                            {{-- concatenacion de péticiones por medio del modelo relacional modelo --}}
                            <td>{{ $receta->categoria->nombre }}</td>
                            <td>
                                <eliminar-receta eliminar-id="{{$receta->id}}">
                                </eliminar-receta>
                                      <a  href="{{ route('recetas.edit', $receta->id) }}"
                                          class="btn btn-dark d-block mb-1">Editar</a>
                                      {{-- formato para utilzir show es ('ruta_declarada',id) --}}
                                      <a  href="{{ route('recetas.show', $receta->id) }}"
                                          class="btn btn-success d-block mb-1">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
