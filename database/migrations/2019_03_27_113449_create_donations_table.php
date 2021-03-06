<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50);
            $table->text('content');
            $table->string('image',255)->nullable();
            $table->integer('target_amount')->default(0);
            $table->integer('current_amount')->default(0);
            $table->boolean('is_achieved')->default(false);
            $table->integer('donator_id')->unsigned();
            $table->foreign('donator_id')->references('id')->on('users');
            $table->timestamps();
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
        Schema::dropIfExists('donations');
    }
}
