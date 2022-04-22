<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasTable extends Migration
{
    /**
     * Correr migraciones timestamps ayuda a creae campos para guardar la creacion y la actualizacion
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_recetas',function(Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('ingredientes');
            $table->text('preparacion');
            $table->string('imagen');
            $table->foreignId('user_id')->references('id')->on('users')->comment('referecia al id de usuarios');
            $table->foreignId('categoria_id')->references('id')->on('categoria_recetas')->comment('referecia a un al id categira');
            $table->timestamps();
        });
    }

    /**
     * Eliminar las migraciones.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_recetas');
        Schema::dropIfExists('recetas');
    }
}
