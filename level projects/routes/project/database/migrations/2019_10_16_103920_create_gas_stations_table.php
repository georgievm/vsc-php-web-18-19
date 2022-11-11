<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGasStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gas_stations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');

            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');

            $table->unsignedBigInteger('road_id')->nullable();
            $table->foreign('road_id')->references('id')->on('roads');

            $table->integer('distance_to_the_city')->nullable();
            $table->decimal('diesel_price', 4, 2)->nullable();
            $table->decimal('gasoline_price', 4, 2)->nullable();
            $table->decimal('gas_price', 4, 2)->nullable();
            $table->decimal('electricity_price', 4, 2)->nullable();
            $table->decimal('metan_price', 4, 2)->nullable();
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
        Schema::dropIfExists('gas_stations');
    }
}
