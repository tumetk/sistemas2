<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlmacenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacen', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->float('precio');
            $table->integer('stock');
            $table->integer('producto_id')->nullable()->unsigned();
            $table->integer('proveedor_id')->nullable()->unsigned();


        });

        Schema::table('almacen', function(Blueprint $table){
            $table->foreign('producto_id')
                  ->references('id')
                  ->on('productos')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
            $table->foreign('proveedor_id')
                  ->references('id')
                  ->on('proveedores')
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
        
        
        Schema::table('almacen', function(Blueprint $table){
            $table->dropForeign('almacen_proveedor_id_foreign');
        });


        Schema::drop('almacen');
    }
}
