<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_qualifications', function (Blueprint $table) {
            $table->increments('id');
            $table->text('education')->nullable();
            $table->text('experience')->nullable();
            $table->text('trainings')->nullable();
            $table->text('eligibilities')->nullable();
            $table->integer('pos_id')->unsigned();
            $table->foreign('pos_id')->references('id')->on('pos_positions')->onDelete('cascade');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pos_qualifications');
    }
}
