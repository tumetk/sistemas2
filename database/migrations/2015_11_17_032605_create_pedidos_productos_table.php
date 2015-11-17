<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_productos_almacen', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('producto_almacen_id')->nullable()->unsigned();
            $table->integer('pedido_id')->nullable()->unsigned();
            $table->integer('cantidad');
            $table->float('total');
        });

        Schema::table('pedidos_productos_almacen',function(Blueprint $table){
            $table->foreign('producto_almacen_id')
                  ->references('id')
                  ->on('almacen')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
            $table->foreign('pedido_id')
                  ->references('id')
                  ->on('pedidos')
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
        Schema::table('pedidos_productos_almacen', function(Blueprint $table){
            $table->dropForeign('pedidos_productos_almacen_producto_id_foreign');
        });
        Schema::drop('pedidos_productos_almacen');
    }
}
