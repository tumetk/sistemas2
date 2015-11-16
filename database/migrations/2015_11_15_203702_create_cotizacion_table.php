<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('cliente_id')->nullable()->unsigned();
            $table->string('observaciones');
        });

        Schema::table('cotizaciones', function(Blueprint $table){
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
        Schema::table('reservas', function(Blueprint $table){
            $table->dropForeign('reservas_cliente_id_foreign');
        });
        Schema::drop('cotizaciones');
    }
}
