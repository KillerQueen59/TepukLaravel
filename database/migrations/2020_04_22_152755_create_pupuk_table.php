<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePupukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $date =  new DateTime();
        $unixTimeStamp = $date->getTimestamp();

        //Create database pupuk

        Schema::connection('mysql')->create('pupuks',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nama_pupuk');
            $table->string('jenis_pupuk');
            $table->text('deskripsi_pupuk');
            $table->text('komposisi_pupuk');
            $table->integer('harga_pupuk');
            $table->string('foto_pupuk')->default('');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pupuks');
        Schema::dropIfExists('shippings');
    }
}
