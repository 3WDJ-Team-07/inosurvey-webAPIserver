<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyableUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replyable_user', function (Blueprint $table) {
            $table->integer('replyable_id')->unsigned();
            $table->foreign('replyable_id')->references('id')->on('users');
            $table->integer('survey_id')->unsigned();
            $table->foreign('survey_id')->references('id')->on('forms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replyable_user');
    }
}
