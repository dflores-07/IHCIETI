<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
        Schema::create('judges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('lastname1');
            $table->string('lastname2');
            $table->string('birthday');
            $table->string('age');
            $table->integer('user_id')->unsigned()->index();
            $table->engine='InnoDB';
            $table->timestamps();
            //relations
             $table->foreign('user_id')->references('id')->on('users')->OnDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('judges');
    }
}
