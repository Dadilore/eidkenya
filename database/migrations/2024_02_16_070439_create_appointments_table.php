<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // Disable foreign key checks during migration
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained(); // Assuming user_id is a foreign key to users table
            $table->unsignedBigInteger('applications_id')->nullable();
            $table->date('appointment_date')->nullable();
            $table->string('appointment_time')->nullable();
            $table->string('appointment_venue')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('applications_id')->references('id')->on('applications');
        });

        // Enable foreign key checks after creating the table
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
