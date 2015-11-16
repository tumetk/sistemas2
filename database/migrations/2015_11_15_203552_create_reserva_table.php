<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->datetime('fecha_hora');
            $table->integer('cliente_id')->nullable()->unsigned();
            $table->int('confirmada');
        });

        Schema::table('reservas', function(Blueprint $table){
            $table->foreign('cliente_id')
                  ->references('id')
                  ->on('cliente')
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
        Schema::drop('reservas');
    }
}
