<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeyResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organization_id')->unsigned();
            $table->integer('objective_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->string('type', 10);
            $table->char('criteria', 3)->nullable();
            $table->decimal('initial', 10, 2);
            $table->decimal('current', 10, 2);
            $table->decimal('target', 10, 2);
            $table->boolean('done')->default(false);
            $table->string('format', 10)->nullable();
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
        Schema::dropIfExists('key_results');
    }
}
