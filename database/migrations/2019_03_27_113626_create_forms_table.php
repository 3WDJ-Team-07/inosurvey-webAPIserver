<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
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
            $table->string('title',255);
            $table->text('description');
            $table->integer('respondent_number')->nullable();
            $table->integer('respondent_count')->default(0);
            $table->boolean('is_completed')->default(false);
            $table->boolean('is_sale')->default(false);
            $table->boolean('target_isactive')->default(false);
            $table->string('bgcolor')->default('#ffffff');
            $table->integer('topic_id')->unsigned()->nullable();
            $table->foreign('topic_id')->references('id')->on('topics');
            $table->integer('target_id')->unsigned()->nullable();
            $table->foreign('target_id')->references('id')->on('targets');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamp('started_at');
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
