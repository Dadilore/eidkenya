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

            Schema::create('documents', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->constrained ();
                $table->string('birth_certificate_number')->nullable();
                $table->string('passport_number')->nullable();
                $table->string('parents_id_number')->nullable();
                $table->string('certificate_of_registration_number')->nullable();
                $table->string('birth_certificate')->nullable();
                $table->string('passport_photo')->nullable();
                $table->string('fathers_id_card_front')->nullable();
                $table->string('fathers_id_card_back')->nullable();
                $table->string('mothers_id_card_front')->nullable();
                $table->string('mothers_id_card_back')->nullable();
                $table->timestamps();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        // Enable foreign key checks after creating the table
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
