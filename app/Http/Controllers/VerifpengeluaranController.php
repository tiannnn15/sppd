<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Models\Pengeluaran;
use App\Models\Sppdpegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifpengeluaranController extends Controller
{
    public function index() {

        $pengeluaran = Pengeluaran::with(['sppd.pelaksana.pegawai'])->get();
        return view('bend.verifpengeluaran.index', [
            'pengeluaran' => $pengeluaran
        ]);
    }

    // public function show($id) {

    //     $pengeluaran = DB::table('pengeluaran')
    //         ->join('sppd', 'sppd.id', '=', 'pengeluaran.sppd_id')
    //         // ->join('sppd_pegawai', 'sppd_pegawai.sppd_id', '=', 'sppd.id')
    //         // ->join('sppd', 'sppd.provinsi_id', '=', 'provinsi.id')
    //         ->where('sppd.id', '=', $id)
    //         ->get()->first();
    //     $pengeluaran = Pengeluaran::with(['sppd'])->where('id', $pengeluaran->id)->first();
    //     $provinsi = Provinsi::where('id', $pengeluaran->sppd->provinsi_id)->first();
    //     $pegawai = Sppdpegawai::with(['pegawai'])->where('sppd_id', $pengeluaran->sppd_id)->count();
    //     return view('bend.verifpengeluaran.show', [
    //         'pegawai' => $pegawai,
    //         'pengeluaran' => $pengeluaran,
    //         'provinsi' => $provinsi->nama_provinsi
    //     ]);
    // }


    public function show($id) {

        $pengeluaran = DB::table('pengeluaran')
            ->join('sppd', 'sppd.id', '=', 'pengeluaran.sppd_id')
            ->join('sppd_pegawai', 'sppd_pegawai.sppd_id', '=', 'sppd.id')
            ->join('pegawai', 'pegawai.id', '=', 'sppd_pegawai.pegawai_id')
            // ->join('sppd', 'sppd.provinsi_id', '=', 'provinsi.id')
            ->where('pengeluaran.id', '=', $id)
            ->get()->first();
        // $pengeluaran = Pengeluaran::with(['sppd'])->where('id', $pengeluaran->id)->first();
        // $provinsi = Provinsi::where('id', $pengeluaran->sppd->provinsi_id)->first();
        // $pegawai = Sppdpegawai::with(['pegawai'])->where('sppd_id', $pengeluaran->sppd_id)->count();
        // dd($pengeluaran);
        return view('bend.verifpengeluaran.show', [

            'pengeluaran' => $pengeluaran
        ]);
    }

    public function approv($id)
    {
        $data=pengeluaran::find($id);
        $data->status='approv';
        $data->save();
        return redirect()->back();
    }

    public function cancel($id)
    {
        $data=pengeluaran::find($id);
        $data->status='cancel';
        $data->save();
        return redirect()->back();
    }
}
