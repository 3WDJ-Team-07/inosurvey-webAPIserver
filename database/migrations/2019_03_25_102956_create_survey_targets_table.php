<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_targets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('start_age',50)->nullable();
            $table->string('end_age',50)->nullable();
            $table->integer('gender')->nullable();
            $table->integer('job_id')->unsigned()->nullable();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->integer('local_id')->unsigned()->nullable();
            $table->foreign('local_id')->references('id')->on('locals');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_targets');
    }
}
