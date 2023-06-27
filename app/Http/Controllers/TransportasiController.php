<?php

namespace App\Http\Controllers;

use App\Models\Transportasi;
use Illuminate\Http\Request;

class TransportasiController extends Controller
{
    public function index() {
        $transportasi = Transportasi::all();
        return view('sekre.transportasi.index', compact('transportasi'));
    }

    public function create()
    {
        return view('sekre.transportasi.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'provinsi_id'     => 'required',
            'satuan'     => 'required',
            'besaran'   => 'required'
        ]);

        //create post
        Transportasi::create([
            'provinsi_id'     => $request->provinsi_id,
            'satuan'   => $request->satuan,
            'besaran'     => $request->besaran
        ]);

        //redirect to index
        return redirect()->route('transportasi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Transportasi $transportasi)
    {
        return view('sekre.transportasi.edit', compact('transportasi'));
    }

    public function update(Request $request, Transportasi $transportasi)
    {
        //validate form
        $this->validate($request, [
            'provinsi_id'     => 'required',
            'satuan'     => 'required',
            'besaran'   => 'required'
        ]);

        $transportasi->update([
            'provinsi_id'     => $request->provinsi_id,
            'satuan'   => $request->satuan,
            'besaran'     => $request->besaran
        ]);

        //redirect to index
        return redirect()->route('transportasi.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Transportasi $transportasi)
    {
        //delete post
        $transportasi->delete();

        //redirect to index
        return redirect()->route('transportasi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
