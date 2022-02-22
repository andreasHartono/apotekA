<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('medicines_name', 200);
            $table->string('medicines_form', 200);
            $table->string('medicines_formula', 200);
            $table->longText('description');
            $table->boolean('faskes_1');
            $table->boolean('faskes_2');
            $table->boolean('faskes_3');
            $table->bigInteger('medicines_price');
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
        Schema::dropIfExists('medicines');
    }
}