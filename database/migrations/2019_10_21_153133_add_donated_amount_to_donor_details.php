<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDonatedAmountToDonorDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donor_details', function (Blueprint $table) {
            $table->integer('donated_blood_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donor_details', function (Blueprint $table) {
            $table->dropColumn('donated_blood_amount');
        });
    }
}
