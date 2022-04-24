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
                                <center>
                                    <a style="margin-top:1%;" href="" class="btn btn-danger">Eliminar</a>
                                    <a style="margin-top:1%;" href="{{ route('recetas.edit', $receta->id) }}"
                                        class="btn btn-dark">Editar</a>
                                    {{-- formato para utilzir show es ('ruta_declarada',id) --}}
                                    <a style="margin-top:1%;" href="{{ route('recetas.show', $receta->id) }}"
                                        class="btn btn-success">Ver</a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
