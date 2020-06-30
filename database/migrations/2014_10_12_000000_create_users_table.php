<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('usr_id');
            $table->string('usr_name');
            $table->string('usr_email')->unique();
            $table->string('usr_password');
            $table->string('usr_img_name');
            $table->string('usr_img_src');
            $table->string('usr_phone');
            $table->string('usr_address');
            $table->string('usr_status');
            $table->string('usr_lat');
            $table->string('usr_long');
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
        Schema::dropIfExists('users');
    }
}
