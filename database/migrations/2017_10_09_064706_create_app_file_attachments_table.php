<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppFileAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('file_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename', 300);
            $table->string('path', 300);
            $table->integer('applicant_id')->unsigned();
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
            $table->string('tab_name', 100);
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
        Schema::dropIfExists('file_attachments');
    }
}
