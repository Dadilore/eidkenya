<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropDateTimeColumnFromUserActivityLogsTable extends Migration
{
    public function up()
    {
        Schema::table('user_activity_logs', function (Blueprint $table) {
            $table->dropColumn('date_time');
        });
    }

    public function down()
    {
        Schema::table('user_activity_logs', function (Blueprint $table) {
            // If you want to recreate the column during rollback, you can do it here
            // Example: $table->dateTime('date_time')->nullable();
        });
    }
}

