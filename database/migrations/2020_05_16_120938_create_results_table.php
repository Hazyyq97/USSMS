<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id')->unsigned();
            $table->integer('sport_id')->unsigned();
            $table->string('category')->nullable();
            $table->string('teamA')->nullable();
            $table->string('teamB')->nullable();
            $table->integer('a_set1')->nullable();
            $table->integer('b_set1')->nullable();
            $table->integer('a_set2')->nullable();
            $table->integer('b_set2')->nullable();
            $table->integer('a_set3')->nullable();
            $table->integer('b_set3')->nullable();
            $table->integer('a_set4')->nullable();
            $table->integer('b_set4')->nullable();
            $table->integer('a_set5')->nullable();
            $table->integer('b_set5')->nullable();
            $table->integer('game_pointA')->nullable();
            $table->integer('game_pointB')->nullable();
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
        Schema::dropIfExists('results');
    }
}
