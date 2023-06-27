<?php

namespace App\Http\Controllers;

use App\Models\Suratmasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KadinController extends Controller
{
    public function index() {
        return view('kadin.index');
    }

    public function listsuratmasuk(){
        $suratmasuk = Suratmasuk::latest()->paginate(10);
        // return data ke view
        return view('kadin.listsuratmasuk', ['suratmasuk' => $suratmasuk]);
    }

    public function app($id)
    {
        $data=suratmasuk::find($id);
        $data->status='Sudah Didisposisi';
        $data->save();
        return redirect()->back();
    }

}
