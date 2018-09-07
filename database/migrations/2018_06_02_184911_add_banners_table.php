<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imagen');
            $table->text('texto1')->nullable();
            $table->text('texto2')->nullable();
            $table->enum('seccion', ['empresa', 'quiero', 'productos', 'lista', 'carrito', 'ofertas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void 
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
