<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppEligibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        
        Schema::create('app_eligibilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 200)->nullable();
            $table->double('rating', 5, 2)->nullable();
            $table->date('exam_date')->nullable();
            $table->string('license_no', 100)->nullable();
            $table->integer('applicant_id')->unsigned();
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
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
        Schema::dropIfExists('app_eligibilities');
    }
}
