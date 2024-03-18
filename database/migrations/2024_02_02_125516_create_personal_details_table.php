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

                Schema::create('personal_details', function (Blueprint $table) {
                    $table->id();
                    $table->unsignedBigInteger('user_id')->nullable();
                    $table->unsignedBigInteger('applications_id')->constrained ();
                    $table->string('fathers_name')->nullable();
                    $table->string('mothers_name')->nullable();
                    $table->string('marital_status')->nullable();
                    // $table->string('husbands_names')->nullable();
                    // $table->string('husbands_id_number')->nullable();
                    $table->string('occupation')->nullable();
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
        Schema::dropIfExists('personal_details');
    }
};
