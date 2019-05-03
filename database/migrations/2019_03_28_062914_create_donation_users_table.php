<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('donation_id')->unsigned();
            $table->foreign('donation_id')->references('id')->on('donations');
            $table->integer('sponsors_id')->unsigned();
            $table->foreign('sponsors_id')->references('id')->on('users');
            $table->bigInteger('donation_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donation_user');
    }
}
