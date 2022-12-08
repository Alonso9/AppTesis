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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->integer('patientId');
            $table->string('ethnicity');
            $table->string('dob'); // fecha de nacimiento
            $table->string('surgeries');
            $table->string('sex'); // Sexo
            $table->text('familybackgr'); // Antecedentes familiares
            $table->string('diabetes');
            $table->string('numbre_phone');
            $table->string('broken_bones');
            $table->string('blood_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
};
