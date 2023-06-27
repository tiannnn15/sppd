<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SekreController extends Controller
{
    public function index() {
        return view('sekre.index');
    }
}
