<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpedimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impediments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('receiver_id')->unsigned()->nullable();
            $table->integer('key_result_id')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('status')->default(0);
            $table->text('description');
            $table->string('archive')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('receiver_id')
                  ->references('id')
                  ->on('users');

            $table->foreign('key_result_id')
                  ->references('id')
                  ->on('key_results')
                  ->onDelete('cascade');

            $table->foreign('parent_id')
                  ->references('id')
                  ->on('impediments')
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
        Schema::dropIfExists('impediments');
    }
}
