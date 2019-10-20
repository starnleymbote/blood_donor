<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('user_id');
            $table->string('county')->nullable();
            $table->string('sub_county');
            $table->string('phone');
            $table->string('gender');
            $table->unsignedbigInteger('donation_center_id');
            $table->unsignedbigInteger('blood_group_id');
            $table->timestamps();

            //foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('donation_center_id')->references('id')->on('donation_centers')->onDelete('cascade');
            $table->foreign('blood_group_id')->references('id')->on('blood_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donor_details');
    }
}
