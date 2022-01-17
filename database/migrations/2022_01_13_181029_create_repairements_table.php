<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('complaints_id');
            $table->unsignedBigInteger('technicians_id');
            $table->string('date');
            $table->text('actions');
            $table->timestamps();

            $table->foreign('complaints_id')->references('id')->on('complaints')->onDelete('cascade');
            $table->foreign('technicians_id')->references('id')->on('technicians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repairements');
    }
}
