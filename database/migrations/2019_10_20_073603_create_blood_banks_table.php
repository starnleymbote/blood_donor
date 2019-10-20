<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('center_id');
            $table->unsignedbigInteger('blood_type_id');
            $table->integer('blood_amount');
            $table->timestamps();

            //foreign  key
            $table->foreign('center_id')->references('id')->on('donation_centers')->onDelete('cascade');
            $table->foreign('blood_type_id')->references('id')->on('blood_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blood_banks');
    }
}
