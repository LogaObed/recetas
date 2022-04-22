<?php

namespace App\Http\Controllers;

use App\CategoriaReceta;
use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Laravel\Ui\Presets\React;

class RecetaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // Se peudde utilizar la configuracion auth()-> 0 Auth::;
        // Auth::user()->recetas->dd();
        $recetas=auth()->user()->recetas;
        return view('recetas.index')->with('recetas',$recetas);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //     Se Ocupa el motodo get para seleccionar, pluck para solicitar los campos especificos y add solo imprime el areglo
    //    DB::table('categoria_recetas')->get()->pluck('nombre','id')->dd();
    //     $categorias = DB::table('categoria_recetas')->get()->pluck('nombre','id');
        // // obtener categoria con modelo
        $categorias = CategoriaReceta::all(['id','nombre']);
        // with ayuda a compartir los datos como variable
        return view('recetas.create')->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store se validan os formularios e inserta
        $data=request()->validate([
            'titulo'=>'required',
            'categoria'=>'required',
            // 'ingredientes'=>'required|min:40|max:255',
            'ingredientes'=>'required',
            'preparacion'=>'required',
            'imagen'=>'required|image',
        ]);
        // Toma el dato imagen del form $request['imagen']->store('upload-recetas','public') y la guarda
        //  $request['imagen']->store('nombre_carpeta','public') la imgan es guardada en storage/app/publuc y se puede ocupar como ruta ala base de datos
        $ruta_img = $request['imagen']->store('upload-recetas','public');
        // redimencionar la imagen se debe instalar intervention image
        $img = Image::make(public_path("storage/{$ruta_img}"))->fit(1000,550);
        $img->save();
        // insertar a la base de datos con modelo
        // auth()->user()-> recetas() ya obtiene los datos de la base de datos como el id de usuario 
        auth()->user()->recetas()->create([
                'titulo'=>$data['titulo'],
                'categoria_id'=>$data['categoria'],
                'imagen'=>$ruta_img,
                'ingredientes'=>$data['ingredientes'],
                'preparacion'=>$data['preparacion'],
        ]);
        return redirect()->action('RecetaController@index');
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //muestra los datos de una consulta por get forma abreviada de pasar datos 
      return view('recetas.show',compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
