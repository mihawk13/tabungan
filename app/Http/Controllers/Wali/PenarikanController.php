<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Pegawai;
use App\Models\Penarikan;
use App\Models\Tabungan;
use Illuminate\Http\Request;

class PenarikanController extends Controller
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
        $penarikan = Penarikan::where('user_id', auth()->user()->id)->get();
        return view('wali_kelas.penarikan.index', compact('penarikan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wali_kelas.penarikan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $tabungan = Tabungan::where('siswa_id', $req->siswa_id)->get();

        Penarikan::create([
            'tanggal' => $req->tanggal,
            'saldo_awal' => $req->saldo,
            'jml_tarik' => $req->jml_penarikan,
            'tabungan_id' => $tabungan[0]->id,
            'user_id' => auth()->user()->id,
        ]);

        Tabungan::where('siswa_id', $req->siswa_id)->decrement('saldo', $req->jml_penarikan);
        return redirect()->route('wali.penarikan')->with('berhasil', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pnr = Penarikan::find($id);
        return view('wali_kelas.penarikan.ubah', compact('pnr'));
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
        $tbg = Penarikan::find($id);

        Penarikan::where('id', $id)->update([
            'tanggal' => $req->tanggal,
            'jml_tarik' => $req->jml_penarikan,
        ]);

        $inc = 0;
        $dec = 0;

        if ($req->jml_penarikan > $tbg->jml_tarik) {
            $dec = $req->jml_penarikan - $tbg->jml_tarik;
            Tabungan::where('siswa_id', $tbg->tabungan->siswa_id)->decrement('saldo', $dec);
        } else {
            $inc = $tbg->jml_tarik - $req->jml_penarikan;
            Tabungan::where('siswa_id', $tbg->tabungan->siswa_id)->increment('saldo', $inc);
        }

        return redirect()->route('wali.penarikan')->with('berhasil', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        $pnr = Penarikan::find($req->id);
        Tabungan::where('id', $pnr->tabungan_id)->increment('saldo', $pnr->jml_tarik);
        Penarikan::where('id', $req->id)->delete();
        return redirect()->route('wali.penarikan')->with('berhasil', 'Data berhasil dihapus!');
    }
}
