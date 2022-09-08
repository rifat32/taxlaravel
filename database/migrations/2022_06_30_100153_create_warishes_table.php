<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warishes', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("relation");
            $table->string("age");
            $table->string("comment")->nullable();
            $table->unsignedBigInteger("applicant_id");
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
        Schema::dropIfExists('warishes');
    }
}
