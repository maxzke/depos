<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerigrafiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serigrafias', function (Blueprint $table) {
            $table->id();
            $table->decimal('diseno',9,1);
            $table->decimal('impresion',9,1);
            $table->decimal('revelado',9,1);
            $table->decimal('limpieza',9,1);
            $table->decimal('depreciacion',9,1);
            $table->decimal('textil',9,1);
            $table->decimal('vidrio',9,1);
            $table->decimal('aluminio',9,1);
            $table->decimal('papael',9,1);
            $table->decimal('plastico',9,1);
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
        Schema::dropIfExists('serigrafias');
    }
}
