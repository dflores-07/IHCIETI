<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudgeByStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judge_by_steps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('judge_id')->unsigned()->index();
            $table->integer('step_id')->unsigned()->index();
            $table->engine='InnoDB';
            $table->timestamps();
            //relations
            $table->foreign('step_id')->references('id')->on('steps')->OnDelete('cascade');
            $table->foreign('judge_id')->references('id')->on('judges')->OnDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
