<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLonaTramoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lona_tramo', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('lona_id');
            $table->foreign('lona_id')->references('id')->on('lonas');
            $table->foreignId('tramo_id');
            $table->foreign('tramo_id')->references('id')->on('tramos');

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
        Schema::dropIfExists('lona_tramo');
    }
}
