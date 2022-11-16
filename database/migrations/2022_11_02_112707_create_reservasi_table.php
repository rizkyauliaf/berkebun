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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id('id_reservasi');
            $table->foreignId('id_promo')->nullable()->constrained('promo', 'id_promo')
                ->onUpdate('no action')
                ->onDelete('no action');
            $table->foreignId('id_status')->nullable()->constrained('status', 'id_status')
                ->onUpdate('no action')
                ->onDelete('no action');
            $table->foreignId('id_paket')->nullable()->constrained('paket', 'id_paket')
                ->onUpdate('no action')
                ->onDelete('no action');
            $table->foreignId('id_user')->nullable()->constrained('users', 'id')
                ->onUpdate('no action')
                ->onDelete('no action');
            $table->string('nama_pesan')->nullable();
            $table->date('tgl_pesan')->nullable();
            $table->integer('jumlah_pesan')->nullable();
            $table->text('alasan')->nullable();
            $table->string('total_bayar')->nullable();
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
        Schema::dropIfExists('reservasi');
    }
};
