<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('subpotensi_id')->default(1);
            $table->unsignedInteger('potensi_id');



            $table->unsignedInteger('kabupaten_id')->default(1);
            $table->unsignedInteger('kecamatan_id')->default(1);
            $table->unsignedInteger('desa_id')->default(1);
            $table->string('nama');
            $table->string('deskripsi')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('gambar')->nullable();


            $table->timestamps();

            $table->foreign('subpotensi_id')->references('id')->on('subpotensis')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('kabupaten_id')->references('id')->on('kabupatens')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('assets');
    }
}
