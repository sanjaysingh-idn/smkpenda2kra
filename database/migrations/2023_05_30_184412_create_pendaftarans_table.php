<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['menunggu', 'diterima', 'ditolak'])->default('menunggu');
            $table->string('nama');
            $table->string('email');
            $table->string('jurusan');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->bigInteger('nisn')->unique();
            $table->bigInteger('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->bigInteger('no_telp');
            $table->string('asal_sekolah');
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']);
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('no_telp_ortu');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->enum('penghasilan_ortu', ['Rp. 1.000.000 - Rp. 2.000.000', 'Rp. 2.000.000 - Rp. 3.000.000', 'Rp. 3.000.000 - Rp. 4.000.000', 'Rp. 4.000.000 - Rp. 5.000.000', '> Rp. 5.000.000']);
            $table->string('pas_foto');
            $table->string('scan_raport');
            $table->string('scan_akta');
            $table->string('scan_kk');
            $table->string('scan_piagam1')->nullable();
            $table->string('scan_piagam3')->nullable();
            $table->string('scan_piagam2')->nullable();
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
        Schema::dropIfExists('pendaftarans');
    }
}
