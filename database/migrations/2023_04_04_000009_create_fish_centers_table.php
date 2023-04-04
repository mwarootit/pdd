<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFishCentersTable extends Migration
{
    public function up()
    {
        Schema::create('fish_centers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('island')->nullable();
            $table->string('operated_by')->nullable();
            $table->date('date_of_recieval')->nullable();
            $table->string('item')->nullable();
            $table->string('quantity')->nullable();
            $table->string('status')->nullable();
            $table->date('date_of_monitoring')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
