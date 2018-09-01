<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 15)->unique();
            $table->string('name', 50);
            $table->string('apellido', 50)->nullable();
            $table->string('email', 25)->unique();
            $table->string('social', 150)->nullable();
            $table->string('cuit', 15)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('direccion', 150)->nullable();
            $table->string('postal', 15)->nullable();
            $table->enum('nivel', ['administrador', 'usuario', 'distribuidor'])->default('distribuidor');
            $table->boolean('activo')->default('0');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
