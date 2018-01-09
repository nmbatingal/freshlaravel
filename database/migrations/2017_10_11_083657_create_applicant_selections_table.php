<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantSelectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        
        Schema::create('app_selections', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_interview')->nullable();
            $table->integer('position_id')->unsigned();
            $table->foreign('position_id')->references('id')->on('pos_positions')->onDelete('cascade');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('app_selections');
    }
}
