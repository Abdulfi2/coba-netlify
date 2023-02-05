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
        Schema::create('penghapusan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_aset')->unique()->nullable();
            $table->string('nama_aset');
            $table->unsignedInteger('id_jenis');
            $table->unsignedInteger('id_kategori');
            $table->unsignedInteger('id_anggaran');
            $table->enum('kondisi', ['Baik', 'Rusak', 'Renovasi']);
            $table->date('tgl_terima');
            $table->bigInteger('nilai_aset');
            $table->unsignedInteger('id_satker');
            $table->integer('batas_pemakaian');
            $table->enum('penyusutan', ['ya', 'no']);
            $table->string('lokasi_aset');
            $table->text('ket_aset');
            $table->string('foto_fisik');
            $table->timestamps();

            $table->foreign('id_jenis')->references('id')->on('jenis');
            $table->foreign('id_kategori')->references('id')->on('kategori');
            $table->foreign('id_anggaran')->references('id')->on('anggaran');
            $table->foreign('id_satker')->references('id')->on('satker');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penghapusan');
    }
};
