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
        Schema::create('sppd', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('pegawai_id');
            // $table->foreign('pegawai_id')->references('id')->on('pegawai');
            $table->string('nomer_sppd');
            $table->string('lembar_ke');
            $table->string('kode_no');
            $table->text('maksud_perjalanan');
            $table->string('alat_angkut');
            $table->string('tempat_berangkat');
            $table->unsignedBigInteger('provinsi_id');
            $table->foreign('provinsi_id')->references('id')->on('provinsi');
            $table->string('tempat_tujuan');
            $table->integer('lama_perjalanan');
            $table->date('tgl_berangkat');
            $table->date('tgl_kembali');
            $table->text('keterangan');
            $table->date('tgl_sppd');
            $table->text('dasar');
            $table->string('status');
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
        Schema::dropIfExists('sppd');
    }
};
