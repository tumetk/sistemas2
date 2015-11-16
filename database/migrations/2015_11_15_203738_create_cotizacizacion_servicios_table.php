<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacizacionServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('servicios_id')->nullable()->unsigned();
            $table->integer('cotizacion_id')->nullable()->unsigned();
        });

        Schema::table('cotizaciones_servicios', function(Blueprint $table){
            $table->foreign('servicios_id')
                  ->references('id')
                  ->on('servicios')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
            $table->foreign('cotizacion_id')
                  ->references('id')
                  ->on('cotizaciones')
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
        Schema::table('cotizaciones_servicios', function(Blueprint $table){
            $table->dropForeign('cotizaciones_servicios_servicios_id_foreign');
        });
        Schema::table('cotizaciones_servicios', function(Blueprint $table){
            $table->dropForeign('cotizaciones_servicios_cotizacion_id_foreign');
        });
        Schema::drop('cotizaciones_servicios');
    }
}
