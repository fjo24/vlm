<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('tipo', ['precio1', 'precio2', 'precio3'])->default('precio1');
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('tipo');
        });
    }
}
