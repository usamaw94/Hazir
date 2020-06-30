<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('p_name');
            $table->string('p_email');
            $table->string('p_password');
            $table->string('p_id_card_num');
            $table->string('p_id_card_img_name');
            $table->string('p_id_card_img_src');
            $table->string('p_id_card_back_img_name');
            $table->string('p_id_card_back_img_src');
            $table->string('p_image_name');
            $table->string('p_image_src');
            $table->string('profession_id');
            $table->string('p_address');
            $table->string('p_lat');
            $table->string('p_long');
            $table->double('rating');
            $table->string('p_status');
            $table->string('p_active');
            $table->string('p_joined');
            $table->string('p_joining_date');
            $table->string('p_joining_day');
            $table->string('p_payment_day');
            $table->string('p_payment_month');
            $table->string('p_due_day');
            $table->string('p_paid_on');
            $table->string('p_payment_status');
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
        Schema::dropIfExists('professionals');
    }
}
