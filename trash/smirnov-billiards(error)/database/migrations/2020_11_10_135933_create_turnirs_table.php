<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnirs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('desc');
            $table->decimal('prizMoney', 12, 2);
            $table->string('place');
            $table->date('date_start');
            $table->date('date_end');
            $table->integer('win_player_id')->default(0);
            $table->integer('pointWin');
            $table->boolean('isPiblic')->default(0);
            $table->boolean('isDone')->default(0);
            $table->unsignedBigInteger('organizator_id')->index();
            $table->timestamps();
        });


        Schema::table('turnirs', function ($table) {
            $table->foreign('organizator_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turnirs');
    }
}
