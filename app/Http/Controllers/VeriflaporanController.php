<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VeriflaporanController extends Controller
{
    public function index() {
        $laporan = Laporan::with(['sppd', 'sppd.pelaksana.pegawai'])->get();
        return view('bend.veriflaporan.index', [
            'laporan' => $laporan
        ]);
    }


//     public function show($id){
//         // $disposisi=Disposisi::get();
//         // $suratmasuk=Suratmasuk::get();
//         $item = DB::table('suratmasuk')
//             ->join('disposisi', 'disposisi.suratmasuk_id', '=', 'suratmasuk.id')
//             ->join('pegawai', 'pegawai.id', '=', 'disposisi.pegawai_id')
//             ->where('disposisi.id', '=', $id)
//             ->get()->first();
// // dd($item);
//         return view('staff.show', ['item' => $item]);

//     }

    public function show($id)
    {
        $laporan = DB::table('laporan')
            ->join('sppd', 'sppd.id', '=', 'laporan.sppd_id')
            // ->join('pegawai', 'pegawai.id', '=', 'sppd_pegawai.pegawai_id')
            ->where('laporan.id', '=', $id)
            ->get()->first();
        // $laporan = Laporan::with(['sppd.pelaksana.pegawai'])->where('id', $laporan->id)->first();
        // dd($laporan);
        return view('bend.veriflaporan.show', [
            'laporan' => $laporan,
        ]);
    }

    public function approved($id)
    {
        $data=laporan::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();
    }

    public function canceled($id)
    {
        $data=laporan::find($id);
        $data->status='canceled';
        $data->save();
        return redirect()->back();
    }
}
