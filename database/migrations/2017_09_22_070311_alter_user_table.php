<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('name');
            $table->string('username', 50)->after('id')->nullable();
            $table->string('lastname', 50)->after('username');
            $table->string('firstname', 50)->after('lastname');
            $table->string('middlename', 50)->after('firstname')->nullable();
            $table->integer('user_level')->default(1);
            $table->boolean('status')->default(0);
            $table->boolean('__is')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
