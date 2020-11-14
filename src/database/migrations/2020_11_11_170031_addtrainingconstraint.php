<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addtrainingconstraint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('userfinishedtrainings', function (Blueprint $table) {       
            $table->foreign('training_id')->references('id')->on('trainingsteps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('userfinishedtrainings', function (Blueprint $table) {       
            $table->dropForeign(['training_id']);
        });
    }
}
