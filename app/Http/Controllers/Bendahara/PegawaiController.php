<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('bendahara.pegawai.index', compact('pegawai'));
    }


    public function create()
    {
        return view('bendahara.pegawai.tambah');
    }


    public function store(Request $req)
    {
        try {
            $user = User::create([
                'nama' => $req->nama,
                'username' => $req->username,
                'password' => bcrypt($req->password),
                'level' => $req->jabatan,
            ]);

            Pegawai::create([
                'nama' => $req->nama,
                'jk' => $req->jk,
                'alamat' => $req->alamat,
                'hp' => $req->hp,
                'user_id' => $user->id,
            ]);

            return redirect()->route('pegawai')->with('berhasil', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('gagal', $e->getMessage());
        }
    }

    public function show($id)
    {
        $pgw = Pegawai::find($id);
        return view('bendahara.pegawai.ubah', compact('pgw'));
    }

    public function update(Request $req, $id)
    {
        try {
            // if (empty($req->password)) {
            //     User::create([
            //         'nama' => $req->nama,
            //         'username' => $req->username,
            //         'password' => $req->password,
            //         'level' => $req->jabatan,
            //     ]);
            // }

            Pegawai::where('id', $id)->update([
                'nama' => $req->nama,
                'jk' => $req->jk,
                'alamat' => $req->alamat,
                'hp' => $req->hp,
            ]);

            return redirect()->route('pegawai')->with('berhasil', 'Data berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('gagal', $e->getMessage());
        }
    }

    public function destroy(Request $req)
    {
        User::where('id', $req->id)->delete();
        Pegawai::where('user_id', $req->id)->delete();
        return redirect()->route('pegawai')->with('berhasil', 'Data pegawai berhasil dihapus!');
    }
}
