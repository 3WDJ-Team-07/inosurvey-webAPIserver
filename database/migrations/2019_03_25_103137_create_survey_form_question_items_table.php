<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyFormQuestionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_form_question_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content',50);
            $table->integer('content_number')->unsigend();
            $table->text('content_image')->nullable();
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('survey_form_questions')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_form_question_items');
    }
}
