<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCatalogosTable extends Migration
{

    public function up()
    {
        Schema::create('catalogos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pdf');
            $table->string('nombre');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('catalogos');
    }
}
