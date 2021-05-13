<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penarikan;
use App\Models\TabunganDetail;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{

    public function tabungan()
    {
        $tabungan = DB::table('tabungan')
        ->join('tabungan_detail', 'tabungan_detail.tabungan_id', '=', 'tabungan.id')
        ->join('siswa', 'siswa.id', '=', 'tabungan.siswa_id')
        ->join('kelas', 'kelas.id', '=', 'siswa.kelas_id')
        ->select('tabungan.saldo', 'tabungan_detail.*', 'kelas.kelas', 'siswa.nama')
        ->where('siswa.id', auth()->user()->siswa->id)
        ->get();
        return view('siswa.tabungan.index', compact('tabungan'));
    }

    public function penarikan()
    {
        $penarikan = DB::table('tabungan')
        ->join('penarikan', 'penarikan.tabungan_id', '=', 'tabungan.id')
        ->join('siswa', 'siswa.id', '=', 'tabungan.siswa_id')
        ->join('kelas', 'kelas.id', '=', 'siswa.kelas_id')
        ->select('tabungan.saldo', 'penarikan.*', 'kelas.kelas', 'siswa.nama')
        ->where('siswa.id', auth()->user()->siswa->id)
        ->get();
        return view('siswa.penarikan.index', compact('penarikan'));
    }
}
