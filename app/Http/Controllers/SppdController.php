<?php

namespace App\Http\Controllers;

use App\Models\Sppd;
use App\Models\Pegawai;
use App\Models\Provinsi;
use App\Models\Sppdpegawai;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\PDF as DomPDFPDF;
// use Barryvdh\DomPDF\Facade as PDF;
// use \PDF;

class SppdController extends Controller
{
    public function index()
    {
        $sppd = Sppd::with(['pelaksana.pegawai'])->get();
        return view('staff.sppd.index', compact('sppd'));
    }

    public function create()
    {
        $pegawai = Pegawai::all();
        $provinsi = Provinsi::all();
        // $sppd = Sppd::all();
        return view('staff.sppd.create', ['pegawai' => $pegawai, 'provinsi' => $provinsi]);
    }

    public function store(Request $request)
    {
        // $request['pegawai_id'] = implode(", ", $request['pegawai_id']);
        $this->validate($request, [
            // 'nomer_sppd'     => 'required',
            'lembar_ke'     => 'required',
            'kode_no'   => 'required',
            'maksud_perjalanan'     => 'required',
            'alat_angkut'   => 'required',
            'tempat_berangkat'     => 'required',
            'provinsi'     => 'required',
            'tempat_tujuan'   => 'required',
            'lama_perjalanan'     => 'required',
            'tgl_berangkat'   => 'required',
            'tgl_kembali'     => 'required',
            'pelaksana'   => 'required', //fitur searc
            'keterangan'     => 'required',
            'tgl_sppd'   => 'required',
            'dasar'   => 'required',
            'status'   => 'required'
        ]);

        if ($request->pengikut != null) {
            $data = $request->pengikut;
        }


        $latestSppd = Sppd::latest()->first();
        // dd($latestSppd);
        if ($latestSppd == null) {
            $nomorSppd = '660/001/411.316/' . date('Y');
        } else {
            $oldSppd = $latestSppd->nomer_sppd;
            $implode = explode("/", $oldSppd);
            $number = str_replace("0", "", $implode[1]);
            $number = (int)$number + 1;
            if ($number < 10) {
                $stringNum = '00' . $number;
            } elseif ($number > 10 && $number < 100) {
                $stringNum = '0' . $number;
            } else {
                $stringNum = $number;
            }
            $nomorSppd = '660/' . $stringNum . '/411.316/' . date('Y');
        }
        $sppd = Sppd::create([
            'nomer_sppd'     => $nomorSppd,
            'lembar_ke'   => $request->lembar_ke,
            'kode_no'     => $request->kode_no,
            'maksud_perjalanan'   => $request->maksud_perjalanan,
            'alat_angkut'     => $request->alat_angkut,
            'tempat_berangkat'     => $request->tempat_berangkat,
            'provinsi_id' => $request->provinsi,
            'tempat_tujuan'   => $request->tempat_tujuan,
            'lama_perjalanan'     => $request->lama_perjalanan,
            'tgl_berangkat'   => $request->tgl_berangkat,
            'tgl_kembali'     => $request->tgl_kembali,
            'keterangan'     => $request->keterangan,
            'tgl_sppd'   => $request->tgl_sppd,
            'dasar'   => $request->dasar,
            'status'   => $request->status
        ]);

        Sppdpegawai::create([
            'sppd_id' => $sppd->id,
            'pegawai_id' => $request->pelaksana,
            'status' => 1
        ]);

        if ($request->pengikut != null) {
            $data = $request->pengikut;
            for ($i = 0; $i < count($data); $i++) {
                Sppdpegawai::create([
                    'sppd_id' => $sppd->id,
                    'pegawai_id' => $data[$i],
                    'status' => 2
                ]);
            }
        }

        //redirect to ind
        return redirect()->route('sppd.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Sppd $sppd)
    {
        $sppd = Sppd::with(['pelaksana'])->first();
        $provinsi = Provinsi::all();
        $pegawai = Pegawai::all();
        $idPendamping = Sppdpegawai::select('pegawai_id')->where('status', 2)->pluck('pegawai_id')->toArray();
        return view('staff.sppd.edit', [
            'sppd' => $sppd,
            'pegawai' => $pegawai,
            'provinsi' => $provinsi,
            'pendamping' => $idPendamping
        ]);
    }

    public function update(Request $request, Sppd $sppd)
    {
        //validate form
        $this->validate($request, [
            'nomer_sppd'     => 'required',
            'lembar_ke'     => 'required',
            'kode_no'   => 'required',
            'maksud_perjalanan'     => 'required',
            'alat_angkut'   => 'required',
            'tempat_berangkat'     => 'required',
            'provinsi' => 'required',
            'tempat_tujuan'   => 'required',
            'lama_perjalanan'     => 'required',
            'tgl_berangkat'   => 'required',
            'tgl_kembali'     => 'required',
            'pelaksana'   => 'required',
            'keterangan'     => 'required',
            'tgl_sppd'   => 'required',
            'dasar'   => 'required',
            'status'   => 'required'
        ]);

        $sppd->update([
            'nomer_sppd'     => $request->nomer_sppd,
            'lembar_ke'   => $request->lembar_ke,
            'kode_no'     => $request->kode_no,
            'maksud_perjalanan'   => $request->maksud_perjalanan,
            'alat_angkut'     => $request->alat_angkut,
            'tempat_berangkat'     => $request->tempat_berangkat,
            'provinsi_id' => $request->provinsi,
            'tempat_tujuan'   => $request->tempat_tujuan,
            'lama_perjalanan'     => $request->lama_perjalanan,
            'tgl_berangkat'   => $request->tgl_berangkat,
            'tgl_kembali'     => $request->tgl_kembali,
            'keterangan'     => $request->keterangan,
            'tgl_sppd'   => $request->tgl_sppd,
            'dasar'   => $request->dasar,
            'status'   => $request->status
        ]);

        Sppdpegawai::where(['sppd_id' =>  $sppd->id, 'status' => 1])->update([
            'pegawai_id' => $request->pelaksana,
        ]);

        $oldPendamping = Sppdpegawai::select('pegawai_id')->where('status', 2)->pluck('pegawai_id')->toArray();

        if ($request->pengikut != null) {
            $data = $request->pengikut;

            for ($i = 0; $i < count($oldPendamping); $i++) {
                if (!in_array($oldPendamping[$i], $data)) {
                    Sppdpegawai::where(['pegawai_id' => $oldPendamping[$i], 'sppd_id' => $sppd->id])->delete();
                }
            }

            for ($i = 0; $i < count($data); $i++) {
                if (!in_array($data[$i], $oldPendamping)) {
                    Sppdpegawai::create([
                        'sppd_id' => $sppd->id,
                        'pegawai_id' => $data[$i],
                        'status' => 2
                    ]);
                }
            }
        }

        //redirect to inde
        return redirect()->route('sppd.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Sppd $sppd)
    {

        Sppdpegawai::where('sppd_id', $sppd->id)->delete();
        $sppd->delete();

        //redirect to inde
        return redirect()->route('sppd.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function show(Sppd $sppd)
    {
        $sppd = Sppd::with(['pelaksana.pegawai'])->where('id', $sppd->id)->first();
        $pendamping = Sppdpegawai::with('pegawai')->where(['status' => 2, 'sppd_id' => $sppd->id])->get();
        return view('staff.sppd.show', [
            'sppd' => $sppd,
            'pendamping' => $pendamping
        ]);
    }


    public function pdf($id)
    {
        $sppd = Sppd::where('id', $id)->first();
        $pendamping = Sppdpegawai::with('pegawai')->where(['status' => 2, 'sppd_id' => $sppd->id])->get();
        $pdf = Pdf::loadView('staff.sppd.sppd', [
            'sppd' => $sppd,
            'pendamping' => $pendamping
        ]);
        return $pdf->stream('sppd.pdf');
    }
}
