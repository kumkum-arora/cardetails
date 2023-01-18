<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('carname');
            $table->string('brand');
            $table->string('price');
            $table->string('average');
            $table->string('transmission');
            $table->string('engine');
            $table->string('seatingcapacity');
            $table->string('fueltype');
            $table->string('color');
            $table->string('fuelcapacity');
            $table->string('image1');
            $table->string('image2');
            $table->string('releasedate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
