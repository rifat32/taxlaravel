<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_structures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("union_id");
            $table->foreign('union_id')->references('id')->on('unions')->onDelete('cascade');
            $table->double("strong_house_tax");
            $table->double("half_strong_house_tax");
            $table->double("weak_house_tax");
            $table->double("strong_house_yearly_tax");
            $table->double("half_strong_yearly_tax");
            $table->double("weak_house_yearly_tax");
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
        Schema::dropIfExists('house_structures');
    }
}
