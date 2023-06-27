<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Sppd;
use App\Models\Pengeluaran;
use App\Models\Penginapan;
use App\Models\Provinsi;
use App\Models\Sppdpegawai;
use App\Models\Tiket;
use App\Models\Transportasi;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluaran = Pengeluaran::with(['sppd.pelaksana.pegawai'])->get();
        return view('staff.pengeluaran.index', [
            'pengeluaran' => $pengeluaran
        ]);
    }


    public function create()
    {
        $kota = Tiket::get();
        $sppd = Sppd::all();
        return view('staff.pengeluaran.create', [
            'sppd' => $sppd,
            'kota' => $kota
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'sppd_id'       => 'required',
            'transportasi'  => 'required',
            'kota_tujuan'  => 'required',
            'biaya_transportasi' => 'required|numeric',
            'bukti_transportasi' => 'required|mimes:pdf,jpg,jpeg,png',
            'biaya_taksi'   => 'required|numeric',
            'bukti_taksi' => 'required|mimes:pdf,jpg,jpeg,png',
            'status'   => 'required'
        ]);

        $sppd = Sppd::with(['pelaksana.pegawai'])->where('id', $request->sppd_id)->first();
        $jmlHari = (int)$sppd->lama_perjalanan;
        if ($jmlHari > 1) {
            $request->validate([
                'biaya_penginapan' => 'required|numeric',
                'bukti_penginapan' => 'required|mimes:pdf,jpg,jpeg,png',
            ]);
        }

        $validatedData['biaya_penginapan'] = $request->biaya_penginapan;
        $validatedData['bukti_penginapan'] = $request->bukti_penginapan;

        $taksi = Transportasi::where('provinsi_id', $sppd->provinsi_id)->first();
        if ($request->biaya_taksi > $taksi->besaran) {
            return redirect()->back()->with('error', 'Inputan Pengeluaran Taksi Melebihi Batas!');
        }

        // $harga = Tiket::where('kota_tujuan', 'like', '%' . $request->kota_tujuan . '%')->first();
        // if (($request->biaya_transportasi > $harga->tiket_bisnis) && $request->biaya_transportasi > $harga->tiket_ekonomi) {
        //     return redirect()->back()->with('error', 'Inputan Pengeluaran Biaya Transportasi Melebihi Batas!');
        // }


        if ($request->biaya_penginapan != null) {
            $penginapan = Penginapan::where('provinsi_id', $sppd->provinsi_id)->first();
            $golongan = $sppd->pelaksana->pegawai->golongan;

            if ($golongan == 'I' || $golongan == 'i') {
                if ($request->biaya_penginapan > $penginapan->gol_i) {
                    return redirect()->back()->with('error', 'Inputan Pengeluaran Penginapan Melebihi Batas!');
                }
            }

            if ($golongan == 'II' || $golongan == 'ii') {
                if ($request->biaya_penginapan > $penginapan->gol_ii) {
                    return redirect()->back()->with('error', 'Inputan Pengeluaran Penginapan Melebihi Batas!');
                }
            }

            if ($golongan == 'III' || $golongan == 'iii') {
                if ($request->biaya_penginapan > $penginapan->gol_iii) {
                    return redirect()->back()->with('error', 'Inputan Pengeluaran Penginapan Melebihi Batas!');
                }
            }

            if ($golongan == 'IV' || $golongan == 'iv') {
                if ($request->biaya_penginapan > $penginapan->gol_iv) {
                    return redirect()->back()->with('error', 'Inputan Pengeluaran Penginapan Melebihi Batas!');
                }
            }
        }

        if ($request->file('bukti_transportasi')) {
            $validatedData['bukti_transportasi'] = $request->file('bukti_transportasi')->store('bukti-transportasi');
        }
        if ($request->file('bukti_taksi')) {
            $validatedData['bukti_taksi'] = $request->file('bukti_taksi')->store('bukti-taksi');
        }
        if ($request->file('bukti_penginapan')) {
            $validatedData['bukti_penginapan'] = $request->file('bukti_penginapan')->store('bukti-penginapan');
        }

        Pengeluaran::create($validatedData);
        return redirect()->route('pengeluaran.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function show(Pengeluaran $pengeluaran)
    {
        $pengeluaran = Pengeluaran::with(['sppd'])->where('id', $pengeluaran->id)->first();
        $provinsi = Provinsi::where('id', $pengeluaran->sppd->provinsi_id)->first();
        $pegawai = Sppdpegawai::with(['pegawai'])->where('sppd_id', $pengeluaran->sppd_id)->count();
        return view('staff.pengeluaran.show', [
            'pegawai' => $pegawai,
            'pengeluaran' => $pengeluaran,
            'provinsi' => $provinsi->nama_provinsi
        ]);
    }


    public function edit(Pengeluaran $pengeluaran)
    {
        $kota = Tiket::get();
        $sppd = Sppd::all();
        return view('staff.pengeluaran.edit', [
            'sppd' => $sppd,
            'kota' => $kota,
            'pengeluaran' => $pengeluaran
        ]);
    }

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $validatedData = $this->validate($request, [
            'transportasi'  => 'required',
            'kota_tujuan'  => 'required',
            'biaya_transportasi' => 'required|numeric',
            'biaya_taksi'   => 'required|numeric',
            'status'   => 'required'
        ]);

        $sppd = Sppd::with(['pelaksana.pegawai'])->where('id', $pengeluaran->sppd_id)->first();
        $jmlHari = (int)$sppd->lama_perjalanan;
        if ($jmlHari > 1) {
            $request->validate([
                'biaya_penginapan' => 'required|numeric',
            ]);
        }

        $validatedData['biaya_penginapan'] = $request->biaya_penginapan;
        if ($request->bukti_taksi != null) {
            $validatedData['bukti_taksi'] = $request->bukti_taksi;
        }
        if ($request->bukti_transportasi != null) {
            $validatedData['bukti_transportasi'] = $request->bukti_transportasi;
        }
        if ($request->bukti_penginapan != null) {
            $validatedData['bukti_penginapan'] = $request->bukti_penginapan;
        }


        $taksi = Transportasi::where('provinsi_id', $sppd->provinsi_id)->first();
        if ($request->biaya_taksi > $taksi->besaran) {
            return redirect()->back()->with('error', 'Inputan Pengeluaran Taksi Melebihi Batas!');
        }

        // $harga = Tiket::where('kota_tujuan', 'like', '%' . $request->kota_tujuan . '%')->first();
        // if (($request->biaya_transportasi > $harga->tiket_bisnis) && $request->biaya_transportasi > $harga->tiket_ekonomi) {
        //     return redirect()->back()->with('error', 'Inputan Pengeluaran Biaya Transportasi Melebihi Batas!');
        // }


        if ($request->biaya_penginapan != null) {
            $penginapan = Penginapan::where('provinsi_id', $sppd->provinsi_id)->first();
            $golongan = $sppd->pelaksana->pegawai->golongan;

            if ($golongan == 'I' || $golongan == 'i') {
                if ($request->biaya_penginapan > $penginapan->gol_i) {
                    return redirect()->back()->with('error', 'Inputan Pengeluaran Penginapan Melebihi Batas!');
                }
            }

            if ($golongan == 'II' || $golongan == 'ii') {
                if ($request->biaya_penginapan > $penginapan->gol_ii) {
                    return redirect()->back()->with('error', 'Inputan Pengeluaran Penginapan Melebihi Batas!');
                }
            }

            if ($golongan == 'III' || $golongan == 'iii') {
                if ($request->biaya_penginapan > $penginapan->gol_iii) {
                    return redirect()->back()->with('error', 'Inputan Pengeluaran Penginapan Melebihi Batas!');
                }
            }

            if ($golongan == 'IV' || $golongan == 'iv') {
                if ($request->biaya_penginapan > $penginapan->gol_iv) {
                    return redirect()->back()->with('error', 'Inputan Pengeluaran Penginapan Melebihi Batas!');
                }
            }
        }

        if ($request->file('bukti_transportasi')) {
            $validatedData['bukti_transportasi'] = $request->file('bukti_transportasi')->store('bukti-transportasi');
        }
        if ($request->file('bukti_taksi')) {
            $validatedData['bukti_taksi'] = $request->file('bukti_taksi')->store('bukti-taksi');
        }
        if ($request->file('bukti_penginapan')) {
            $validatedData['bukti_penginapan'] = $request->file('bukti_penginapan')->store('bukti-penginapan');
        }

        Pengeluaran::where('id', $pengeluaran->id)->update($validatedData);
        return redirect()->route('pengeluaran.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();
        return redirect()->route('pengeluaran.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
