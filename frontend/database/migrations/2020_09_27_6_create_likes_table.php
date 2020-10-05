<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('lid');
            $table->unsignedInteger('user_id');
            $table->string('quiz_id', 400);
            $table->string('result', 10);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('quiz_id')->references('quiid')->on('quizzes');
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
        Schema::dropIfExists('likes');
    }
}
