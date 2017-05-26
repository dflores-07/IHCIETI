<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type',['members','leader']);
            
            $table->string('fname');
            $table->string('flname');
            $table->string('slname');
            $table->string('province');
            $table->string('city');
            $table->string('school');
            $table->string('birthdate');
            $table->string('phone');
            $table->string('email');
            $table->string('cellphone');
            $table->string('address');
            $table->string('genre');

            $table->integer('project_id')->unsigned()->index();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
                 $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
       $table->engine='InnoDB';
            $table->timestamps();
            //relations
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
