<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppSelectionGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('app_selection_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('app_selections')->onDelete('cascade');
            $table->integer('applicant_id')->unsigned();
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
            $table->integer('remark')->nullable();
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
        Schema::dropIfExists('app_selection_groups');
    }
}
