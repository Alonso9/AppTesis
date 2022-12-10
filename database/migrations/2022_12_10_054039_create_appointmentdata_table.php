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
        Schema::create('appointmentdata', function (Blueprint $table) {
            $table->id();
            $table->string('matter');
            $table->text('description');
            $table->string('blood_pressure');
            $table->string('weight');
            $table->string('height');
            $table->text('medicine');
            $table->string('finaldescription');
            $table->integer('idAppointment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointmentdata');
    }
};
