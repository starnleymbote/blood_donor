<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAForeignKeyToDonationCenters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donation_centers', function (Blueprint $table) {
            $table->foreign('county')->references('id')->on('counties')->onDelete('cascade');
            $table->foreign('sub_county_id')->references('id')->on('sub_counties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donation_centers', function (Blueprint $table) {
            //
        });
    }
}
