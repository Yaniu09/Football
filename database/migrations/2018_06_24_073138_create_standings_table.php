<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group_id')->nullable();
            $table->string('team_id')->nullable();
            $table->string('mp')->default('0')->nullable();
            $table->string('w')->default('0')->nullable();
            $table->string('d')->default('0')->nullable();
            $table->string('l')->default('0')->nullable();
            $table->string('gf')->default('0')->nullable();
            $table->string('ga')->default('0')->nullable();
            $table->string('gd')->default('0')->nullable();
            $table->string('pts')->default('0')->nullable();
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
        Schema::dropIfExists('standings');
    }
}
