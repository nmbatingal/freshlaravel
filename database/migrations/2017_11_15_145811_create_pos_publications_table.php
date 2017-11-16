<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosPublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_publications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('publication_no', 200);
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
        Schema::dropIfExists('pos_publications');
    }
}
