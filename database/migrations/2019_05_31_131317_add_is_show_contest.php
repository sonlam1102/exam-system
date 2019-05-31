<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsShowContest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contest', function (Blueprint $table) {
            if (!Schema::hasColumn('contest', 'is_show')) {
                $table->boolean('is_show')->default(true);
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
        Schema::table('contest', function (Blueprint $table) {
            if (Schema::hasColumn('contest', 'is_show')) {
                $table->dropColumn('is_show');
            }
        });
    }
}
