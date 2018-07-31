<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalFlashSale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_flash_sale', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('waktu');
            $table->string('produk')->default('xiaomi note 5a');
            $table->integer('fee')->default(50000);
            $table->integer('id_marketplace')->unsigned()->nullable();
            $table->foreign('id_marketplace')->on('marketplace')->references('id')->onUpdate('set null')->onDelete('set null');
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
        Schema::dropIfExists('jadwal_flash_sale');
    }
}
