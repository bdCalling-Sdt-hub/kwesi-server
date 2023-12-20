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
        Schema::create('intake_forms', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->date("dateOfBirth");
            $table->string("address");
            $table->string("phoneNumber");
            $table->string("email");
            $table->string("contactBy");
            $table->string("mailAddWithUser");
            $table->string("occupation");
            $table->longText("reasonOfVisit");
            $table->longText("allergies");
            $table->longText("presentMedication");
            $table->string("prefarableTime");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intake_forms');
    }
};
