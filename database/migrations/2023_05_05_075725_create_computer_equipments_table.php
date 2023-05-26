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
        Schema::create('computer_equipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_type_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('application_type_id')->references('id')->on('application_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computer_equipments');
    }
};
