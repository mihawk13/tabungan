<?php

namespace App\Http\Controllers;

use App\Models\Penarikan;
use App\Models\TabunganDetail;

class HomeController extends Controller
{
    public function penarikan()
    {
        $penarikan = Penarikan::all();
        return view('bendahara.penarikan.index', compact('penarikan'));
    }

    public function tabungan()
    {
        $tabungan = TabunganDetail::latest()->get();
        return view('bendahara.tabungan.index', compact('tabungan'));
    }
}
