<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectBodypartsAndWorkouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workouts', function (Blueprint $table) {
            $table->bigInteger('bodypart_id')->unsigned();
            $table->foreign('bodypart_id')->references('id')->on('bodyparts');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('workouts_bodypart_id_foreign');
        $table->dropColumn('bodypart_id');
    }
}
