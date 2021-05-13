<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Penarikan;
use App\Models\TabunganDetail;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    public function tabungan()
    {
        $tglAwal = "";
        $tglAkhir = "";
        $tabungan = TabunganDetail::latest()->get();
        return view('bendahara.laporan.tabungan', compact('tabungan', 'tglAwal', 'tglAkhir'));
    }

    public function tabungan_filter(Request $req)
    {
        $tglAwal = $req->tglAwal;
        $tglAkhir = $req->tglAkhir;

        $tabungan = TabunganDetail::whereBetWeen('tanggal', [$tglAwal, $tglAkhir])->get();
        return view('bendahara.laporan.tabungan', compact('tabungan', 'tglAwal', 'tglAkhir'));
    }

    public function penarikan()
    {
        $tglAwal = "";
        $tglAkhir = "";
        $penarikan = Penarikan::all();
        return view('bendahara.laporan.penarikan', compact('penarikan', 'tglAwal', 'tglAkhir'));
    }

    public function penarikan_filter(Request $req)
    {
        $tglAwal = $req->tglAwal;
        $tglAkhir = $req->tglAkhir;
        $penarikan = Penarikan::whereBetWeen('tanggal', [$tglAwal, $tglAkhir])->get();
        return view('bendahara.laporan.penarikan', compact('penarikan', 'tglAwal', 'tglAkhir'));
    }
}
