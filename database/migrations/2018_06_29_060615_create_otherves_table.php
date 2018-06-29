<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOthervesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otherves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pitch_id')->nullable();
            $table->string('detail')->nullable();
            $table->string('team_one_id')->nullable();
            $table->string('team_two_id')->nullable();
            $table->string('date')->nullable();
            $table->string('time_start')->nullable();
            $table->string('time_end')->nullable();
            $table->string('match_end')->default('0')->nullable();
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
        Schema::dropIfExists('otherves');
    }
}
