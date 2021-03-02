<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViniltextilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viniltextiles', function (Blueprint $table) {
            $table->id();
            $table->decimal('diseno',9,1);
            $table->decimal('navaja',9,1);
            $table->decimal('luz',9,1);
            $table->decimal('depreciacion',9,1);
            $table->decimal('basico',9,1);
            $table->decimal('detalle',9,1);
            $table->decimal('glitter',9,1);
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
        Schema::dropIfExists('viniltextiles');
    }
}
