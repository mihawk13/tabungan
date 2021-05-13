<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaldoController extends Controller
{
    public function saldo()
    {
        $kls = '';
        $kelas = Kelas::all();
        $tabungan = DB::table('tabungan')
        ->join('siswa', 'siswa.id', '=', 'tabungan.siswa_id')
        ->join('kelas', 'kelas.id', '=', 'siswa.kelas_id')
        ->select('tabungan.*', 'siswa.nama', 'kelas.kelas')
        ->get();
        return view('bendahara.saldo.index', compact('kelas', 'tabungan', 'kls'));
    }

    public function saldo_filter(Request $req)
    {
        $kls = $req->kelas;
        $kelas = Kelas::all();
        $tabungan = DB::table('tabungan')
        ->join('siswa', 'siswa.id', '=', 'tabungan.siswa_id')
        ->join('kelas', 'kelas.id', '=', 'siswa.kelas_id')
        ->select('tabungan.*', 'siswa.nama', 'kelas.kelas')
        ->where('kelas.id', $kls)
        ->get();
        return view('bendahara.saldo.index', compact('kelas', 'tabungan', 'kls'));
    }
}
