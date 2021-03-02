<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSublimacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sublimaciones', function (Blueprint $table) {
            $table->id();
            $table->decimal('diseno',9,1);
            $table->decimal('impresion',9,1);
            $table->decimal('tinta',9,1);
            $table->decimal('luz',9,1);
            $table->decimal('depreciacion',9,1);
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
        Schema::dropIfExists('sublimaciones');
    }
}
