<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('team_id')->nullable();
            $table->string('name')->nullable();
            $table->string('number')->nullable();
            $table->string('position')->nullable();
            $table->string('yellow')->default(0)->nullable();
            $table->string('red')->default(0)->nullable();
            $table->string('goals')->default(0)->nullable();
            $table->string('assists')->nullable();
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
        Schema::dropIfExists('players');
    }
}
