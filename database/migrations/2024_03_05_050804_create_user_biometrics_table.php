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

        Schema::create('user_biometrics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained(); 
            $table->string('passport_photo')->nullable();
            $table->string('signature')->nullable();

            $table->string('right_hand_index')->nullable();
            $table->string('right_hand_middle')->nullable();
            $table->string('right_hand_thumb')->nullable();
            $table->string('right_hand_ring')->nullable();
            $table->string('right_hand_pinky')->nullable();
            $table->string('right_hand_palm')->nullable();

            $table->string('left_hand_index')->nullable();
            $table->string('left_hand_middle')->nullable();
            $table->string('left_hand_thumb')->nullable();
            $table->string('left_hand_ring')->nullable();
            $table->string('left_hand_pinky')->nullable();
            $table->string('left_hand_palm')->nullable();

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
        Schema::dropIfExists('user_biometrics');
    }
};
