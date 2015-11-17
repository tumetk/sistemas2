<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_citas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('reserva_id')->nullable()->unsigned();
            $table->integer('cita_id')->nullable()->unsigned();
        });

        Schema::table('reserva_citas', function(Blueprint $table){
            $table->foreign('reserva_id')
                  ->references('id')
                  ->on('reservas')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
            $table->foreign('cita_id')
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
        Schema::drop('reserva_citas');
    }
}
