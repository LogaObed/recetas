<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    //Campos de proteccion
     protected $fillable = [
        'titulo', 'categoria_id','imagen', 'ingredientes','preparacion'
    ];
    public function categoria()
    {
        // obtiem informacion por llave foranea FK belongsTo(una receta puede pertenecer a difentes categorias)
        return $this->belongsTo(CategoriaReceta::class,'categoria_id');
    }
    public function autor()
    {
        // obtiem informacion por llave foranea FK belongsTo(una receta puede pertenecer a difentes categorias)
        return $this->belongsTo(User::class,'user_id');
    }
}
