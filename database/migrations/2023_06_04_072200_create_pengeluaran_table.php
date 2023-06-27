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
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sppd_id');
            $table->foreign('sppd_id')->references('id')->on('sppd');
            $table->string('kota_tujuan');
            $table->string('transportasi');
            $table->decimal('biaya_transportasi', 25, 0);
            $table->string('bukti_transportasi', 255);
            $table->decimal('biaya_taksi', 25, 0);
            $table->string('bukti_taksi', 255);
            $table->decimal('biaya_penginapan', 25, 0)->nullable();
            $table->string('bukti_penginapan', 255);
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
        Schema::dropIfExists('pengeluaran');
    }
};
