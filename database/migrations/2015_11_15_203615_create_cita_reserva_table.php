<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitaReservaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita_reserva', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('reservas_id')->nullable()->unsigned();
            $table->integer('citas_id')->nullable()->unsigned();
        });

        Schema::table('cita_reserva', function(Blueprint $table){
            $table->foreign('reservas_id')
                  ->references('id')
                  ->on('reservas')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
            $table->foreign('citas_id')
                  ->references('id')
                  ->on('citas')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cita_reserva', function(Blueprint $table){
            $table->dropForeign('cita_reserva_reservas_id_foreign');
        });
        Schema::table('cita_reserva', function(Blueprint $table){
            $table->dropForeign('cita_reserva_citas_id_foreign');
        });
        Schema::drop('cita_reserva');
    }
}
