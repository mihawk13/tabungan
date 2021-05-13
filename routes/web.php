<?php

use App\Http\Controllers\Bendahara\KelasController;
use App\Http\Controllers\Bendahara\LaporanController;
use App\Http\Controllers\Bendahara\PegawaiController;
use App\Http\Controllers\Bendahara\SaldoController;
use App\Http\Controllers\Bendahara\SiswaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Laporan\PDF_Penarikan;
use App\Http\Controllers\Laporan\PDF_Tabungan;
use App\Http\Controllers\SiswaController as ControllersSiswaController;
use App\Http\Controllers\Wali\PenarikanController;
use App\Http\Controllers\Wali\SaldoWaliController;
use App\Http\Controllers\Wali\TabunganController;
use Illuminate\Support\Facades\Auth;
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
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware(['bendahara', 'auth'])->prefix('bendahara')->group(function () {
    Route::get('pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::post('pegawai', [PegawaiController::class, 'destroy']);
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

    Route::get('tabungan', [HomeController::class, 'tabungan'])->name('tabungan');
    Route::get('penarikan', [HomeController::class, 'penarikan'])->name('penarikan');

    Route::get('saldo', [SaldoController::class, 'saldo'])->name('saldo');
    Route::post('saldo', [SaldoController::class, 'saldo_filter']);

    Route::get('lap.tabungan', [LaporanController::class, 'tabungan'])->name('lap.tabungan');
    Route::post('lap.tabungan', [LaporanController::class, 'tabungan_filter']);
    Route::get('lap.tabungan.cetak/{tglAwal}/{tglAkhir}', [PDF_Tabungan::class, 'pdf'])->name('lap.tabungan.cetak');

    Route::get('lap.penarikan', [LaporanController::class, 'penarikan'])->name('lap.penarikan');
    Route::post('lap.penarikan', [LaporanController::class, 'penarikan_filter']);
    Route::get('lap.penarikan.cetak/{tglAwal}/{tglAkhir}', [PDF_Penarikan::class, 'pdf'])->name('lap.penarikan.cetak');
});

Route::middleware(['walikelas', 'auth'])->prefix('walikelas')->group(function () {
    Route::get('tabungan', [TabunganController::class, 'index'])->name('wali.tabungan');
    Route::post('tabungan', [TabunganController::class, 'destroy']);
    Route::get('tabungan/tambah', [TabunganController::class, 'create'])->name('wali.tabungan.tambah');
    Route::post('tabungan/tambah', [TabunganController::class, 'store']);
    Route::get('tabungan/ubah/{id}', [TabunganController::class, 'show'])->name('wali.tabungan.ubah');
    Route::post('tabungan/ubah/{id}', [TabunganController::class, 'update']);

    Route::get('penarikan', [PenarikanController::class, 'index'])->name('wali.penarikan');
    Route::post('penarikan', [PenarikanController::class, 'destroy']);
    Route::get('penarikan/tambah', [PenarikanController::class, 'create'])->name('wali.penarikan.tambah');
    Route::post('penarikan/tambah', [PenarikanController::class, 'store']);
    Route::get('penarikan/ubah/{id}', [PenarikanController::class, 'show'])->name('wali.penarikan.ubah');
    Route::post('penarikan/ubah/{id}', [PenarikanController::class, 'update']);

    Route::get('saldo', [SaldoWaliController::class, 'saldo'])->name('wali.saldo');
    Route::post('saldo', [SaldoWaliController::class, 'saldo_filter']);
});

Route::middleware(['siswa', 'auth'])->prefix('siswa')->group(function () {
    Route::get('tabungan', [ControllersSiswaController::class, 'tabungan'])->name('siswa.tabungan');
    Route::get('penarikan', [ControllersSiswaController::class, 'penarikan'])->name('siswa.penarikan');
});
