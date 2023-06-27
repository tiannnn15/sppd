<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use Illuminate\Http\Request;

class BiayaController extends Controller
{
    public function index() {
        $biaya = Biaya::all();
        return view('sekre.biaya.index', compact('biaya'));
    }

    public function create()
    {
        return view('sekre.biaya.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'provinsi_id'     => 'required',
            'satuan'     => 'required',
            'luar_kota'   => 'required',
            'dalam_kota'     => 'required',
            'diklat'   => 'required'
        ]);

        //create post
        Biaya::create([
            'provinsi_id'     => $request->provinsi_id,
            'satuan'   => $request->satuan,
            'luar_kota'     => $request->luar_kota,
            'dalam_kota'   => $request->dalam_kota,
            'diklat'     => $request->diklat
        ]);

        //redirect to index
        return redirect()->route('biaya.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Biaya $biaya)
    {
        return view('sekre.biaya.edit', compact('biaya'));
    }

    public function update(Request $request, Biaya $biaya)
    {
        //validate form
        $this->validate($request, [
            'provinsi_id'     => 'required',
            'satuan'     => 'required',
            'luar_kota'   => 'required',
            'dalam_kota'     => 'required',
            'diklat'   => 'required'
        ]);

        $biaya->update([
            'provinsi_id'     => $request->provinsi_id,
            'satuan'   => $request->satuan,
            'luar_kota'     => $request->luar_kota,
            'dalam_kota'   => $request->dalam_kota,
            'diklat'     => $request->diklat
        ]);

        //redirect to index
        return redirect()->route('biaya.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Biaya $biaya)
    {
        //delete post
        $biaya->delete();

        //redirect to index
        return redirect()->route('biaya.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
