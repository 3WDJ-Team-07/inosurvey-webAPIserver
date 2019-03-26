<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description',255);
            $table->integer('respondent_number')->unsigned();
            $table->boolean('is_completed')->default(false);
            $table->timestamp('closed_at')->nullable();
            $table->boolean('is_sale')->default(false);
            $table->boolean('is_relation')->default(false);
            $table->integer('respondent_count')->default(0);
            $table->integer('topic_id')->unsigned()->nullable();
            $table->foreign('topic_id')->references('id')->on('survey_topics');
            $table->integer('target_id')->unsigned()->nullable();
            $table->foreign('target_id')->references('id')->on('survey_targets');
            $table->timestamps();//생성일자, 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_forms');
    }
}
