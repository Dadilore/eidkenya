<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void  
        
        {
            Schema::create('pickupappointments', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->constrained(); // Assuming user_id is a foreign key to users table
                $table->unsignedBigInteger('applications_id')->nullable();
                $table->date('appointment_date')->nullable();
                $table->string('appointment_time')->nullable();
                $table->string('appointment_venue')->nullable();
                $table->string('status')->nullable();
                $table->timestamps();
            });
                 
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickupappointments');
    }
};
