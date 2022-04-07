<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas', function (Blueprint $table) {
            $table->increments('id');    
            $table->string('nombre_programa');        
            $table->string('categoria')->nullable();
            $table->text('subcategoria')->nullable();
            $table->integer('framework_lenguaje')->nullable();
            $table->string('foto_programa')->default('programa.png');            
            $table->string('enlace')->nullable();            
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
