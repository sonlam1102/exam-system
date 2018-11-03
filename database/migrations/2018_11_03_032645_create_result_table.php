<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('contest_id');
            $table->foreign('contest_id')->references('id')->on('contest')->onDelete('cascade');
            $table->unsignedInteger('question_id');
            $table->foreign('question_id')->references('id')->on('question')->onDelete('cascade');
            $table->unsignedInteger('answer_id');
            $table->foreign('answer_id')->references('id')->on('answer')->onDelete('cascade');
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
        Schema::dropIfExists('result');
    }
}
