<?php

use App\Models\Application_status;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        
        Schema::create('applications', function (Blueprint $table)
         {
            $table->id();
            $table->unsignedBigInteger('application_status_id')->default(1);
            $table->string('name');
            $table->string('surname');
            $table->string('city');
            $table->string('email');
            $table->bigInteger('phone');
            $table->string('attachment1');
            $table->string('attachment2')->nullable();
            $table->string('description');
            $table->boolean('archive')->default(0);
            $table->timestamps();

            $table->foreign('application_status_id')->references('id')->on('application_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aplications');
    }
};
