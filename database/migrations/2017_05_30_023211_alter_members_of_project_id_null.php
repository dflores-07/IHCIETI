<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMembersOfProjectIdNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "ALTER TABLE `members` CHANGE `project_id` `project_id` INT(10) UNSIGNED NULL;";
        DB::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql = "ALTER TABLE `members` CHANGE `project_id` `project_id` INT(10) UNSIGNED NOT NULL;";
        DB::connection()->getPdo()->exec($sql);
    }
}
