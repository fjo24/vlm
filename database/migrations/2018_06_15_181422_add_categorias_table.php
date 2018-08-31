<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriasTable extends Migration
{

    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('orden');
            $table->string('imagen')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('banner')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('categorias');
    }

}
