<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $recetas = ['Receta pizza', 'Receta hamburgesa', 'Recetas tacos', 'Recetas Huevitos'];
        $categorias = ['Comida Mexicana', 'Comida Argentina', 'Comida Colombiana'];
        $postres = ['Postre Mexicano', 'Postre Argentino', 'Postre Colombiano'];
        // return view('recetas.index')->with('recetas', $recetas)->with('categorias', $categorias)->with('postres',$postres);
        return view('recetas.index',compact('recetas','categorias','postres'));
    }
}
