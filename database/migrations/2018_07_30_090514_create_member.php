<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_ktp');
            $table->string('no_telp');
            $table->string('no_rek');
            $table->string('atas_nama');
            $table->integer('id_bank')->unsigned()->nullable();
            $table->foreign('id_bank')->on('bank')->references('id')->onUpdate('set null')->onDelete('set null');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
}
