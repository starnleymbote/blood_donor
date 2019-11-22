<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 100);
            $table->unsignedbigInteger('center_id');
            $table->integer('pints')->unsigned()->nullable()->default(1);

            //foreign key
            $table->foreign('center_id')->references('id')->on('donation_centers')->onDelete('cascade');
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
        Schema::dropIfExists('donor_records');
    }
}
