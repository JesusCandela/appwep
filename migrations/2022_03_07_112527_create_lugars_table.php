<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLugarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugars', function (Blueprint $table) {
            $table->id();
            $table->string('slug',100)->unique();
            $table->string('title',67);
            $table->string('description',155);
            $table->string('nombre')->unique();
            $table->text('descripcion');
            $table->string('urlfoto',100);
            $table->string('latitud',50);
            $table->string('longitud',50);
            $table->integer('visitas')->default(0);
            $table->integer('orden')->default(0);
            $table->boolean('estado')->default(0);
            $table->foreignId('ruta_id')->constrained();
            
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
        Schema::dropIfExists('lugars');
    }
}
