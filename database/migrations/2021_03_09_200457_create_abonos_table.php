<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('venta_id');
            $table->foreign('venta_id')->references('id')->on('ventas');

            $table->foreignId('metodo_id');
            $table->foreign('metodo_id')->references('id')->on('metodos');

            $table->decimal('importe',9,1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abonos');
    }
}
