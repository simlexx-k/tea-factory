<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickPointsTable extends Migration
{
    public function up()
    {
        Schema::create('pick_points', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            // Add more columns if needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pick_points');
    }
}
