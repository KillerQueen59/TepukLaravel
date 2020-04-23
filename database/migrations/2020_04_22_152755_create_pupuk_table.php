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
            $table->string('foto_pupuk');

        });

        Schema::connection('mysql')->create('orders',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pupuk_id');
            $table->date('order_date');
            $table->integer('order_qty');

        //foreign key 
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pupuk_id')->references('id')->on('pupuks');
            
        });

        Schema::connection('mysql')->create('payments',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->date('payment_date');
            $table->integer('payment_ammount');

        //foreign key 
            $table->foreign('order_id')->references('id')->on('orders');

        });

        Schema::connection('mysql')->create('shippings',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('payment_id');
            $table->date('shipping_date');
            $table->time('shipping_time');

        //foreign key 
            $table->foreign('payment_id')->references('id')->on('payments');
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
        Schema::dropIfExists('orders');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('shippings');
    }
}
