<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpesaSTKSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Disable foreign key checks during migration
       DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::create('mpesa_s_t_k_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained ();
            $table->string('applications_id')->nullable();
            $table->string('result_desc')->nullable();
            $table->string('result_code')->nullable();
            $table->string('merchant_request_id')->nullable();
            $table->string('checkout_request_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('mpesa_receipt_number')->nullable();
            $table->string('transaction_date')->nullable();
            $table->string('phonenumber')->nullable();
            $table->timestamps();

            
        });
        
        // Enable foreign key checks after creating the table
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mpesa_s_t_k_s');
    }
}