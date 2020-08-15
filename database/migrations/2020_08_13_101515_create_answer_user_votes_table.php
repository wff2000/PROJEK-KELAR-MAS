<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerUserVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_user_votes', function (Blueprint $table) {
            $table->bigIncrements('answer_user_vote_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('answer_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('answer_id')->references('answer_id')->on('answers');
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
        Schema::dropIfExists('answer_user_votes');
    }
}
