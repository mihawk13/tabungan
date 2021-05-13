<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaldoWaliController extends Controller
{
    public function saldo()
    {
        $tabungan = DB::table('tabungan')
        ->join('siswa', 'siswa.id', '=', 'tabungan.siswa_id')
        ->join('kelas', 'kelas.id', '=', 'siswa.kelas_id')
        ->select('tabungan.*', 'siswa.nama', 'kelas.kelas')
        ->where('kelas.pegawai_id', auth()->user()->pegawai->id)
        ->get();
        return view('wali_kelas.saldo.index', compact('tabungan'));
    }
}
