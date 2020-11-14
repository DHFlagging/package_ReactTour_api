<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Modifyuseridcolumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('userfinishedtrainings', function (Blueprint $table) {       
            $table->string('user_id')->change();
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
            $table->truncate();
            $table->unsignedBigInteger('user_id')->change();
        });
    }
}
