<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEspecialidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('especialidads', function (Blueprint $table) {
            $table->integer('cita_id')->unsigned()->nullable();
            $table->foreign('cita_id')->references('id')->on('citas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('especialidads', function (Blueprint $table){
            $table->dropForeign('especialidads_cita_id_foreign');
            $table->dropColumn('cita_id');
        });
    }
}
