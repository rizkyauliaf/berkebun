<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket', function (Blueprint $table) {
            $table->id('id_paket');
            $table->string('nama_paket')->nullable();
            $table->text('deskripsi_paket')->nullable();
            $table->string('harga_weekday')->nullable();
            $table->string('harga_weekend')->nullable();
            $table->string('gambar_paket')->nullable();
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
        Schema::dropIfExists('paket');
    }
};
