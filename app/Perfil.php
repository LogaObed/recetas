<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    //relacuion uno a uno de perfil a usuario como llave foranea
    public function usuario(){
        return $this->belongsTo(User::class,'user_id');
    }
}
