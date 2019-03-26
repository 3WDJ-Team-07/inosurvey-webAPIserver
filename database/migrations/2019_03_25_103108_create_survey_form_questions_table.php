<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyFormQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_form_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50);
            $table->integer('number')->unsigned();
            $table->text('image')->nullable();
            $table->integer('survey_id')->unsigned();
            $table->foreign('survey_id')->references('id')->on('survey_forms');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('survey_question_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_form_questions');
    }
}
