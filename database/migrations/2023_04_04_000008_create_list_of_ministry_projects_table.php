<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListOfMinistryProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('list_of_ministry_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_of_the_project')->nullable();
            $table->string('island')->nullable();
            $table->date('date_of_implementation')->nullable();
            $table->string('budget')->nullable();
            $table->string('location_village')->nullable();
            $table->string('recipients')->nullable();
            $table->string('status')->nullable();
            $table->date('date_of_monitoring')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
