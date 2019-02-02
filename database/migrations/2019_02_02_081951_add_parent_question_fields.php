<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParentQuestionFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question', function (Blueprint $table) {
            if (!Schema::hasColumn('question', 'parent_question_id')) {
                $table->unsignedInteger('parent_question_id')->nullable();
                $table->foreign('parent_question_id')->references('id')->on('question')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question', function (Blueprint $table) {
            if (Schema::hasColumn('question', 'parent_question_id')) {
                $table->dropForeign(['parent_question_id']);
                $table->dropColumn('parent_question_id');
            }
        });
    }
}
