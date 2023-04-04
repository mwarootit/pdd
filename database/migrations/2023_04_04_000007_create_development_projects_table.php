<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopmentProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('development_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('remarks')->nullable();
            $table->string('name_of_the_project')->nullable();
            $table->date('starting_date')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
