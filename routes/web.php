<?php

use App\Http\Controllers\Bendahara\KelasController;
use App\Http\Controllers\Bendahara\PegawaiController;
use App\Http\Controllers\Bendahara\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['bendahara', 'auth'])->prefix('bendahara')->group(function () {
    Route::get('pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::get('pegawai/tambah', [PegawaiController::class, 'create'])->name('pegawai.tambah');
    Route::post('pegawai/tambah', [PegawaiController::class, 'store']);
    Route::get('pegawai/ubah/{id}', [PegawaiController::class, 'show'])->name('pegawai.ubah');
    Route::post('pegawai/ubah/{id}', [PegawaiController::class, 'update']);

    Route::get('siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::get('siswa/tambah', [SiswaController::class, 'create'])->name('siswa.tambah');
    Route::post('siswa/tambah', [SiswaController::class, 'store']);
    Route::get('siswa/ubah/{id}', [SiswaController::class, 'show'])->name('siswa.ubah');
    Route::post('siswa/ubah/{id}', [SiswaController::class, 'update']);

    Route::get('kelas', [KelasController::class, 'index'])->name('kelas');
    Route::get('kelas/tambah', [KelasController::class, 'create'])->name('kelas.tambah');
    Route::post('kelas/tambah', [KelasController::class, 'store']);
    Route::get('kelas/ubah/{id}', [KelasController::class, 'show'])->name('kelas.ubah');
    Route::post('kelas/ubah/{id}', [KelasController::class, 'update']);

    // Route::get('tunjangan', [TunjanganController::class, 'index'])->name('tunjangan');
    // Route::get('tunjangan/tambah', [TunjanganController::class, 'create'])->name('tunjangan.tambah');
    // Route::post('tunjangan/tambah', [TunjanganController::class, 'store']);
    // Route::get('tunjangan/ubah/{id}', [TunjanganController::class, 'show'])->name('tunjangan.ubah');
    // Route::post('tunjangan/ubah/{id}', [TunjanganController::class, 'update']);

    // Route::get('potongan', [PotonganController::class, 'index'])->name('potongan');
    // Route::get('potongan/tambah', [PotonganController::class, 'create'])->name('potongan.tambah');
    // Route::post('potongan/tambah', [PotonganController::class, 'store']);
    // Route::get('potongan/ubah/{id}', [PotonganController::class, 'show'])->name('potongan.ubah');
    // Route::post('potongan/ubah/{id}', [PotonganController::class, 'update']);

    // Route::get('absensi', [AbsensiController::class, 'index'])->name('absensi');
    // Route::get('absensi/tambah', [AbsensiController::class, 'create'])->name('absensi.tambah');
    // Route::post('absensi/tambah', [AbsensiController::class, 'store']);

    // Route::get('cuti', [CutiController::class, 'index'])->name('cuti');
    // Route::post('cuti', [CutiController::class, 'lihat']);
    // Route::get('cuti/detail/{id}', [CutiController::class, 'show'])->name('cuti.detail');

    // Route::get('masa-kerja', [MasaKerjaController::class, 'index'])->name('masa_kerja');

    // Route::get('gaji', [GajiController::class, 'index'])->name('gaji');
    // Route::get('gaji/tambah', [GajiController::class, 'create'])->name('gaji.tambah');
    // Route::post('gaji/tambah', [GajiController::class, 'store']);
    // Route::get('gaji/ubah/{id}', [GajiController::class, 'show'])->name('gaji.ubah');
    // Route::post('gaji/ubah/{id}', [GajiController::class, 'update']);

    // Route::get('laporan-gaji', [LaporanController::class, 'gaji'])->name('lap.gaji');
    // Route::post('laporan-gaji', [LaporanController::class, 'postGaji']);
    // Route::get('laporan-gaji/{tahun}/{bulan}', [PDF_Gaji::class, 'pdf'])->name('lap.gaji.cetak');

    // Route::get('laporan-cuti', [LaporanController::class, 'cuti'])->name('lap.cuti');
    // Route::post('laporan-cuti', [LaporanController::class, 'postCuti']);
    // Route::get('pdf-cuti/{tahun}', [PDF_Cuti::class, 'pdf'])->name('lap.cuti.cetak');

    // Route::get('laporan-lembur', [LaporanController::class, 'lembur'])->name('lap.lembur');
    // Route::post('laporan-lembur', [LaporanController::class, 'postLembur']);
    // Route::get('laporan-lembur/{tahun}/{periode}', [PDF_Lembur::class, 'pdf'])->name('lap.lembur.cetak');

    // Route::get('laporan-keterlambatan', [LaporanController::class, 'keterlambatan'])->name('lap.keterlambatan');
    // Route::post('laporan-keterlambatan', [LaporanController::class, 'postKeterlambatan']);
    // Route::get('laporan-keterlambatan/{tahun}/{periode}', [PDF_Keterlambatan::class, 'pdf'])->name('lap.terlambat.cetak');

});
