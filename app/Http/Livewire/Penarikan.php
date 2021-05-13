<?php

namespace App\Http\Livewire;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Pegawai;
use App\Models\Tabungan;
use Livewire\Component;

class Penarikan extends Component
{
    public $siswaid;
    public $saldo;
    public $penarikan;
    public $pnr;

    public function render()
    {
        $siswa = $this->getSiswa();
        return view('livewire.penarikan', compact('siswa'));
    }

    public function getSiswa()
    {
        $pgwId = Pegawai::where('user_id', auth()->user()->id)->get();
        $kelas = Kelas::where('pegawai_id', $pgwId[0]->id)->get();
        $siswa = Siswa::where('kelas_id', $kelas[0]->id)->orderBy('nama')->get();
        return $siswa;
    }

    public function UpdatedSiswaid($siswa_id)
    {
        $tabungan = Tabungan::where('siswa_id', $siswa_id)->get();
        $this->saldo = $tabungan[0]->saldo;
    }

    public function UpdatedPenarikan($jml)
    {
        if ($this->saldo < $jml) {
            $this->penarikan = 0;
        }
    }
}
