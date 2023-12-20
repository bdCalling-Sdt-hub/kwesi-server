<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('progress_reports', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email");
            $table->string("changePharmecyInformation");
            $table->string("startWeight");
            $table->string("currentWeight");
            $table->string("goalWeight");
            $table->string("bloodPressure");
            $table->string("otherPrescribedMedication");
            $table->string("refill");
            $table->string("symptomsWithWeightLossMedication");
            $table->string("enterThePharmacyName");
            $table->string("prefarableTime");
            $table->string("knowledge");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress_reports');
    }
};
