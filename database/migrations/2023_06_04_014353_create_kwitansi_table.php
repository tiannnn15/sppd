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
        Schema::create('kwitansi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sppd_id');
            $table->foreign('sppd_id')->references('id')->on('sppd');
            $table->string('lembar_ke')->nullable();
            $table->string('no_kas')->nullable();
            $table->string('kode_rekening')->nullable();
            $table->string('terima_dari')->nullable();
            $table->string('banyaknya_uang')->nullable();
            $table->string('untuk_pembayaran');
            $table->string('status_perjalanan');
            $table->decimal('rincian', 25, 0);
            $table->decimal('jumlah_diterima', 25, 0);
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
        Schema::dropIfExists('kwitansi');
    }
};
