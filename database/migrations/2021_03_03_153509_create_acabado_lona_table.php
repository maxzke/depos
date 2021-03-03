<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcabadoLonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acabado_lona', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lona_id');
            $table->foreign('lona_id')->references('id')->on('lonas');
            $table->foreignId('acabado_id');
            $table->foreign('acabado_id')->references('id')->on('acabados');

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
        Schema::dropIfExists('acabado_lona');
    }
}
