<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50);
            $table->string('description',255);
            $table->integer('respondent_number')->unsigned();
            $table->integer('respondent_count')->default(0);
            $table->boolean('is_completed')->default(false);
            $table->boolean('is_sale')->default(false);
            $table->string('donation_organization',50);
            $table->boolean('targer_isactive')->default(false);
            $table->integer('topic_id')->unsigned();
            $table->foreign('topic_id')->references('id')->on('topics');
            $table->integer('target_id')->unsigned();
            $table->foreign('target_id')->references('id')->on('targets');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('closed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
