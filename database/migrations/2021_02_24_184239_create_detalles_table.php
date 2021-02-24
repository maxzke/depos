<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('venta_id');
            $table->foreign('venta_id')->references('id')->on('ventas');

            $table->foreignId('etapa_id');
            $table->foreign('etapa_id')->references('id')->on('etapas');

            $table->string('producto');
            $table->integer('cantidad');
            $table->decimal('precio',9,2);
            $table->decimal('importe',9,2);

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
        Schema::dropIfExists('detalles');
    }
}
