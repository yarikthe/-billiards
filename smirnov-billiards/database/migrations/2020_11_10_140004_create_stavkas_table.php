<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStavkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stavkas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('turnir_id')->index();
            //$table->unsignedBigInteger('raund_id')->index();
            //$table->unsignedBigInteger('player_id')->index();
            $table->integer('raund_id')->default(0);
            $table->integer('player_id')->default(0);
            $table->decimal('money', 12, 2);
            $table->date('dateStavka');
            $table->boolean('isWin')->default(0);
            $table->timestamps();
        });

        Schema::table('stavkas', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('turnir_id')->references('id')->on('turnirs')->onDelete('cascade');
            //$table->foreign('raund_id')->references('id')->on('raunds')->onDelete('cascade');
            //$table->foreign('plyaer_id')->references('id')->on('players')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stavkas');
    }
}
