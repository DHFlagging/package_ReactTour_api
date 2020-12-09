<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrainingStepImportance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trainingsteps', function (Blueprint $table) {       
            $table->integer('importance')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trainingsteps', function (Blueprint $table) {       
            $table->dropColumn('importance');
        });
    }
}
