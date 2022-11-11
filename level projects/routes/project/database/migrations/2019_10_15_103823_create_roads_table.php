<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roads', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('city_x_id')->nullable();
            $table->foreign('city_x_id')->references('id')->on('cities');

            $table->unsignedBigInteger('city_y_id')->nullable();
            $table->foreign('city_y_id')->references('id')->on('cities');

            $table->unsignedBigInteger('road_type_id')->nullable();
            $table->foreign('road_type_id')->references('id')->on('road_types');

            $table->integer('speed_limit');
            $table->integer('distance_km');
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
        Schema::dropIfExists('roads');
    }
}
