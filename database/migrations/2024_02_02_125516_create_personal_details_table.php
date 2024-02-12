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
            Schema::create('personal_details', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained();
                $table->string('full_names')->nullable();
                $table->string('date_of_birth')->nullable();
                $table->string('gender')->nullable();
                $table->string('fathers_name')->nullable();
                $table->string('mothers_name')->nullable();
                $table->string('marital_status')->nullable();
                $table->string('husbands_names')->nullable();
                $table->string('husbands_id_number')->nullable();
                $table->string('occupation')->nullable();
                $table->string('telephone_number')->nullable();
                $table->string('email')->nullable();
                $table->timestamps();
            });
        }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_details');
    }
};
