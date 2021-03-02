<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lonas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('calidad_360',9,1);
            $table->decimal('calidad_720',9,1);
            $table->decimal('calidad_1024',9,1);
            $table->decimal('calidad_fullhd',9,1);
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
        Schema::dropIfExists('lonas');
    }
}
