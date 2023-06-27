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
        Schema::create('disposisi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('suratmasuk_id');
            $table->foreign('suratmasuk_id')->references('id')->on('suratmasuk');
            $table->unsignedBigInteger('pegawai_id');
            $table->foreign('pegawai_id')->references('id')->on('pegawai');
		    $table->text('pengikut')->nullable();
            $table->date('tgl_diterima');
            $table->string('nomer_agenda');
            $table->string('sifat_surat');
            $table->string('hal_surat');
            $table->string('urgensi_surat');
            $table->string('catatan_disposisi');
            $table->date('tgl_disposisi');
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
        Schema::dropIfExists('disposisi');
    }
};
