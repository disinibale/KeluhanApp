<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repair_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('repairements_id');
            $table->string('finish_date');
            $table->string('result');
            $table->timestamps();

            $table->foreign('repairements_id')->on('repairements')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repair_results');
    }
}
