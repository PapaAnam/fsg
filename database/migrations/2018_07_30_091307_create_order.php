<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_order');
            $table->integer('id_member')->unsigned();
            $table->foreign('id_member')->on('member')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_jadwal')->unsigned();
            $table->foreign('id_jadwal')->on('jadwal_flash_sale')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', [
                'Lunas', 'Belum Lunas',
            ])->default('Belum Lunas');
            $table->string('bukti')->nullable();
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
        Schema::dropIfExists('order');
    }
}
