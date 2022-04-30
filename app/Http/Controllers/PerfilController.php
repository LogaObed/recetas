<?php

namespace App\Http\Controllers;

use App\Perfil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
         // abrir la visualziacion al apartado show ['except'=>['show','create']])
         $this->middleware('auth', ['except' => 'show']);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //
        return view('perfiles.show',compact('perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        //
        $this -> authorize('update',$perfil);
        return view('perfiles.edit',compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
      
        $this -> authorize('update',$perfil);
          $data = request()->validate([
            'nombre' => 'required',
            'apellidop' => 'required',
            'biografia' => 'required',
            // 'ingredientes'=>'required|min:40|max:255',
            'apellidom' => 'required',
        ]);
        // editar infomacion en campo bd del usuario
        auth()->user()->name = $data['nombre'];
        auth()->user()->apellidop = $data['apellidop'];
        auth()->user()->apellidom = $data['apellidom'];
        auth()->user()->save();
        //editar al perfil
        if(request('imagen')){
            //eliminar imagen anterior
            unlink(public_path("storage/{$perfil->imagen}"));
            //obtiendo una neuva ruta para la imagen y su alojamiento
            $ruta_img = $request['imagen']->store('upload-perfiles', 'public');
            // redimencionar la imagen se debe instalar intervention image
            $img = Image::make(public_path("storage/{$ruta_img}"))->fit(600, 600);
            $img->save();
            $perfil->imagen = $ruta_img;
        }
        $perfil->biografia = $data['biografia'];
        $perfil->save();
        return view('perfiles.show',compact('perfil'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
