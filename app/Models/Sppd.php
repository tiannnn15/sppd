<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sppd extends Model
{
    use HasFactory;
    protected $table = 'sppd';
    protected $fillable = [
        'pegawai_id', //fitur search
        'nomer_sppd',
        'lembar_ke',
        'kode_no',
        'maksud_perjalanan',
        'alat_angkut',
        'tempat_berangkat',
        'provinsi_id',
        'tempat_tujuan',
        'lama_perjalanan',
        'tgl_berangkat',
        'tgl_kembali',
        'keterangan',
        'tgl_sppd',
        'dasar',
        'status',
    ];

    // public function pegawai()
    // {
    // 	return $this->belongsTo(Pegawai::class, "pegawai_id", "id");
    // }

    public function pelaksana()
    {
        return $this->hasOne(Sppdpegawai::class)->where(function ($query) {
            $query->where('status', '=', '1');
        });
    }

    public function kwitansi()
    {
        return $this->hasOne(Kwitansi::class);
    }

    public function pengeluaran()
    {
        return $this->hasOne(Pengeluaran::class);
    }

    public function provinsi()
    {
        return $this->hasOne(Provinsi::class, 'provinsi_id', 'id');
    }
}
