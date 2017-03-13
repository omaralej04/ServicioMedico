<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('users');
            $table->integer('especialidad_id')->unsigned();
            $table->foreign('especialidad_id')->references('id')->on('especialidads');
            $table->integer('medico_id')->unsigned();
            $table->foreign('medico_id')->references('id')->on('users');
            $table->integer('cita_id')->unsigned();
            $table->foreign('cita_id')->references('id')->on('citas');
            $table->text('informe');
            $table->string('receta');
            $table->text('observaciones');
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
        Schema::dropIfExists('historials');
    }
}
