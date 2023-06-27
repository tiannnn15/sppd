<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\Kwitansi;
use App\Models\Sppd;
use App\Models\Sppdpegawai;
use Illuminate\Http\Request;

class KwitansiController extends Controller
{

    public function index()
    {
        $kwitansi = Kwitansi::with(['sppd', 'sppd.pelaksana.pegawai'])->get();
        return view('staff.kwitansi.index', [
            'kwitansi' => $kwitansi
        ]);
    }


    public function create()
    {
        $sppd = Sppd::all();
        return view('staff.kwitansi.create', [
            'sppd' => $sppd,
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'sppd_id'       => 'required',
            'lembar_ke'     => 'required',
            'no_kas'        => 'required',
            'kode_rekening' => 'required',
            'terima_dari'   => 'required',
            'banyaknya_uang' => 'required',
            'untuk_pembayaran'   => 'required',
            'status_perjalanan'   => 'required',
            'status'   => 'required'
        ]);

        $sppd = Sppd::where('id', $request->sppd_id)->first();
        $biaya = Biaya::where('provinsi_id', $sppd->provinsi_id)->first();
        if ($biaya != null) {
            $biaya = $biaya->luar_kota;
        } else {
            $biaya = 0;
        }

        $validatedData['rincian'] = $biaya;
        $validatedData['jumlah_diterima'] = $biaya * (int)$sppd->lama_perjalanan;

        Kwitansi::create($validatedData);
        return redirect()->route('kwitansi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function show(Kwitansi $kwitansi)
    {
        $kwitansi = Kwitansi::with(['sppd.pelaksana.pegawai'])->where('id', $kwitansi->id)->first();
        return view('staff.kwitansi.show', [
            'kwitansi' => $kwitansi,
        ]);
    }


    public function edit(Kwitansi $kwitansi)
    {
        $sppd = Sppd::all();
        $kwitansi = Kwitansi::with(['sppd'])->where('id', $kwitansi->id)->first();
        return view('staff.kwitansi.edit', [
            'kwitansi' => $kwitansi,
            'sppd' => $sppd,
        ]);
    }


    public function update(Request $request, Kwitansi $kwitansi)
    {
        $validatedData = $this->validate($request, [
            'lembar_ke'     => 'required',
            'no_kas'        => 'required',
            'kode_rekening' => 'required',
            'terima_dari'   => 'required',
            'banyaknya_uang' => 'required',
            'untuk_pembayaran'   => 'required',
            'status_perjalanan'   => 'required',
            'status'   => 'required'
        ]);

        $sppd = Sppd::where('id', $kwitansi->sppd_id)->first();
        $biaya = Biaya::where('provinsi_id', $sppd->provinsi_id)->first();
        if ($biaya != null) {
            $biaya = $biaya->luar_kota;
        } else {
            $biaya = 0;
        }

        $validatedData['rincian'] = $biaya;
        $validatedData['jumlah_diterima'] = $biaya * (int)$sppd->lama_perjalanan;

        Kwitansi::where('id', $kwitansi->id)->update($validatedData);
        return redirect()->route('kwitansi.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }


    public function destroy(Kwitansi $kwitansi)
    {
        $kwitansi->delete();
        //redirect to inde
        return redirect()->route('kwitansi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
