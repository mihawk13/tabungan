<?php

use App\Models\Penarikan;
use App\Models\Kelas;
use App\Models\Pegawai;
use App\Models\Siswa;
use App\Models\Tabungan;

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
