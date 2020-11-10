<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetPleyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('set_pleyers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('turnir_id')->index();
            $table->unsignedBigInteger('player_id')->index();
            $table->timestamps();
        });

        Schema::table('set_pleyers', function ($table) {
            $table->foreign('turnir_id')->references('id')->on('turnirs')->onDelete('cascade');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('set_pleyers');
    }
}
