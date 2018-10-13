<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organization_id')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->string('title');
            $table->integer('weight_horizontal')->default(40);
            $table->integer('weight_vertical')->default(60);
            $table->timestamps();

            $table->foreign('organization_id')
                  ->references('id')
                  ->on('organizations');

            $table->foreign('parent_id')
                  ->references('id')
                  ->on('departments')
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
        Schema::dropIfExists('departments');
    }
}
