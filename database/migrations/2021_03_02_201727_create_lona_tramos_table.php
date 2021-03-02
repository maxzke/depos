<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLonaTramosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lona_tramos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lona_id');
            $table->foreign('lona_id')->references('id')->on('lonas');
            $table->foreignId('lonastramo_id');
            $table->foreign('lonastramo_id')->references('id')->on('lonastramos');
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
        Schema::dropIfExists('lona_tramos');
    }
}
