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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sppd_id');
            $table->foreign('sppd_id')->references('id')->on('sppd');
            $table->text('laporan_tentang');
            $table->text('latar_belakang');
            $table->text('landasan');
            $table->text('maksud_tujuan');
            $table->text('kegiatan');
            $table->text('perihal');
            $table->text('kesimpulan');
            $table->date('tgl_laporan');
            $table->text('penutup');
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
        Schema::dropIfExists('laporan');
    }
};
