<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("union_id");
            $table->unsignedBigInteger("ward_id");
            $table->unsignedBigInteger("village_id");
            $table->unsignedBigInteger("post_office_id");
            $table->unsignedBigInteger("upazila_id");
            $table->unsignedBigInteger("district_id");
            $table->unsignedBigInteger("user_id");


            $table->string("applicant_name")->nullable();
            $table->string("applicant_name_en")->nullable();
            $table->string("applicant_m_name")->nullable();
            $table->string("applicant_f_name")->nullable();
            $table->string("applicant_holding_no")->nullable();
            $table->string("applicant_phone")->nullable();
            $table->string("applicant_nid")->nullable();
            $table->string("applicant_email")->nullable();
            $table->string("applicant_img")->nullable();
            $table->string("apply_types")->nullable();
            $table->string("status")->nullable();
            $table->string("trade_id")->nullable();
            $table->string("death_day")->nullable();

            $table->string("wife_name")->nullable();
            $table->string("previous_village")->nullable();
            $table->string("disability")->nullable();
            $table->string("previous_post_office")->nullable();
            $table->string("previous_opozilla")->nullable();
            $table->string("privious_zilla")->nullable();
            $table->string("gardian_occupaion")->nullable();
            $table->string("gardian_income")->nullable();
            $table->string("fighter_certificat_number")->nullable();
            $table->string("fighter_date")->nullable();
            $table->string("fighter_gadget_number")->nullable();

            $table->string("fighter_name")->nullable();
            $table->string("fighter_wife")->nullable();
            $table->string("tribal_community")->nullable();
            $table->string("occupation")->nullable();
            $table->unsignedBigInteger("badi_id")->nullable();
            $table->string("death_place")->nullable();
            $table->string("died_name")->nullable();
            $table->string("died_father")->nullable();
            $table->string("died_mother")->nullable();
            $table->string("died_village")->nullable();
            $table->string("died_post_office")->nullable();
            $table->string("died_upozilla")->nullable();
            $table->string("died_zilla")->nullable();
            $table->string("died_ward")->nullable();



            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ward_id')->references('id')->on('wards')->onDelete('cascade');
            $table->foreign('union_id')->references('id')->on('unions')->onDelete('cascade');
            $table->foreign('village_id')->references('id')->on('villages')->onDelete('cascade');
            $table->foreign('post_office_id')->references('id')->on('post_offices')->onDelete('cascade');
            $table->foreign('upazila_id')->references('id')->on('upazilas')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');




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
        Schema::dropIfExists('services');
    }
}
