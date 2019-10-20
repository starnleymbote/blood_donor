<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAForeignKeyToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->dropColumn('donation_center');
            // $table->dropColumn('blood_group');
            // $table->unsignedbigInteger('donation_center_id');
            // $table->unsignedbigInteger('blood_group_id');
            // $table->foreign('donation_center_id')->references('id')->on('donation_centers')->onDelete('cascade');
            // $table->foreign('blood_group_id')->references('id')->on('blood_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('donation_center_id');
        });
    }
}
