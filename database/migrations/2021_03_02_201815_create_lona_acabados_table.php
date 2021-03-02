<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLonaAcabadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lona_acabados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lona_id');
            $table->foreign('lona_id')->references('id')->on('lonas');
            $table->foreignId('lonasacabado_id');
            $table->foreign('lonasacabado_id')->references('id')->on('lonasacabados');
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
        Schema::dropIfExists('lona_acabados');
    }
}
