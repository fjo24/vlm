<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('precio')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('contenido')->nullable();
            $table->string('orden')->nullable();
            $table->string('video')->nullable();
            $table->string('codigo')->nullable();
            $table->string('video_titulo')->nullable();
            $table->text('video_descripcion')->nullable();
            $table->enum('visible', ['publico', 'privado', 'ambos']);
            $table->enum('oferta', ['promocion', 'descuento', 'ninguna'])->nullable();
            $table->boolean('destacado')->default('0');
            $table->integer('categoria_id')->unsigned();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('pedido_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->string('modelo')->nullable();
            $table->string('cantidad');
            $table->string('costo');
            $table->string('total');
            $table->timestamps();

            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });

        Schema::create('modelo_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modelo_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->string('precio1')->nullable();
            $table->string('precio2')->nullable();
            $table->string('precio3')->nullable();
            $table->string('codigo')->nullable();
            $table->timestamps();

            $table->foreign('modelo_id')->references('id')->on('modelos')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });

        Schema::create('producto_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto_id')->unsigned();
            $table->integer('producto2_id')->unsigned();
            $table->timestamps();

            $table->foreign('producto2_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_producto');
        Schema::dropIfExists('modelo_producto');
        Schema::dropIfExists('pedido_producto');
        Schema::dropIfExists('productos');
    }
}
