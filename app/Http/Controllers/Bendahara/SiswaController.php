<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('bendahara.siswa.index', compact('siswa'));
    }


    public function create()
    {
        $kelas = Kelas::all();
        return view('bendahara.siswa.tambah', compact('kelas'));
    }


    public function store(Request $req)
    {
        try {
            $user = User::create([
                'nama' => $req->nama,
                'username' => $req->username,
                'password' => bcrypt($req->password),
                'level' => 'Siswa',
            ]);

            Siswa::create([
                'nama' => $req->nama,
                'jk' => $req->jk,
                'alamat' => $req->alamat,
                'hp' => $req->hp,
                'nama_wali' => $req->wali,
                'kelas' => $req->kelas,
                'user_id' => $user->id,
            ]);

            return redirect()->route('siswa')->with('berhasil', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('gagal', $e->getMessage());
        }
    }

    public function show($id)
    {
        $kelas = Kelas::all();
        $sw = Siswa::find($id);
        return view('bendahara.siswa.ubah', compact('kelas', 'sw'));
    }

    public function update(Request $req, $id)
    {
        try {

            if (!empty($req->password)) {
                $id = Siswa::find($id);
                User::wher('id', $id->user_id)->update([
                    'password' => $req->password,
                ]);
            }

            Siswa::where('id', $id)->update([
                'nama' => $req->nama,
                'jk' => $req->jk,
                'alamat' => $req->alamat,
                'hp' => $req->hp,
                'nama_wali' => $req->wali,
                'kelas' => $req->kelas,
            ]);

            return redirect()->route('siswa')->with('berhasil', 'Data berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('gagal', $e->getMessage());
        }
    }
}
