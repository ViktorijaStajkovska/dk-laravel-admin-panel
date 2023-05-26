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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('volunteer_position_id');
            $table->string('name');
            $table->string('city');
            $table->string('email');
            $table->integer('phone');
            $table->string('attachment');
            $table->string('description');
            $table->timestamps();

            $table->foreign('volunteer_position_id')->references('id')->on('volunteer_positions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
