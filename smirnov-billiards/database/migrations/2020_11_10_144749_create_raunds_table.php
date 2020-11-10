<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('raunds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('turnir_id')->index();
           // $table->unsignedBigInteger('player01_id')->index();
           // $table->unsignedBigInteger('player02_id')->index();
            $table->integer('player_01_ID')->default(0);
            $table->integer('player_02_ID')->default(0);
            $table->date('dateRaund');
            $table->decimal('koefWin01', 12, 2);
            $table->decimal('koefWin02', 12, 2);
            $table->integer('win_player_id')->default(0);
            $table->integer('pointPlayer01')->default(0);
            $table->integer('pointPlayer02')->default(0);
            $table->boolean('isDone')->default(0);
            $table->timestamps();
        });

        Schema::table('raunds', function ($table) {
            $table->foreign('turnir_id')->references('id')->on('turnirs')->onDelete('cascade');
            //$table->foreign('plyaer01_id')->references('id')->on('players')->onDelete('cascade');
            //$table->foreign('plyaer02_id')->references('id')->on('players')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('raunds');
    }
}
