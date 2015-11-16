<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('servicios_id')->nullable()->unsigned();
            $table->datetime('turno');
            $table->integer('estado');
        });

        Schema::table('citas', function(Blueprint $table){
            $table->foreign('servicios_id')
                  ->references('id')
                  ->on('servicios')
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
        Schema::table('citas', function(Blueprint $table){
            $table->dropForeign('citas_servicios_id_foreign');
        });
        Schema::drop('citas');
    }
}
