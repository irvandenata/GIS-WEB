<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubpotensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subpotensis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('icon')->nullable();
            $table->unsignedInteger('potensi_id');
            $table->timestamps();

            $table->foreign('potensi_id')->references('id')->on('potensis')->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bangunans');
    }
}
