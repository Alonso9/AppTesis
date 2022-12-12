<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medic_data', function (Blueprint $table) {
            $table->id();
            $table->integer('medicId');
            $table->string('license');
            $table->string('specialty');
            $table->string('status');
            $table->string('lat'); // Latitud de la ubicacion del usuario
            $table->string('lng'); // Longitud de la ubicacion del usuario
            $table->string('description');
            $table->text('numbre_phone');
            $table->string('img');
            $table->string('logo');
            $table->string('univer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medic_data');
    }
};
