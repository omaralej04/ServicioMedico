<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consulta_id')->unsigned();
            $table->foreign('consulta_id')->references('id')->on('historials');
            $table->integer('farmaceuta_id')->unsigned()->nullable();
            $table->foreign('farmaceuta_id')->references('id')->on('users');
            $table->enum('status', ['entregado', 'pendiente']);
            $table->text('descripcion');
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
        Schema::dropIfExists('recipes');
    }
}
