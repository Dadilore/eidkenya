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

        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained ();
            $table->string('personal_details_id')->nullable();
            $table->string('birthplaces_id')->nullable();
            $table->string('documents_id')->nullable();
            $table->enum('application_status',['pending','complete'])->default('pending');
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
        Schema::dropIfExists('applications');
    }
};
