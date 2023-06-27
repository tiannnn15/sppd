<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;

    protected $table = 'disposisi';
    protected $fillable = [
        'suratmasuk_id',
        'pegawai_id',
        'pengikut',
        'tgl_diterima',
        'nomer_agenda',
        'sifat_surat',
        'hal_surat',
        'urgensi_surat',
        'catatan_disposisi',
        'tgl_disposisi'
    ];

    public function suratmasuk()
    {
    	return $this->belongsTo(Suratmasuk::class, 'suratmasuk_id', 'id');
    }

    public function pegawai()
    {
    	return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }

}
