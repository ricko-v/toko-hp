<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DiskonProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Diskon_Products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('harga_asli');
            $table->string('harga_diskon');
            $table->string('gambar');
            $table->string('detail');
            $table->string('keterangan');
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
        //Schema::dropIfExists('DiskonProducts');
    }
}
