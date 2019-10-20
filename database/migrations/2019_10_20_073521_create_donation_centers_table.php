<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_centers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('county');
            $table->string('sub_county');
            $table->unsignedbigInteger('donor_id');
            $table->timestamps();

            //foreign key
            $table->foreign('donor_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donation_centers');
    }
}
