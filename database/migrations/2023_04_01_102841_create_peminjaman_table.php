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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->char('kode_pinjam', 100);
            $table->foreignId('peminjam_id');
            $table->char('kd_barang', 200);
            $table->string('nama_peminjam');
            $table->foreignId('petugas_pinjam')->nullable();
            $table->foreignId('petugas_kembali')->nullable();
            $table->integer('status');
            $table->integer('denda')->nullable();
            $table->date('tanggal_pinjam')->nullable();
            $table->date('tanggal_kembali')->nullable();
            $table->date('tanggal_pengembalian')->nullable();
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
        Schema::dropIfExists('peminjaman');
    }
};
