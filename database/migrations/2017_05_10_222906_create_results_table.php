<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->string('escore1');
            $table->string('escore2');
            $table->string('eobservations');
            $table->integer('evaluation_id')->unsigned()->index();
            $table->integer('judge_by_step_id')->unsigned()->index();
            $table->integer('project_by_step_id')->unsigned()->index();
            $table->engine='InnoDB';
            $table->timestamps();
            //relations
            $table->foreign('evaluation_id')->references('id')->on('evaluations')->onDelete('cascade');
            $table->foreign('project_by_step_id')->references('id')->on('project_by_steps')->onDelete('cascade');
            $table->foreign('judge_by_step_id')->references('id')->on('judge_by_steps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
