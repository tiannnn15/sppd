<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function cek() {
        if (auth()->user()->role_id === 1) {
            return redirect('/sekre');
        } elseif (auth()->user()->role_id === 2) {
            return redirect('/kadin');
        } elseif (auth()->user()->role_id === 3) {
            return redirect('/staff');
        } else {
            return redirect('/bend');
        }
    }
}
