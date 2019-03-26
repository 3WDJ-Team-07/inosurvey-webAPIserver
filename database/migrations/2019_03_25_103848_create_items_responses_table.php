<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_response', function (Blueprint $table) {
            $table->integer('response_question_id')->unsigned();
            $table->foreign('response_question_id')->references('id')->on('survey_responses');
            $table->integer('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('survey_form_question_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_response');
    }
}
