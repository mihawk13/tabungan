<?php

use App\Models\Penarikan;
use App\Models\Kelas;
use App\Models\Pegawai;
use App\Models\Siswa;
use App\Models\Tabungan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function getJenisKelamin()
{
    $jk = ['Laki-Laki', 'Perempuan'];
    return $jk;
}

function getJabatan()
{
    $jbt = ['Bendahara', 'Wali Kelas'];
    return $jbt;
}

function cekWaliKelas($pgw_id)
{
    if ($pgw_id == 1) {
        return 1;
    } else {
        $kls = Kelas::where('pegawai_id', $pgw_id)->count();
        return $kls;
    }
}

function getJmlPegawai()
{
    $pgw = Pegawai::count();
    return $pgw;
}

function getJmlKelas()
{
    $kls = Kelas::count();
    return $kls;
}

function getJmlSiswa()
{
    $sw = Siswa::count();
    return $sw;
}

function getJmlTabungan()
{
    $sld = Tabungan::sum('saldo');
    return $sld;
}

function getJmlPenarikan()
{
    $sld = Penarikan::sum('jml_tarik');
    return $sld;
}

function getJmlSaldo()
{
    $sld = getJmlTabungan() - getJmlPenarikan();
    return $sld;
}


function getJmlTabunganGuru()
{
    $pgw_id = Auth::user()->pegawai->user_id;
    $sld = DB::select('SELECT SUM(tbd.jumlah) jml FROM tabungan_detail tbd
    WHERE tbd.user_id = ?', [$pgw_id]);
    return $sld[0]->jml;
}

function getJmlPenarikanGuru()
{
    $pgw_id = Auth::user()->pegawai->user_id;
    $sld = DB::select('SELECT SUM(pnr.jml_tarik) jml FROM penarikan pnr
    WHERE pnr.user_id = ?', [$pgw_id]);
    return $sld[0]->jml;
}

function getJmlSaldoGuru()
{
    $sld = getJmlTabunganGuru() - getJmlPenarikanGuru();
    return $sld;
}


function getJmlTabunganSiswa()
{
    $sw_id = Auth::user()->siswa->id;
    $sld = DB::select('SELECT SUM(tbd.jumlah) jml FROM tabungan_detail tbd
    INNER JOIN tabungan tbn ON tbd.tabungan_id=tbn.id
    WHERE tbn.siswa_id = ?', [$sw_id]);
    return $sld[0]->jml;
}

function getJmlPenarikanSiswa()
{
    $sw_id = Auth::user()->siswa->id;
    $sld = DB::select('SELECT SUM(pnr.jml_tarik) jml FROM penarikan pnr
    INNER JOIN tabungan tbn ON pnr.tabungan_id=tbn.id
    WHERE tbn.siswa_id = ?', [$sw_id]);
    return $sld[0]->jml;
}

function getJmlSaldoSiswa()
{
    $sld = getJmlTabunganSiswa() - getJmlPenarikanSiswa();
    return $sld;
}
