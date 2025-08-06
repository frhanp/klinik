<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Import semua controller yang baru dibuat
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DokterController as AdminDokterController;
use App\Http\Controllers\Admin\JadwalController as AdminJadwalController;
use App\Http\Controllers\Admin\PemesananController as AdminPemesananController;
use App\Http\Controllers\Admin\TindakanController as AdminTindakanController;
use App\Http\Controllers\Dokter\DashboardController as DokterDashboardController;
use App\Http\Controllers\Dokter\JadwalController as DokterJadwalController;
use App\Http\Controllers\Dokter\RekamMedisController as DokterRekamMedisController;
use App\Http\Controllers\Admin\PembayaranController as AdminPembayaranController;

use App\Http\Controllers\Pasien\DashboardController as PasienDashboardController;
use App\Http\Controllers\Pasien\PemesananController as PasienPemesananController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama untuk semua pengunjung
Route::get('/', function () {
    return view('welcome');
});

// Route default untuk dashboard setelah login
// Akan diarahkan berdasarkan peran di controller
Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user->peran == 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->peran == 'dokter') {
        return redirect()->route('dokter.dashboard');
    } elseif ($user->peran == 'pasien') {
        return redirect()->route('pasien.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// === GROUP ROUTE UNTUK ADMIN ===
Route::middleware(['auth', 'cekperan:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('dokter', AdminDokterController::class);
    Route::resource('jadwal', AdminJadwalController::class);
    Route::resource('pemesanan', AdminPemesananController::class);
    Route::resource('tindakan', AdminTindakanController::class);
    Route::get('pembayaran/{pemesanan}/cetak', [AdminPembayaranController::class, 'cetak'])->name('pembayaran.cetak');

    Route::get('pembayaran', [AdminPembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('pembayaran/{pemesanan}', [AdminPembayaranController::class, 'show'])->name('pembayaran.show');
    Route::post('pembayaran/{pemesanan}', [AdminPembayaranController::class, 'store'])->name('pembayaran.store');
});


// === GROUP ROUTE UNTUK DOKTER ===
Route::middleware(['auth', 'cekperan:dokter'])->prefix('dokter')->name('dokter.')->group(function () {
    Route::get('dashboard', [DokterDashboardController::class, 'index'])->name('dashboard');
    Route::resource('jadwal', DokterJadwalController::class)->only(['index', 'show']); // Dokter hanya bisa melihat
    Route::resource('rekam-medis', DokterRekamMedisController::class);
});


// === GROUP ROUTE UNTUK PASIEN ===
Route::middleware(['auth', 'cekperan:pasien'])->prefix('pasien')->name('pasien.')->group(function () {
    Route::get('dashboard', [PasienDashboardController::class, 'index'])->name('dashboard');
    Route::resource('pemesanan', PasienPemesananController::class);
    // --- TAMBAHKAN DUA ROUTE DI BAWAH INI ---
    // Route untuk mendapatkan jadwal hari seorang dokter
    Route::get('/get-jadwal-dokter/{dokter}', [PasienPemesananController::class, 'getJadwalDokter'])->name('pemesanan.getJadwalDokter');

    // Route untuk mendapatkan slot waktu yang tersedia pada tanggal tertentu
    Route::get('/get-slot-waktu/{dokter}/{tanggal}', [PasienPemesananController::class, 'getSlotWaktu'])->name('pemesanan.getSlotWaktu');
});


// Route default untuk profil pengguna (semua peran bisa akses)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Meng-include route otentikasi (login, register, dll.)
require __DIR__ . '/auth.php';
