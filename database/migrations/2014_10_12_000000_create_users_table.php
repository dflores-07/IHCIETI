<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identification_card');
            $table->string('name');
            $table->string('phone');
            $table->string('email',90)->unique();
            $table->string('password');
            $table->string('province');
            $table->string('city');
            $table->string('school');
            $table->string('birthdate');
            $table->string('cellphone');
            $table->string('address');
            $table->string('genre');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
