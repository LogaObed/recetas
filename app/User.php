<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'apellidop', 'apellidom'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // evento que se ejecuta al crear un usuario
    protected static function boot()
    {
        parent::boot();
        static::created(function ($user){
            $user->perfil()->create();
        });
    }
    // relacion de usuarios a recetas de uno a mucho para ser usado en la consulta de sus recetas
    public function recetas()
    {
        return $this->hasMany(Receta::class);
    }
    // refetencia de uno a uno  de usuario y perfil con has hone
    public function perfil()
    {
        return $this->hasOne(Perfil::class);
    }
}
