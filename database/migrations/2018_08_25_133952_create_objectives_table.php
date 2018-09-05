<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objectives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organization_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('cycle_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('team_id')->unsigned()->nullable();
            $table->string('level');
            $table->string('title');
            $table->text('description');
            $table->timestamps();

            $table->foreign('organization_id')
                  ->references('id')
                  ->on('organizations');

            $table->foreign('department_id')
                  ->references('id')
                  ->on('departments');

            $table->foreign('cycle_id')
                  ->references('id')
                  ->on('cycles');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

            $table->foreign('team_id')
                  ->references('id')
                  ->on('teams');

            $table->foreign('parent_id')
                  ->references('id')
                  ->on('objectives')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objectives');
    }
}
