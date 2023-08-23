<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutas', function (Blueprint $table) {
            $table->id();
            $table->string('slug',100)->unique();
            $table->string('title',67);
            $table->string('description',155);
            $table->string('nombre',100)->unique();
            $table->text('descripcion');
            $table->string('urlfoto',100)->default("foto.jpg");
            $table->integer('visitas')->default(0);
            $table->integer('orden')->default(0);
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutas');
    }
}
