<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('total_mileage');
            $table->integer('minimum_charge');
            $table->integer('average_MPG');
            $table->integer('costs_per_mile');
            $table->integer('fuel_cost');
            $table->integer('public_transport');
            $table->integer('AML_trip_cost');
            $table->integer('actual_fuel_cost');
            $table->integer('total_cost');
            $table->string('message')->nullable();
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
        Schema::dropIfExists('quotes');
    }
}
