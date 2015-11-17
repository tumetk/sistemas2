<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->float('total');
            $table->integer('cliente_id')->nullable()->unsigned();
            $table->integer('confirmado');
        });

        Schema::table('pedidos', function(Blueprint $table){
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
        
        Schema::table('pedidos', function(Blueprint $table){
            $table->dropForeign('pedidos_cliente_id_foreign');
        });

        Schema::drop('pedidos');
    }
}
