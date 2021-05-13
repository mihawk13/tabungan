<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Pegawai;
use App\Models\Tabungan;
use App\Models\TabunganDetail;
use Illuminate\Http\Request;

class TabunganController extends Controller
{

    public function getSiswa()
    {
        $pgwId = Pegawai::where('user_id', auth()->user()->id)->get();
        $kelas = Kelas::where('pegawai_id', $pgwId[0]->id)->get();
        $siswa = Siswa::where('kelas_id', $kelas[0]->id)->orderBy('nama')->get();
        return $siswa;
    }

    public function index()
    {
        $tabungan = TabunganDetail::where('user_id', auth()->user()->id)->latest()->get();
        return view('wali_kelas.tabungan.index', compact('tabungan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = $this->getSiswa();
        return view('wali_kelas.tabungan.tambah', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $siswa = Siswa::where('id', $req->siswa_id)->get();

        TabunganDetail::create([
            'tanggal' => $req->tanggal,
            'jumlah' => $req->jml_tabungan,
            'tabungan_id' => $siswa[0]->tabungan->id,
            'user_id' => auth()->user()->id,
        ]);

        Tabungan::where('siswa_id', $req->siswa_id)->increment('saldo', $req->jml_tabungan);
        // $tabungan->increment('saldo', $req->jml_tabungan);
        // $tabungan->save();
        return redirect()->route('wali.tabungan')->with('berhasil', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tbg = TabunganDetail::find($id);
        $siswa = $this->getSiswa();
        return view('wali_kelas.tabungan.ubah', compact('siswa', 'tbg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $tbg = TabunganDetail::find($id);
        $inc = 0;
        $dec = 0;

        if ($req->jml_tabungan > $tbg->jumlah) {
            $inc = $req->jml_tabungan - $tbg->jumlah;
            Tabungan::where('siswa_id', $tbg->tabungan->siswa_id)->increment('saldo', $inc);
        } else {
            $dec = $tbg->jumlah - $req->jml_tabungan;
            Tabungan::where('siswa_id', $tbg->tabungan->siswa_id)->decrement('saldo', $dec);
        }

        $tbg->tanggal = $req->tanggal;
        $tbg->jumlah = $req->jml_tabungan;
        $tbg->save();
        return redirect()->route('wali.tabungan')->with('berhasil', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        Tabungan::where('siswa_id', $req->siswa_id)->decrement('saldo', $req->jumlah);
        TabunganDetail::where('id', $req->id)->delete();
        return redirect()->route('wali.tabungan')->with('berhasil', 'Data berhasil dihapus!');
    }
}
