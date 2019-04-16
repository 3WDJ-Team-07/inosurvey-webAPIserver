<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('targets', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< HEAD
            $table->integer('start_age')->nullable();
            $table->integer('end_age')->nullable();
            $table->integer('gender')->dafault(0);
            $table->integer('job_id')->unsigned()->nullable();
            $table->foreign('job_id')->references('id')->on('jobs');
=======
            $table->json('age')->nullable();
            $table->integer('gender')->default(0);
>>>>>>> 7d6240fc779bd3650728b137f4bab483297ec436
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('targets');
    }
}
