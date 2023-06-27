<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function index() {
        $tiket = Tiket::all();
        return view('sekre.tiket.index', compact('tiket'));
    }

    public function create()
    {
        return view('sekre.tiket.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kota_asal'     => 'required',
            'kota_tujuan'     => 'required',
            'tiket_bisnis'   => 'required',
            'tiket_ekonomi'     => 'required'
        ]);

        //create post
        Tiket::create([
            'kota_asal'     => $request->kota_asal,
            'kota_tujuan'   => $request->kota_tujuan,
            'tiket_bisnis'     => $request->tiket_bisnis,
            'tiket_ekonomi'   => $request->tiket_ekonomi
        ]);

        //redirect to index
        return redirect()->route('tiket.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Tiket $tiket)
    {
        return view('sekre.tiket.edit', compact('tiket'));
    }

    public function update(Request $request, Tiket $tiket)
    {
        //validate form
        $this->validate($request, [
            'kota_asal'     => 'required',
            'kota_tujuan'     => 'required',
            'tiket_bisnis'   => 'required',
            'tiket_ekonomi'     => 'required'
        ]);

        $tiket->update([
            'kota_asal'     => $request->kota_asal,
            'kota_tujuan'   => $request->kota_tujuan,
            'tiket_bisnis'     => $request->tiket_bisnis,
            'tiket_ekonomi'   => $request->tiket_ekonomi
        ]);

        //redirect to index
        return redirect()->route('tiket.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Tiket $tiket)
    {
        //delete post
        $tiket->delete();

        //redirect to index
        return redirect()->route('tiket.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
