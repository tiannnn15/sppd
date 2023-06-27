<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index()
    {
    	// mengambil semua data pengguna
    	$provinsi = Provinsi::all();
    	// return data ke view
    	return view('provinsi', ['provinsi' => $provinsi]);
    }
}
