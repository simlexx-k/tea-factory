<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyRecords extends Migration
{
    public function up()
    {
        Schema::create('daily_tea_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farmer_id');
            $table->string('farmer_name');
            $table->date('supply_date');
            $table->decimal('tea_quantity', 8, 2);
            $table->timestamps();

            // Add foreign key constraint if necessary
            $table->foreign('farmer_id')->references('id')->on('farmers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('daily_tea_records');
    }
}
