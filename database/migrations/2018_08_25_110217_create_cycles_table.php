<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cycles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organization_id')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->string('level');
            $table->string('title');
            $table->text('description');
            $table->date('start_at');
            $table->date('end_at');
            $table->timestamps();
            
            $table->foreign('organization_id')
                  ->references('id')
                  ->on('organizations');

            $table->foreign('parent_id')
                  ->references('id')
                  ->on('cycles')
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
        Schema::dropIfExists('cycles');
    }
}
