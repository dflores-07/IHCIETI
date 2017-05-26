<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('sector');
            $table->decimal('budget',20,2);
            $table->string('budgetfile');
            $table->string('has_received_help');
            $table->string('who_has_received_help');
            $table->string('whohelp');
            $table->decimal('helpcount',20,2);
            $table->string('observation');
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
        Schema::dropIfExists('projects');
    }
}
