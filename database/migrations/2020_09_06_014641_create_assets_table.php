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
            $table->unsignedInteger('bangunan_id');
            $table->unsignedInteger('potensi_id');
            
            $table->string('nama');
            $table->string('deskripsi')->nullable();
            $table->unsignedInteger('kabupaten_id')->nullable();
            $table->unsignedInteger('kecamatan_id')->nullable();
            $table->unsignedInteger('desa_id')->nullable();
            
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('gambar')->nullable();
            
            
            $table->timestamps();

            $table->foreign('bangunan_id')->references('id')->on('bangunans')->onDelete('cascade')
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
