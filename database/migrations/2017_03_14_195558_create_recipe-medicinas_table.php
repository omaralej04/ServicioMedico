<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeMedicinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_medicinas', function (Blueprint $table) {
            $table->integer('recipe_id')->unsigned();
            $table->foreign('recipe_id')->references('id')->on('recipes');
            $table->integer('medicina_id')->unsigned();
            $table->foreign('medicina_id')->references('id')->on('medicinas');
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
        Schema::dropIfExists('recipe_medicinas');
    }
}
