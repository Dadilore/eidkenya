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
        Schema::create('birthplaces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('district_of_birth')->nullable();
            $table->string('tribe')->nullable();
            $table->string('clan')->nullable();
            $table->string('family')->nullable();
            $table->string('home_district')->nullable();
            $table->string('division')->nullable();
            $table->string('constituency')->nullable();
            $table->string('location')->nullable();
            $table->string('sub_location')->nullable();
            $table->string('village')->nullable();
            $table->string('home_address')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('birthplaces');
    }
};
