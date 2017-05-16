<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('score1');
            $table->string('score2');
            $table->string('observations');
            $table->engine='InnoDB';
            $table->integer('steps_id')->unsigned()->index();
            $table->engine='InnoDB';
            $table->timestamps();
            //relations
            $table->foreign('steps_id')->references('id')->on('steps')->OnDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
}
