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
        // Disable foreign key checks during migration
       DB::statement('SET FOREIGN_KEY_CHECKS=0;');

       Schema::create('appointments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->constrained();
        $table->date('appointment_date')->nullable();
        $table->time('appointment_time')->nullable();
        $table->string('appointment_venue')->nullable();
        $table->string('status')->nullable();
        $table->timestamps();
        });
    

        // Enable foreign key checks after creating the table
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
