<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_pago', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->float('igv');
            $table->float('subtotal');
            $table->float('total');
            $table->integer('reserva_id')->nullable()->unsigned();
            $table->integer('pedido_id')->nullable()->unsigned();
            $table->integer('user_id')->nullable()->unsigned();

        });


        Schema::table('documento_pago', function(Blueprint $table){
            $table->foreign('reserva_id')
                  ->references('id')
                  ->on('reservas')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
            $table->foreign('pedido_id')
                  ->references('id')
                  ->on('pedidos')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
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
        
        Schema::drop('documento_pago');
    }
}
