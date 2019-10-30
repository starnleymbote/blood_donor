<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('donor_id');
            $table->dateTime('appointment')->nullable();
            $table->string('purpose');
            $table->unsignedbigInteger('center_id');
            $table->timestamps();

            //foreign key
            $table->foreign('donor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('center_id')->references('id')->on('donation_centers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
