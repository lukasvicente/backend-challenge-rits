<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoHasProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_has_produto', function (Blueprint $table){
            $table->id();
            $table->integer('pedido_id')->unsigned();
            $table->integer('produto_id')->unsigned();
             

            $table->foreign('pedido_id')
                ->references('id')
                ->on('pedido')
                ->onDelete('cascade');

            $table->foreign('produto_id')
                ->references('id')
                ->on('produto')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_has_produto');
    }
}
