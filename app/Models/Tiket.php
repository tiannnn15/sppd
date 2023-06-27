<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $table = 'tiket';
    protected $fillable = [
        'kota_asal',
        'kota_tujuan',
        'tiket_bisnis',
        'tiket_ekonomi'
    ];
}
