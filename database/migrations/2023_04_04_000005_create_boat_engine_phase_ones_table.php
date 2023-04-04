<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoatEnginePhaseOnesTable extends Migration
{
    public function up()
    {
        Schema::create('boat_engine_phase_ones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_of_receival')->nullable();
            $table->string('island')->nullable();
            $table->string('no_of_share')->nullable();
            $table->string('ward')->nullable();
            $table->string('recipients')->nullable();
            $table->string('boat_status')->nullable();
            $table->string('engine_status')->nullable();
            $table->date('date_of_monitoring')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
