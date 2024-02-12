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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
