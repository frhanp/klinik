# Project Digest (Full Content)
_Generated: 2025-11-01 13:07:33_
**Root:** D:\Laragon\www\klinik


## Struktur Proyek (filtered, no depth limit)
```
.git
app
bootstrap
config
database
node_modules
public
resources
routes
storage
tests
vendor
.editorconfig
.env
.env.example
.gitattributes
.gitignore
artisan
composer.json
composer.lock
digest.ps1
package-lock.json
package.json
phpunit.xml
postcss.config.js
project_digest_full.md
README.md
routes.txt
structure.txt
tailwind.config.js
vite.config.js
app\Http
app\Imports
app\Models
app\Providers
app\View
app\Http\Controllers
app\Http\Middleware
app\Http\Requests
app\Http\Controllers\Admin
app\Http\Controllers\Auth
app\Http\Controllers\Dokter
app\Http\Controllers\Pasien
app\Http\Controllers\Controller.php
app\Http\Controllers\ProfileController.php
app\Http\Controllers\Admin\DashboardController.php
app\Http\Controllers\Admin\DokterController.php
app\Http\Controllers\Admin\JadwalController.php
app\Http\Controllers\Admin\LaporanController.php
app\Http\Controllers\Admin\ObatController.php
app\Http\Controllers\Admin\PasienController.php
app\Http\Controllers\Admin\PembayaranController.php
app\Http\Controllers\Admin\PemesananController.php
app\Http\Controllers\Admin\TindakanController.php
app\Http\Controllers\Auth\AuthenticatedSessionController.php
app\Http\Controllers\Auth\ConfirmablePasswordController.php
app\Http\Controllers\Auth\EmailVerificationNotificationController.php
app\Http\Controllers\Auth\EmailVerificationPromptController.php
app\Http\Controllers\Auth\NewPasswordController.php
app\Http\Controllers\Auth\PasswordController.php
app\Http\Controllers\Auth\PasswordResetLinkController.php
app\Http\Controllers\Auth\RegisteredUserController.php
app\Http\Controllers\Auth\VerifyEmailController.php
app\Http\Controllers\Dokter\DashboardController.php
app\Http\Controllers\Dokter\JadwalController.php
app\Http\Controllers\Dokter\RekamMedisController.php
app\Http\Controllers\Pasien\DashboardController.php
app\Http\Controllers\Pasien\PemesananController.php
app\Http\Middleware\CekPeran.php
app\Http\Requests\Auth
app\Http\Requests\ProfileUpdateRequest.php
app\Http\Requests\Auth\LoginRequest.php
app\Imports\ObatImport.php
app\Imports\TindakanImport.php
app\Models\BiodataPasien.php
app\Models\DaftarTindakan.php
app\Models\Dokter.php
app\Models\FotoRekamMedis.php
app\Models\Jadwal.php
app\Models\Obat.php
app\Models\Pembayaran.php
app\Models\Pemesanan.php
app\Models\RekamMedis.php
app\Models\Resep.php
app\Models\Tindakan.php
app\Models\User.php
app\Providers\AppServiceProvider.php
app\View\Components
app\View\Components\AppLayout.php
app\View\Components\GuestLayout.php
bootstrap\cache
bootstrap\app.php
bootstrap\providers.php
bootstrap\cache\packages.php
bootstrap\cache\services.php
config\app.php
config\auth.php
config\cache.php
config\captcha.php
config\database.php
config\filesystems.php
config\logging.php
config\mail.php
config\queue.php
config\services.php
config\session.php
database\factories
database\migrations
database\seeders
database\.gitignore
database\factories\UserFactory.php
database\migrations\0001_01_01_000000_create_users_table.php
database\migrations\0001_01_01_000001_create_cache_table.php
database\migrations\0001_01_01_000002_create_jobs_table.php
database\migrations\2025_07_09_014252_tambah_kolom_peran_ke_tabel_pengguna.php
database\migrations\2025_07_09_014441_buat_tabel_dokter.php
database\migrations\2025_07_09_014514_buat_tabel_jadwal.php
database\migrations\2025_07_09_014536_buat_tabel_pemesanan.php
database\migrations\2025_07_09_014555_buat_tabel_rekam_medis.php
database\migrations\2025_07_09_014620_buat_tabel_resep_dan_foto.php
database\migrations\2025_08_04_220850_buat_tabel_tindakan_dan_pembayaran.php
database\migrations\2025_08_04_225320_buat_tabel_resep_dan_foto.php
database\migrations\2025_08_09_211458_buat_tabel_pivot_pemesanan_tindakan.php
database\migrations\2025_08_09_233426_buat_tabel_obat.php
database\migrations\2025_08_18_132946_buat_tabel_biodata_pasien.php
database\migrations\2025_08_22_172827_hapus_tabel_biodata_pasien.php
database\migrations\2025_08_22_180149_buat_tabel_biodata_sederhana_dan_tambah_status_ke_pemesanan.php
database\migrations\2025_08_29_234320_tambah_catatan_admin_ke_pemesanan.php
database\migrations\2025_08_30_160717_tambah_detail_harga_dan_kemasan_ke_obat.php
database\migrations\2025_08_30_161019_hubungkan_resep_dengan_obat.php
database\migrations\2025_08_30_182435_tambah_harga_saat_resep_ke_resep.php
database\migrations\2025_09_02_180326_create_daftar_tindakans_table.php
database\migrations\2025_09_02_180434_ubah_struktur_tabel_tindakan.php
database\migrations\2025_09_02_191228_hapus_kolom_satuan_dari_obat.php
database\migrations\2025_10_01_232639_tambah_kolom_potongan_ke_tabel_pembayaran.php
database\migrations\2025_10_11_093935_tambah_kolom_nomor_bpjs_ke_tabel_pemesanan.php
database\migrations\2025_10_22_133136_tambah_field_lengkap_termasuk_umur_ke_biodata_pasien.php
database\seeders\DatabaseSeeder.php
database\seeders\DokterSeeder.php
database\seeders\JadwalSeeder.php
database\seeders\ObatSeeder.php
database\seeders\PenggunaSeeder.php
database\seeders\TindakanSeeder.php
public\build
public\images
public\storage
public\.htaccess
public\favicon.ico
public\hot
public\index.php
public\robots.txt
public\images\deli.jpeg
public\images\logodeliyana.png
resources\css
resources\js
resources\views
resources\css\app.css
resources\js\app.js
resources\js\bootstrap.js
resources\views\admin
resources\views\auth
resources\views\components
resources\views\dokter
resources\views\layouts
resources\views\pasien
resources\views\profile
resources\views\dashboard.blade.php
resources\views\welcome.blade.php
resources\views\admin\dokter
resources\views\admin\jadwal
resources\views\admin\laporan
resources\views\admin\obat
resources\views\admin\pasien
resources\views\admin\pembayaran
resources\views\admin\pemesanan
resources\views\admin\tindakan
resources\views\admin\dashboard.blade.php
resources\views\admin\dokter\create.blade.php
resources\views\admin\dokter\edit.blade.php
resources\views\admin\dokter\index.blade.php
resources\views\admin\jadwal\create.blade.php
resources\views\admin\jadwal\edit.blade.php
resources\views\admin\jadwal\generate.blade.php
resources\views\admin\jadwal\index.blade.php
resources\views\admin\jadwal\show.blade.php
resources\views\admin\laporan\cetak.blade.php
resources\views\admin\laporan\index.blade.php
resources\views\admin\obat\create.blade.php
resources\views\admin\obat\edit.blade.php
resources\views\admin\obat\index.blade.php
resources\views\admin\pasien\create.blade.php
resources\views\admin\pasien\edit.blade.php
resources\views\admin\pasien\index.blade.php
resources\views\admin\pasien\show.blade.php
resources\views\admin\pembayaran\cetak.blade.php
resources\views\admin\pembayaran\index.blade.php
resources\views\admin\pembayaran\show.blade.php
resources\views\admin\pemesanan\create.blade.php
resources\views\admin\pemesanan\edit.blade.php
resources\views\admin\pemesanan\index.blade.php
resources\views\admin\tindakan\create.blade.php
resources\views\admin\tindakan\edit.blade.php
resources\views\admin\tindakan\index.blade.php
resources\views\auth\confirm-password.blade.php
resources\views\auth\forgot-password.blade.php
resources\views\auth\login.blade.php
resources\views\auth\register.blade.php
resources\views\auth\reset-password.blade.php
resources\views\auth\verify-email.blade.php
resources\views\components\application-logo.blade.php
resources\views\components\auth-session-status.blade.php
resources\views\components\danger-button.blade.php
resources\views\components\dropdown-link.blade.php
resources\views\components\dropdown.blade.php
resources\views\components\input-error.blade.php
resources\views\components\input-label.blade.php
resources\views\components\modal.blade.php
resources\views\components\nav-link.blade.php
resources\views\components\notification.blade.php
resources\views\components\primary-button.blade.php
resources\views\components\print-layout.blade.php
resources\views\components\responsive-nav-link.blade.php
resources\views\components\secondary-button.blade.php
resources\views\components\text-input.blade.php
resources\views\dokter\jadwal
resources\views\dokter\rekam-medis
resources\views\dokter\dashboard.blade.php
resources\views\dokter\jadwal\index.blade.php
resources\views\dokter\rekam-medis\create.blade.php
resources\views\dokter\rekam-medis\index.blade.php
resources\views\dokter\rekam-medis\pasien.blade.php
resources\views\dokter\rekam-medis\show.blade.php
resources\views\layouts\app.blade.php
resources\views\layouts\guest.blade.php
resources\views\layouts\navigation.blade.php
resources\views\pasien\pemesanan
resources\views\pasien\rekam-medis
resources\views\pasien\dashboard.blade.php
resources\views\pasien\pemesanan\create.blade.php
resources\views\pasien\pemesanan\index.blade.php
resources\views\pasien\rekam-medis\show.blade.php
resources\views\profile\partials
resources\views\profile\edit.blade.php
resources\views\profile\partials\delete-user-form.blade.php
resources\views\profile\partials\update-password-form.blade.php
resources\views\profile\partials\update-profile-information-form.blade.php
routes\auth.php
routes\console.php
routes\web.php
storage\app
storage\debugbar
storage\framework
storage\logs
storage\app\private
storage\app\public
storage\app\.gitignore
storage\app\data_obat.xlsx
storage\app\data_tindakan.xlsx
storage\app\private\public
storage\app\private\.gitignore
storage\app\private\public\foto-rekam-medis
storage\app\private\public\foto-rekam-medis\FrH2SZ9445VmIL8m9Ni76KxC5RB17xWUM0pfGcJO.jpg
storage\app\public\foto-rekam-medis
storage\app\public\.gitignore
storage\app\public\foto-rekam-medis\rX2xANEm64vgLCPsgxbqunEkxXzSVC51fTiP4ljT.jpg
storage\framework\cache
storage\framework\sessions
storage\framework\testing
storage\framework\views
storage\framework\.gitignore
storage\framework\cache\data
storage\framework\cache\laravel-excel
storage\framework\cache\.gitignore
storage\framework\cache\data\.gitignore
storage\framework\sessions\.gitignore
storage\framework\testing\.gitignore
storage\framework\views\.gitignore
storage\framework\views\059c55a96ee3c6dae65a022354ffc036.php
storage\framework\views\0a303c72d761a68921594a49713d4510.php
storage\framework\views\0afe6ab13daf12a6674687a76eddc1b2.php
storage\framework\views\1846ad195a36ec593251411dc8172134.php
storage\framework\views\1a89655d329c7963e3aac340c661d4eb.php
storage\framework\views\1e837dfe9fa57a9b4c37dae5b1a3f0b5.php
storage\framework\views\26019b94edbe1c23ccddae68839d38e0.php
storage\framework\views\323e0d4cb6aa3a79df371502459f3f95.php
storage\framework\views\34a28d1c5975e6a80cf8e90545c1042d.php
storage\framework\views\35b948da9e966c78a172e74616518c9c.php
storage\framework\views\391ebb746ed9d90abf51620fa811007f.php
storage\framework\views\3f78f7c3950888e24e17f0f2153164ba.php
storage\framework\views\3f97fad1046eebed23dea96fef8be649.php
storage\framework\views\3fe124fd1ab53367f3db7d5c4f61a949.php
storage\framework\views\4093f5cd207932011562c32ddaa82537.php
storage\framework\views\5c2a7c738b827bf614a05d851f279e56.php
storage\framework\views\5c569f0a687a604dd7f3a8d4447910a2.php
storage\framework\views\5e818641b234edb8405df092be320eea.php
storage\framework\views\655d3f3e826a7a4d5fe83a14ac6cb4d3.php
storage\framework\views\662ec6b9fc235e3b098c2320dafe372c.php
storage\framework\views\6a717951ad3990d989a07e05d1f1e765.php
storage\framework\views\6f99de5660a2ce6fcab43b45591e19aa.php
storage\framework\views\6fb1e90d4a4d0f72868fca0b625fbb93.php
storage\framework\views\738743497017023635a44cfb07348ef6.php
storage\framework\views\792564f6be86d5ac31086322eb7293c8.php
storage\framework\views\7b402872e29f6f895b12d3671d0adb35.php
storage\framework\views\8a67838763e8a04e278800e4d370ef93.php
storage\framework\views\8d75112a3f71eab1be73b5746a8b6e9d.php
storage\framework\views\9a480b0fba443393c56b5664d5a8cb00.php
storage\framework\views\9fdd7ca1bc4d6f5af47fddae768463e6.php
storage\framework\views\a47da49129c2ec197d8718d23247af49.php
storage\framework\views\a739b139d9f5f171daeeaf3b81c8dad1.php
storage\framework\views\b15c1c717568cd4fb1c9fbc2e3cea052.php
storage\framework\views\b280f2904c5bff00cc744a575a706c5f.php
storage\framework\views\b7c48775358bf8612429412cdf309287.php
storage\framework\views\bd5da35130d7a2f0bc7e7ad7110a9e0b.php
storage\framework\views\bebbcc12d82febc3d9d74e01e7ce326d.php
storage\framework\views\c957773180b2d2287705b897b60f75a9.php
storage\framework\views\cb1fba32553bf47107a2240b7da65c66.php
storage\framework\views\cd0cd98ac51fd3bfeeea9827aaad4bdf.php
storage\framework\views\da53ee5125379d964aa803207bdcf2b3.php
storage\framework\views\e4230712cc46b6a4b60cb1d2adcdf49b.php
storage\framework\views\f6939232881a5a3e95e1217e1623e78d.php
storage\framework\views\f6c972f146e7ba607cb449d9433fa422.php
storage\framework\views\fdf72d7c0e0e65d6cdbbb3d8b5f7121b.php
storage\framework\views\ff9e50544edecda8603349ef7c792734.php
tests\Feature
tests\Unit
tests\TestCase.php
tests\Feature\Auth
tests\Feature\ExampleTest.php
tests\Feature\ProfileTest.php
tests\Feature\Auth\AuthenticationTest.php
tests\Feature\Auth\EmailVerificationTest.php
tests\Feature\Auth\PasswordConfirmationTest.php
tests\Feature\Auth\PasswordResetTest.php
tests\Feature\Auth\PasswordUpdateTest.php
tests\Feature\Auth\RegistrationTest.php
tests\Unit\ExampleTest.php
```


## Info Git
```
Remote:
origin	https://github.com/frhanp/klinik.git (fetch)
origin	https://github.com/frhanp/klinik.git (push)

Branch:
main

Last 5 commits:
2dcd74a ubah kata jadi layanan yang di inginkan
efc257f tambah grafik
85ed5c3 add detail dan status dari biodata
74105ed admin bisa mesan
00dd38c add biodata lengkap
```


## Dependencies (summary)
```
composer.json (require):
  (parse error / none)
composer.json (require-dev):
  (parse error / none)

package.json (dependencies):
  (parse error / none)
package.json (devDependencies):
  (parse error / none)
```


## Routes Files Content
```
===== routes\auth.php =====
<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

===== routes\console.php =====
<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

===== routes\web.php =====
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
use App\Http\Controllers\Admin\LaporanController as AdminLaporanController;
use App\Http\Controllers\Admin\ObatController as AdminObatController;
use App\Http\Controllers\Admin\PasienController as AdminPasienController;
use App\Http\Controllers\Admin\LaporanController as LaporanController;
use App\Http\Controllers\Pasien\BiodataController as PasienBiodataController;
use App\Http\Controllers\Admin\JadwalController as JadwalController;


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
    Route::get('jadwal/dokter/{dokter}', [AdminJadwalController::class, 'show'])->name('jadwal.show');
    Route::resource('jadwal', AdminJadwalController::class)->except(['show']);
    Route::resource('pemesanan', AdminPemesananController::class);
    Route::resource('tindakan', AdminTindakanController::class);
    Route::get('pembayaran/{pemesanan}/cetak', [AdminPembayaranController::class, 'cetak'])->name('pembayaran.cetak');
    Route::get('laporan', [AdminLaporanController::class, 'index'])->name('laporan.index'); 
    Route::get('pembayaran', [AdminPembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('pembayaran/{pemesanan}', [AdminPembayaranController::class, 'show'])->name('pembayaran.show');
    Route::post('pembayaran/{pemesanan}', [AdminPembayaranController::class, 'store'])->name('pembayaran.store');
    Route::resource('obat', AdminObatController::class);
    Route::get('jadwal-generate', [JadwalController::class, 'createMultiple'])->name('jadwal.generate');
    Route::post('jadwal-generate', [JadwalController::class, 'storeMultiple'])->name('jadwal.storeMultiple');

    Route::resource('pasien', AdminPasienController::class)->except(['destroy']);
    Route::get('laporan/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');

    Route::get('/get-slot-waktu/{dokter}/{tanggal}', [AdminPemesananController::class, 'getSlotWaktuAdmin'])->name('pemesanan.getSlotWaktuAdmin');
});


// === GROUP ROUTE UNTUK DOKTER ===
Route::middleware(['auth', 'cekperan:dokter'])->prefix('dokter')->name('dokter.')->group(function () {
    Route::get('dashboard', [DokterDashboardController::class, 'index'])->name('dashboard');
    Route::resource('jadwal', DokterJadwalController::class)->only(['index', 'show']); // Dokter hanya bisa melihat
    Route::resource('rekam-medis', DokterRekamMedisController::class);
    Route::get('rekam-medis/pasien/{pasien}', [DokterRekamMedisController::class, 'showByPasien'])
            ->name('rekam-medis.pasien');
    
});


// === GROUP ROUTE UNTUK PASIEN ===
Route::middleware(['auth', 'cekperan:pasien'])->prefix('pasien')->name('pasien.')->group(function () {
    Route::get('dashboard', [PasienDashboardController::class, 'index'])->name('dashboard');
    Route::resource('pemesanan', PasienPemesananController::class);
    Route::get('rekam-medis/{rekamMedis}', [PasienPemesananController::class, 'showRekamMedis'])->name('rekamMedis.show');
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

```


## Routes (from command)
```

  GET|HEAD        / .......................................................................................................... 
  GET|HEAD        _debugbar/assets/javascript .................... debugbar.assets.js ΓÇ║ Barryvdh\Debugbar ΓÇ║ AssetController@js
  GET|HEAD        _debugbar/assets/stylesheets ................. debugbar.assets.css ΓÇ║ Barryvdh\Debugbar ΓÇ║ AssetController@css
  DELETE          _debugbar/cache/{key}/{tags?} ........... debugbar.cache.delete ΓÇ║ Barryvdh\Debugbar ΓÇ║ CacheController@delete
  GET|HEAD        _debugbar/clockwork/{id} .......... debugbar.clockwork ΓÇ║ Barryvdh\Debugbar ΓÇ║ OpenHandlerController@clockwork
  GET|HEAD        _debugbar/open ..................... debugbar.openhandler ΓÇ║ Barryvdh\Debugbar ΓÇ║ OpenHandlerController@handle
  POST            _debugbar/queries/explain ......... debugbar.queries.explain ΓÇ║ Barryvdh\Debugbar ΓÇ║ QueriesController@explain
  GET|HEAD        admin/dashboard .......................................... admin.dashboard ΓÇ║ Admin\DashboardController@index
  GET|HEAD        admin/dokter ............................................. admin.dokter.index ΓÇ║ Admin\DokterController@index
  POST            admin/dokter ............................................. admin.dokter.store ΓÇ║ Admin\DokterController@store
  GET|HEAD        admin/dokter/create .................................... admin.dokter.create ΓÇ║ Admin\DokterController@create
  GET|HEAD        admin/dokter/{dokter} ...................................... admin.dokter.show ΓÇ║ Admin\DokterController@show
  PUT|PATCH       admin/dokter/{dokter} .................................. admin.dokter.update ΓÇ║ Admin\DokterController@update
  DELETE          admin/dokter/{dokter} ................................ admin.dokter.destroy ΓÇ║ Admin\DokterController@destroy
  GET|HEAD        admin/dokter/{dokter}/edit ................................. admin.dokter.edit ΓÇ║ Admin\DokterController@edit
  GET|HEAD        admin/get-slot-waktu/{dokter}/{tanggal} admin.pemesanan.getSlotWaktuAdmin ΓÇ║ Admin\PemesananController@getSlΓÇª
  GET|HEAD        admin/jadwal ............................................. admin.jadwal.index ΓÇ║ Admin\JadwalController@index
  POST            admin/jadwal ............................................. admin.jadwal.store ΓÇ║ Admin\JadwalController@store
  GET|HEAD        admin/jadwal-generate ........................ admin.jadwal.generate ΓÇ║ Admin\JadwalController@createMultiple
  POST            admin/jadwal-generate .................... admin.jadwal.storeMultiple ΓÇ║ Admin\JadwalController@storeMultiple
  GET|HEAD        admin/jadwal/create .................................... admin.jadwal.create ΓÇ║ Admin\JadwalController@create
  GET|HEAD        admin/jadwal/dokter/{dokter} ............................... admin.jadwal.show ΓÇ║ Admin\JadwalController@show
  PUT|PATCH       admin/jadwal/{jadwal} .................................. admin.jadwal.update ΓÇ║ Admin\JadwalController@update
  DELETE          admin/jadwal/{jadwal} ................................ admin.jadwal.destroy ΓÇ║ Admin\JadwalController@destroy
  GET|HEAD        admin/jadwal/{jadwal}/edit ................................. admin.jadwal.edit ΓÇ║ Admin\JadwalController@edit
  GET|HEAD        admin/laporan .......................................... admin.laporan.index ΓÇ║ Admin\LaporanController@index
  GET|HEAD        admin/laporan/cetak .................................... admin.laporan.cetak ΓÇ║ Admin\LaporanController@cetak
  GET|HEAD        admin/obat ................................................... admin.obat.index ΓÇ║ Admin\ObatController@index
  POST            admin/obat ................................................... admin.obat.store ΓÇ║ Admin\ObatController@store
  GET|HEAD        admin/obat/create .......................................... admin.obat.create ΓÇ║ Admin\ObatController@create
  GET|HEAD        admin/obat/{obat} .............................................. admin.obat.show ΓÇ║ Admin\ObatController@show
  PUT|PATCH       admin/obat/{obat} .......................................... admin.obat.update ΓÇ║ Admin\ObatController@update
  DELETE          admin/obat/{obat} ........................................ admin.obat.destroy ΓÇ║ Admin\ObatController@destroy
  GET|HEAD        admin/obat/{obat}/edit ......................................... admin.obat.edit ΓÇ║ Admin\ObatController@edit
  GET|HEAD        admin/pasien ............................................. admin.pasien.index ΓÇ║ Admin\PasienController@index
  POST            admin/pasien ............................................. admin.pasien.store ΓÇ║ Admin\PasienController@store
  GET|HEAD        admin/pasien/create .................................... admin.pasien.create ΓÇ║ Admin\PasienController@create
  GET|HEAD        admin/pasien/{pasien} ...................................... admin.pasien.show ΓÇ║ Admin\PasienController@show
  PUT|PATCH       admin/pasien/{pasien} .................................. admin.pasien.update ΓÇ║ Admin\PasienController@update
  GET|HEAD        admin/pasien/{pasien}/edit ................................. admin.pasien.edit ΓÇ║ Admin\PasienController@edit
  GET|HEAD        admin/pembayaran ................................. admin.pembayaran.index ΓÇ║ Admin\PembayaranController@index
  GET|HEAD        admin/pembayaran/{pemesanan} ....................... admin.pembayaran.show ΓÇ║ Admin\PembayaranController@show
  POST            admin/pembayaran/{pemesanan} ..................... admin.pembayaran.store ΓÇ║ Admin\PembayaranController@store
  GET|HEAD        admin/pembayaran/{pemesanan}/cetak ............... admin.pembayaran.cetak ΓÇ║ Admin\PembayaranController@cetak
  GET|HEAD        admin/pemesanan .................................... admin.pemesanan.index ΓÇ║ Admin\PemesananController@index
  POST            admin/pemesanan .................................... admin.pemesanan.store ΓÇ║ Admin\PemesananController@store
  GET|HEAD        admin/pemesanan/create ........................... admin.pemesanan.create ΓÇ║ Admin\PemesananController@create
  GET|HEAD        admin/pemesanan/{pemesanan} .......................... admin.pemesanan.show ΓÇ║ Admin\PemesananController@show
  PUT|PATCH       admin/pemesanan/{pemesanan} ...................... admin.pemesanan.update ΓÇ║ Admin\PemesananController@update
  DELETE          admin/pemesanan/{pemesanan} .................... admin.pemesanan.destroy ΓÇ║ Admin\PemesananController@destroy
  GET|HEAD        admin/pemesanan/{pemesanan}/edit ..................... admin.pemesanan.edit ΓÇ║ Admin\PemesananController@edit
  GET|HEAD        admin/tindakan ....................................... admin.tindakan.index ΓÇ║ Admin\TindakanController@index
  POST            admin/tindakan ....................................... admin.tindakan.store ΓÇ║ Admin\TindakanController@store
  GET|HEAD        admin/tindakan/create .............................. admin.tindakan.create ΓÇ║ Admin\TindakanController@create
  GET|HEAD        admin/tindakan/{tindakan} .............................. admin.tindakan.show ΓÇ║ Admin\TindakanController@show
  PUT|PATCH       admin/tindakan/{tindakan} .......................... admin.tindakan.update ΓÇ║ Admin\TindakanController@update
  DELETE          admin/tindakan/{tindakan} ........................ admin.tindakan.destroy ΓÇ║ Admin\TindakanController@destroy
  GET|HEAD        admin/tindakan/{tindakan}/edit ......................... admin.tindakan.edit ΓÇ║ Admin\TindakanController@edit
  GET|HEAD        captcha/api/{config?} ....................................... Mews\Captcha ΓÇ║ CaptchaController@getCaptchaApi
  GET|HEAD        captcha/{config?} .............................................. Mews\Captcha ΓÇ║ CaptchaController@getCaptcha
  GET|HEAD        confirm-password ................................ password.confirm ΓÇ║ Auth\ConfirmablePasswordController@show
  POST            confirm-password .................................................. Auth\ConfirmablePasswordController@store
  GET|HEAD        dashboard ........................................................................................ dashboard
  GET|HEAD        dokter/dashboard ....................................... dokter.dashboard ΓÇ║ Dokter\DashboardController@index
  GET|HEAD        dokter/jadwal .......................................... dokter.jadwal.index ΓÇ║ Dokter\JadwalController@index
  GET|HEAD        dokter/jadwal/{jadwal} ................................... dokter.jadwal.show ΓÇ║ Dokter\JadwalController@show
  GET|HEAD        dokter/rekam-medis ............................ dokter.rekam-medis.index ΓÇ║ Dokter\RekamMedisController@index
  POST            dokter/rekam-medis ............................ dokter.rekam-medis.store ΓÇ║ Dokter\RekamMedisController@store
  GET|HEAD        dokter/rekam-medis/create ................... dokter.rekam-medis.create ΓÇ║ Dokter\RekamMedisController@create
  GET|HEAD        dokter/rekam-medis/pasien/{pasien} .... dokter.rekam-medis.pasien ΓÇ║ Dokter\RekamMedisController@showByPasien
  GET|HEAD        dokter/rekam-medis/{rekam_medi} ................. dokter.rekam-medis.show ΓÇ║ Dokter\RekamMedisController@show
  PUT|PATCH       dokter/rekam-medis/{rekam_medi} ............. dokter.rekam-medis.update ΓÇ║ Dokter\RekamMedisController@update
  DELETE          dokter/rekam-medis/{rekam_medi} ........... dokter.rekam-medis.destroy ΓÇ║ Dokter\RekamMedisController@destroy
  GET|HEAD        dokter/rekam-medis/{rekam_medi}/edit ............ dokter.rekam-medis.edit ΓÇ║ Dokter\RekamMedisController@edit
  POST            email/verification-notification ..... verification.send ΓÇ║ Auth\EmailVerificationNotificationController@store
  GET|HEAD        forgot-password ................................. password.request ΓÇ║ Auth\PasswordResetLinkController@create
  POST            forgot-password .................................... password.email ΓÇ║ Auth\PasswordResetLinkController@store
  GET|HEAD        login ................................................... login ΓÇ║ Auth\AuthenticatedSessionController@create
  POST            login ............................................................ Auth\AuthenticatedSessionController@store
  POST            logout ................................................ logout ΓÇ║ Auth\AuthenticatedSessionController@destroy
  GET|HEAD        pasien/dashboard ....................................... pasien.dashboard ΓÇ║ Pasien\DashboardController@index
  GET|HEAD        pasien/get-jadwal-dokter/{dokter} pasien.pemesanan.getJadwalDokter ΓÇ║ Pasien\PemesananController@getJadwalDoΓÇª
  GET|HEAD        pasien/get-slot-waktu/{dokter}/{tanggal} pasien.pemesanan.getSlotWaktu ΓÇ║ Pasien\PemesananController@getSlotΓÇª
  GET|HEAD        pasien/pemesanan ................................. pasien.pemesanan.index ΓÇ║ Pasien\PemesananController@index
  POST            pasien/pemesanan ................................. pasien.pemesanan.store ΓÇ║ Pasien\PemesananController@store
  GET|HEAD        pasien/pemesanan/create ........................ pasien.pemesanan.create ΓÇ║ Pasien\PemesananController@create
  GET|HEAD        pasien/pemesanan/{pemesanan} ....................... pasien.pemesanan.show ΓÇ║ Pasien\PemesananController@show
  PUT|PATCH       pasien/pemesanan/{pemesanan} ................... pasien.pemesanan.update ΓÇ║ Pasien\PemesananController@update
  DELETE          pasien/pemesanan/{pemesanan} ................. pasien.pemesanan.destroy ΓÇ║ Pasien\PemesananController@destroy
  GET|HEAD        pasien/pemesanan/{pemesanan}/edit .................. pasien.pemesanan.edit ΓÇ║ Pasien\PemesananController@edit
  GET|HEAD        pasien/rekam-medis/{rekamMedis} ......... pasien.rekamMedis.show ΓÇ║ Pasien\PemesananController@showRekamMedis
  PUT             password .................................................. password.update ΓÇ║ Auth\PasswordController@update
  GET|HEAD        profile .............................................................. profile.edit ΓÇ║ ProfileController@edit
  PATCH           profile .......................................................... profile.update ΓÇ║ ProfileController@update
  DELETE          profile ........................................................ profile.destroy ΓÇ║ ProfileController@destroy
  GET|HEAD        register ................................................... register ΓÇ║ Auth\RegisteredUserController@create
  POST            register ............................................................... Auth\RegisteredUserController@store
  POST            reset-password ........................................... password.store ΓÇ║ Auth\NewPasswordController@store
  GET|HEAD        reset-password/{token} .................................. password.reset ΓÇ║ Auth\NewPasswordController@create
  GET|HEAD        storage/{path} ............................................................................... storage.local
  GET|HEAD        up ......................................................................................................... 
  GET|HEAD        verify-email .................................. verification.notice ΓÇ║ Auth\EmailVerificationPromptController
  GET|HEAD        verify-email/{id}/{hash} .................................. verification.verify ΓÇ║ Auth\VerifyEmailController

                                                                                                          Showing [103] routes

```


## Controllers Content
```
===== app\Http\Controllers\Admin\DashboardController.php =====
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dokter;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\BiodataPasien;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPasien = User::where('peran', 'pasien')->count();
        $jumlahDokter = Dokter::count();
        $pemesananHariIni = Pemesanan::whereDate('tanggal_pesan', today())->count();

        // Query untuk data chart pendapatan 6 bulan terakhir
        $pendapatanPerBulan = Pembayaran::select(
                DB::raw('SUM(total_biaya) as total'),
                DB::raw("DATE_FORMAT(tanggal_bayar, '%Y-%m') as bulan")
            )
            ->where('status', 'Lunas')
            ->where('tanggal_bayar', '>=', Carbon::now()->subMonths(5)->startOfMonth())
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();
        
        // Format data untuk Chart.js
        $labels = $pendapatanPerBulan->pluck('bulan')->map(function($bulan) {
            return Carbon::createFromFormat('Y-m', $bulan)->translatedFormat('F Y');
        });
        $data = $pendapatanPerBulan->pluck('total');

        $tindakanPopuler = DB::table('rekam_medis_tindakan')
            ->join('tindakan', 'rekam_medis_tindakan.tindakan_id', '=', 'tindakan.id')
            ->select('tindakan.keterangan', DB::raw('count(rekam_medis_tindakan.tindakan_id) as jumlah'))
            ->groupBy('tindakan.keterangan')
            ->orderBy('jumlah', 'desc')
            ->limit(5)
            ->get();
        $tindakanLabels = $tindakanPopuler->pluck('keterangan');
        $tindakanData = $tindakanPopuler->pluck('jumlah');


        $statusPasienData = BiodataPasien::select('status_pasien', DB::raw('count(*) as jumlah'))
            ->whereNotNull('status_pasien')
            ->where('status_pasien', '!=', '')
            ->groupBy('status_pasien')
            ->get();
        
        $statusPasienLabels = $statusPasienData->pluck('status_pasien');
        $statusPasienData = $statusPasienData->pluck('jumlah');

        $kunjunganPasien = Pemesanan::select(
            DB::raw('DATE(tanggal_pesan) as tanggal'),
            DB::raw('COUNT(*) as jumlah')
        )
        ->where('status', 'Selesai') // Hanya hitung kunjungan yang selesai
        ->where('tanggal_pesan', '>=', Carbon::now()->subDays(30))
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'asc')
        ->get();
    $kunjunganLabels = $kunjunganPasien->pluck('tanggal');
    $kunjunganData = $kunjunganPasien->pluck('jumlah');

    // 5. [BARU] GRAFIK TOP DOKTER (Berdasarkan Tindakan)
    $dokterPopuler = DB::table('rekam_medis_tindakan as rmt')
        ->join('rekam_medis as rm', 'rmt.rekam_medis_id', '=', 'rm.id')
        ->join('pemesanan as p', 'rm.id_pemesanan', '=', 'p.id')
        ->join('dokter as d', 'p.id_dokter', '=', 'd.id')
        ->join('users as u', 'd.user_id', '=', 'u.id')
        ->select('u.name as nama_dokter', DB::raw('COUNT(rmt.tindakan_id) as jumlah_tindakan'))
        ->groupBy('u.name')
        ->orderBy('jumlah_tindakan', 'desc')
        ->limit(5)
        ->get();
    $dokterLabels = $dokterPopuler->pluck('nama_dokter');
    $dokterData = $dokterPopuler->pluck('jumlah_tindakan');

        return view('admin.dashboard', compact(
            'jumlahPasien', 
            'jumlahDokter', 
            'pemesananHariIni', 
            'labels', 
            'data', 
            'tindakanLabels', 
            'tindakanData',
            'statusPasienLabels', 
            'statusPasienData',
            'kunjunganLabels',
            'kunjunganData',
            'dokterLabels',
            'dokterData'
        ));
    }
}

===== app\Http\Controllers\Admin\DokterController.php =====
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::with('user')->latest()->get();
        return view('admin.dokter.index', compact('dokters'));
    }

    public function create()
    {
        return view('admin.dokter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nomor_telepon' => ['required', 'string', 'max:20'],
            'spesialisasi' => ['required', 'string', 'max:255'],
            'foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomor_telepon' => $request->nomor_telepon,
            'peran' => 'dokter',
        ]);

        $pathFoto = $request->hasFile('foto') ? $request->file('foto')->store('foto-dokter', 'public') : null;

        Dokter::create([
            'user_id' => $user->id,
            'spesialisasi' => $request->spesialisasi,
            'foto' => $pathFoto,
        ]);

        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function show(Dokter $dokter)
    {
        return view('admin.dokter.show', compact('dokter'));
    }

    public function edit(Dokter $dokter)
    {
        return view('admin.dokter.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class.',email,'.$dokter->user_id],
            'nomor_telepon' => ['required', 'string', 'max:20'],
            'spesialisasi' => ['required', 'string', 'max:255'],
            'foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $dokter->user->update($request->only('name', 'email', 'nomor_telepon'));

        $pathFoto = $dokter->foto;
        if ($request->hasFile('foto')) {
            if ($pathFoto) Storage::disk('public')->delete($pathFoto);
            $pathFoto = $request->file('foto')->store('foto-dokter', 'public');
        }

        $dokter->update([
            'spesialisasi' => $request->spesialisasi,
            'foto' => $pathFoto,
        ]);

        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy(Dokter $dokter)
    {
        if ($dokter->foto) Storage::disk('public')->delete($dokter->foto);
        $dokter->user->delete(); // Ini akan otomatis menghapus profil dokter karena relasi cascade
        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil dihapus.');
    }
}

===== app\Http\Controllers\Admin\JadwalController.php =====
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Dokter;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index()
    {
        $dokters = Dokter::with('user', 'jadwal')->get()->map(function ($dokter) {
            $jadwalRingkas = $this->ringkasJadwal($dokter->jadwal);
            $dokter->hari_praktek = $jadwalRingkas['hari'];
            $dokter->jam_praktek = $jadwalRingkas['jam'];
            return $dokter;
        });

        return view('admin.jadwal.index', compact('dokters'));
    }

    public function show(Dokter $dokter)
    {
        // Di Laravel, jika parameter route adalah {jadwal}, kita harus menerima Dokter
        // karena resource 'jadwal' terikat pada model Jadwal.
        // Kita ubah cara memanggilnya di view nanti.
        // Untuk sekarang, kita terima ID dan cari dokternya.
        // Solusi lebih baik: ubah parameter route. Mari kita lakukan itu.
        // Route akan diubah menjadi jadwal/{dokter}

        $dokter->load('user', 'jadwal');
        return view('admin.jadwal.show', compact('dokter'));
    }

    /**
     * Menampilkan form untuk membuat jadwal baru.
     */
    public function create(Request $request)
    {
        $dokters = Dokter::with('user')->get();
        $selectedDokterId = $request->query('dokter_id'); // Ambil ID dokter dari URL
        return view('admin.jadwal.create', compact('dokters', 'selectedDokterId'));
    }

    /**
     * Menyimpan jadwal baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => ['required', 'exists:dokter,id'],
            'hari' => ['required', 'string'],
            'jam_mulai' => ['required', 'date_format:H:i'],
            'jam_selesai' => ['required', 'date_format:H:i', 'after:jam_mulai'],
        ]);

        Jadwal::create($request->all());

        // Redirect kembali ke halaman detail dokter tersebut
        return redirect()->route('admin.jadwal.show', $request->id_dokter)->with('success', 'Jadwal baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit jadwal.
     */
    public function edit(Jadwal $jadwal)
    {
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    /**
     * Memperbarui jadwal.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'hari' => ['required', 'string'],
            'jam_mulai' => ['required', 'date_format:H:i'],
            'jam_selesai' => ['required', 'date_format:H:i', 'after:jam_mulai'],
        ]);

        $jadwal->update($request->all());

        // Redirect kembali ke halaman detail dokter tersebut
        return redirect()->route('admin.jadwal.show', $jadwal->id_dokter)->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Menghapus jadwal.
     */
    public function destroy(Jadwal $jadwal)
    {
        $idDokter = $jadwal->id_dokter;
        $jadwal->delete();
        // Redirect kembali ke halaman detail dokter tersebut
        return redirect()->route('admin.jadwal.show', $idDokter)->with('success', 'Jadwal berhasil dihapus.');
    }

    /**
     * Helper function untuk meringkas jadwal.
     */
    private function ringkasJadwal($jadwals)
    {
        if ($jadwals->isEmpty()) {
            return ['hari' => 'Belum diatur', 'jam' => '-'];
        }

        // Ringkas Hari
        $hariPraktek = $jadwals->pluck('hari')->implode(', ');

        // Ringkas Jam (ambil yang paling umum)
        $jamData = $jadwals->groupBy(function ($item) {
            return Carbon::parse($item->jam_mulai)->format('H:i') . ' - ' . Carbon::parse($item->jam_selesai)->format('H:i');
        })->map->count()->sortDesc();

        

        $jamPraktek = $jamData->keys()->first();

        return ['hari' => $hariPraktek, 'jam' => $jamPraktek];
    }

     /**
     * Menampilkan halaman form untuk generate jadwal mingguan.
     */
    public function createMultiple()
    {
        $dokters = Dokter::with('user')->get();
        return view('admin.jadwal.generate', compact('dokters'));
    }

    /**
     * Menyimpan beberapa jadwal sekaligus berdasarkan hari yang dipilih.
     */
    public function storeMultiple(Request $request)
    {
        $request->validate([
            'id_dokter' => 'required|exists:dokter,id',
            'hari' => 'required|array|min:1',
            'hari.*' => 'required|string|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        $dokterId = $request->id_dokter;
        $days = $request->hari;
        $startTime = $request->jam_mulai;
        $endTime = $request->jam_selesai;
        $generatedCount = 0;

        foreach ($days as $day) {
            // Gunakan updateOrCreate untuk menghindari duplikasi jadwal yang sama persis
            $jadwal = Jadwal::updateOrCreate(
                [
                    'id_dokter' => $dokterId,
                    'hari' => $day,
                ],
                [
                    'jam_mulai' => $startTime,
                    'jam_selesai' => $endTime,
                ]
            );

            // Cek apakah jadwal baru dibuat atau hanya di-update
            if ($jadwal->wasRecentlyCreated) {
                $generatedCount++;
            }
        }

        return redirect()->route('admin.jadwal.index')->with('success', 'Berhasil memproses. ' . $generatedCount . ' jadwal baru berhasil dibuat.');
    }
}

===== app\Http\Controllers\Admin\LaporanController.php =====
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        
        $query = Pemesanan::query()
            ->where('pemesanan.status', '!=', 'Dibatalkan') 
            ->leftJoin('pembayaran', 'pemesanan.id', '=', 'pembayaran.pemesanan_id')
            ->with(['pasien', 'dokter.user','pasien.biodata','rekamMedis.tindakan','rekamMedis.resep.obat']);

        // Filter berdasarkan status pemesanan
        if ($request->filled('status')) {
            $query->where('pemesanan.status', $request->status);
        }

        // Filter berdasarkan rentang tanggal
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->where(function ($q) use ($request) {
                $q->whereBetween('pembayaran.tanggal_bayar', [$request->start_date, $request->end_date])
                  ->orWhereBetween(DB::raw('DATE(pemesanan.created_at)'), [$request->start_date, $request->end_date]);
            });
        }

        // Filter Metode Pembayaran
        if ($request->filled('metode_pembayaran')) {
            $query->where('pembayaran.metode_pembayaran', $request->metode_pembayaran);
        }

        if ($request->filled('status_pasien')) {
            $query->where('pemesanan.status_pasien', $request->status_pasien);
        }

        $laporan = $query->select('pemesanan.*')->latest('pemesanan.created_at')->get();
        
        // Kalkulasi pendapatan disesuaikan dengan relasi yang benar
        $totalPendapatan = $laporan->sum(function($item) {
            return $item->pembayaran->total_biaya ?? 0;
        });
        
        $totalTransaksi = $laporan->count();
        $pasienUnik = $laporan->pluck('pasien.id')->unique()->count();
        
        // Query untuk Chart
        $pendapatanHarian = Pemesanan::query()
            ->join('pembayaran', 'pemesanan.id', '=', 'pembayaran.pemesanan_id')
            ->select(DB::raw('DATE(pembayaran.tanggal_bayar) as tanggal'), DB::raw('SUM(pembayaran.total_biaya) as total'))
            ->whereBetween('pembayaran.tanggal_bayar', [$request->input('start_date', now()->subMonth()), $request->input('end_date', now())])
            // [MODIFIKASI] Tambahkan filter 'Dibatalkan' juga di query chart agar konsisten
            ->where('pemesanan.status', '!=', 'Dibatalkan')
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'asc')
            ->get();

        $chartData = [
            'labels' => $pendapatanHarian->pluck('tanggal'),
            'data' => $pendapatanHarian->pluck('total'),
        ];
        
        // Opsi untuk dropdown filter
        $metodePembayaranOptions = Pembayaran::whereNotNull('metode_pembayaran')->distinct()->pluck('metode_pembayaran');
        
        
        $statusOptions = ['Menunggu Pembayaran', 'Selesai', 'Dikonfirmasi'];
        $statusPasienOptions = ['BPJS', 'Umum', 'InHealth'];

        return view('admin.laporan.index', compact(
            'laporan',
            'totalPendapatan',
            'metodePembayaranOptions',
            'statusPasienOptions',
            'statusOptions',
            'totalTransaksi',
            'pasienUnik',
            'chartData'
        ));
    }

    // Fungsi cetak juga disesuaikan
    public function cetak(Request $request)
    {
        $query = Pemesanan::query()
            // --- [FIX] Start: Menggunakan Nama Kolom yang Benar ---
            ->leftJoin('pembayaran', 'pemesanan.id', '=', 'pembayaran.pemesanan_id')
            // --- [FIX] End ---
            ->with(['pasien', 'dokter.user']);
            
        if ($request->filled('status')) {
            $query->where('pemesanan.status', $request->status);
        }

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->where(function ($q) use ($request) {
                $q->whereBetween('pembayaran.tanggal_bayar', [$request->start_date, $request->end_date])
                  ->orWhereBetween(DB::raw('DATE(pemesanan.created_at)'), [$request->start_date, $request->end_date]);
            });
        }

        if ($request->filled('metode_pembayaran')) {
            $query->where('pembayaran.metode_pembayaran', $request->metode_pembayaran);
        }

        $laporan = $query->select('pemesanan.*')->get();
        $totalPendapatan = $laporan->sum(fn($item) => $item->pembayaran->total_biaya ?? 0);

        return view('admin.laporan.cetak', compact('laporan', 'totalPendapatan'));
    }
}

===== app\Http\Controllers\Admin\ObatController.php =====
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::latest()->paginate(10);
        return view('admin.obat.index', compact('obats'));
    }

    public function create()
    {
        return view('admin.obat.create');
    }

    public function store(Request $request)
    {
        // [MODIFIKASI] Tambahkan validasi untuk field baru
        $request->validate([
            'nama_obat' => 'required|string|max:255|unique:obat,nama_obat',
            'kemasan' => 'required|string|max:100',
            'stok' => 'required|integer|min:0',
            'harga_jual_resep' => 'required|integer|min:0',
            'harga_jual_non_resep' => 'required|integer|min:0',
        ]);

        // [MODIFIKASI] Gunakan $request->all() karena sudah divalidasi dan sesuai fillable
        Obat::create($request->all());

        return redirect()->route('admin.obat.index')->with('success', 'Data obat berhasil ditambahkan.');
    }

    public function edit(Obat $obat)
    {
        return view('admin.obat.edit', compact('obat'));
    }

    public function update(Request $request, Obat $obat)
    {
        // [MODIFIKASI] Tambahkan validasi untuk field baru saat update
        $request->validate([
            'nama_obat' => 'required|string|max:255|unique:obat,nama_obat,' . $obat->id,
            'kemasan' => 'required|string|max:100',
            'stok' => 'required|integer|min:0',
            'harga_jual_resep' => 'required|integer|min:0',
            'harga_jual_non_resep' => 'required|integer|min:0',
        ]);

        // [MODIFIKASI] Gunakan $request->all() untuk update
        $obat->update($request->all());

        return redirect()->route('admin.obat.index')->with('success', 'Data obat berhasil diperbarui.');
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect()->route('admin.obat.index')->with('success', 'Data obat berhasil dihapus.');
    }
}

===== app\Http\Controllers\Admin\PasienController.php =====
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\BiodataPasien;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('peran', 'pasien')->with(['biodata', 'pemesanan' => function ($query) {
            $query->latest()->limit(1); // Ambil 1 pemesanan terbaru
        }]);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhereHas('biodata', function ($subQ) use ($search) {
                        $subQ->where('nik', 'like', '%' . $search . '%');
                    });
            });
        }

        $pasiens = $query->latest()->paginate(15)->withQueryString();
        return view('admin.pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('admin.pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'nomor_telepon' => 'nullable|string|max:20',
            'nik' => 'nullable|string|numeric|digits:16|unique:biodata_pasien,nik',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'umur' => 'nullable|integer|min:0|max:150', // Tambah validasi umur
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
            'pekerjaan' => 'nullable|string|max:100',
            'nama_orang_tua' => 'nullable|string|max:255',
            'status_pasien' => 'nullable|string|max:50',
            'golongan_darah' => 'nullable|string|max:3',
            'riwayat_penyakit' => 'nullable|string',
            'riwayat_alergi_obat' => 'nullable|string',
            'riwayat_alergi_makanan' => 'nullable|string',
            'penyakit_penting' => 'nullable|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomor_telepon' => $request->nomor_telepon,
            'peran' => 'pasien',
        ]);

        $biodataFields = $request->only([
            'nik', 'tempat_lahir', 'tanggal_lahir', 'umur', 'jenis_kelamin', 'alamat', // Tambahkan umur
            'pekerjaan', 'nama_orang_tua', 'status_pasien', 'golongan_darah',
            'riwayat_penyakit', 'riwayat_alergi_obat', 'riwayat_alergi_makanan',
            'penyakit_penting',
        ]);

        if (count(array_filter($biodataFields)) > 0) {
            $user->biodata()->create($biodataFields);
        }

        return redirect()->route('admin.pasien.index')->with('success', 'Pasien berhasil ditambahkan.');
    }

    public function edit(User $pasien)
    {
        if ($pasien->peran !== 'pasien') {
            abort(404);
        }
        $pasien->load('biodata');
        return view('admin.pasien.edit', compact('pasien'));
    }

    public function update(Request $request, User $pasien)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $pasien->id,
            'nomor_telepon' => 'nullable|string|max:20',
            'nik' => 'nullable|string|numeric|digits:16|unique:biodata_pasien,nik,' . optional($pasien->biodata)->id,
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'umur' => 'nullable|integer|min:0|max:150', // Tambah validasi umur
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
            'pekerjaan' => 'nullable|string|max:100',
            'nama_orang_tua' => 'nullable|string|max:255',
            'status_pasien' => 'nullable|string|max:50',
            'golongan_darah' => 'nullable|string|max:3',
            'riwayat_penyakit' => 'nullable|string',
            'riwayat_alergi_obat' => 'nullable|string',
            'riwayat_alergi_makanan' => 'nullable|string',
            'penyakit_penting' => 'nullable|string',
        ]);

        $pasien->update($request->only('name', 'email', 'nomor_telepon'));
        $biodataFields = $request->only([
            'nik', 'tempat_lahir', 'tanggal_lahir', 'umur', 'jenis_kelamin', 'alamat', // Tambahkan umur
            'pekerjaan', 'nama_orang_tua', 'status_pasien', 'golongan_darah',
            'riwayat_penyakit', 'riwayat_alergi_obat', 'riwayat_alergi_makanan',
            'penyakit_penting',
        ]);

        $pasien->biodata()->updateOrCreate(['user_id' => $pasien->id], $biodataFields);

        return redirect()->route('admin.pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function show(User $pasien)
    {
        // Pastikan user yang diakses adalah pasien
        if ($pasien->peran !== 'pasien') {
            abort(404);
        }
        $pasien->load('biodata'); // Load biodata
        return view('admin.pasien.show', compact('pasien'));
    }

    public function destroy(User $pasien)
    {
        $pasien->delete();
        return redirect()->route('admin.pasien.index')->with('success', 'Pasien berhasil dihapus.');
    }
}

===== app\Http\Controllers\Admin\PembayaranController.php =====
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Carbon\Carbon;
use App\Models\Tindakan;

class PembayaranController extends Controller
{
    /**
     * Menampilkan daftar pemesanan yang menunggu pembayaran atau sudah lunas.
     */
    public function index()
    {
        // [MODIFIKASI] Hapus filter 'whereIn' agar semua status yang relevan dengan pembayaran ditampilkan
        $pemesanans = Pemesanan::query()
            ->whereHas('pembayaran') // Hanya ambil pemesanan yang sudah punya tagihan
            ->with(['pasien', 'pembayaran'])
            ->latest()
            ->get();
            
        return view('admin.pembayaran.index', compact('pemesanans'));
    }

    public function cetak(Pemesanan $pemesanan)
    {
        // [MODIFIKASI] Muat semua relasi, termasuk resep dan obat untuk dicetak
        $pemesanan->load([
            'pasien',
            'dokter.user',
            'rekamMedis.tindakan',
            'rekamMedis.resep.obat', // <-- Relasi penting yang ditambahkan
            'pembayaran'
        ]);

        if (!$pemesanan->pembayaran) {
            return redirect()->route('admin.pembayaran.index')->with('error', 'Struk tidak dapat dicetak karena tidak ada tagihan.');
        }

        return view('admin.pembayaran.cetak', compact('pemesanan'));
    }

    /**
     * Menampilkan halaman detail untuk memproses pembayaran.
     */
    // app/Http/Controllers/Admin/PembayaranController.php

    // app/Http/Controllers/Admin/PembayaranController.php

    public function show(Pemesanan $pemesanan)
{
    $pemesanan->load([
        'pasien.biodata',
        'dokter.user',
        'pembayaran',
        'rekamMedis.tindakan',
        'rekamMedis.resep.obat',
        'rekamMedis.foto',
        'tindakan',
    ]);

    $rekamMedis = $pemesanan->rekamMedis;
    $tindakanAwalIds = $pemesanan->tindakan()->pluck('tindakan.id')->toArray();

    $subtotalTindakan   = 0;
    $subtotalObat       = 0;
    $potonganTindakan   = 0;
    $potonganObat       = 0;
    $potonganInhealth   = 0;

    if ($rekamMedis) {
        // subtotal tindakan dari harga tindakan yang tersimpan
        $subtotalTindakan = (int) $rekamMedis->tindakan->sum('harga');

        // subtotal obat dari harga_saat_resep agar konsisten dengan tampilan
        $subtotalObat = $rekamMedis->resep->sum(function ($r) {
            return ((int) $r->jumlah) * (int) ($r->harga_saat_resep ?? 0);
        });
    }

    $subtotal = $subtotalTindakan + $subtotalObat;

    if ($rekamMedis && $pemesanan->status_pasien === 'BPJS') {
        $potonganTindakan = $rekamMedis->tindakan->count() * 2500;
        $potonganObat     = $subtotalObat; // seluruh obat ditanggung BPJS (gratis)
    } elseif ($pemesanan->status_pasien === 'Inhealth' && $pemesanan->pembayaran) {
        $potonganInhealth = (int) ($pemesanan->pembayaran->potongan ?? 0);
    }

    return view('admin.pembayaran.show', compact(
        'pemesanan',
        'rekamMedis',
        'tindakanAwalIds',
        'subtotal',
        'potonganTindakan',
        'potonganObat',
        'potonganInhealth'
    ));
}


    /**
     * Menyimpan data pembayaran dan menyelesaikan transaksi.
     */
    public function store(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'metode_pembayaran' => 'required|string|in:Tunai,Transfer,Kartu Debit/Kredit',
        ]);

        $pembayaran = $pemesanan->pembayaran;

        if ($pembayaran && $pembayaran->status == 'Belum Lunas') {
            // Update status pembayaran
            $pembayaran->update([
                'status' => 'Lunas',
                'metode_pembayaran' => $request->metode_pembayaran,
                'tanggal_bayar' => Carbon::now(),
            ]);

            // Update status pemesanan menjadi Selesai
            $pemesanan->update([
                'status' => 'Selesai',
            ]);

            return redirect()->route('admin.pembayaran.index')->with('success', 'Pembayaran berhasil dikonfirmasi.');
        }

        return redirect()->route('admin.pembayaran.index')->with('error', 'Pembayaran ini sudah lunas atau tidak valid.');
    }
}

===== app\Http\Controllers\Admin\PemesananController.php =====
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\User;
use App\Models\Dokter;
use App\Models\DaftarTindakan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Jadwal;

class PemesananController extends Controller
{
    /**
     * Menampilkan semua data pemesanan.
     */
    public function index()
    {
        $pemesanans = Pemesanan::with(['pasien.biodata', 'dokter.user'])->latest()->get();
        return view('admin.pemesanan.index', compact('pemesanans'));
    }

    /**
     * Menampilkan form untuk membuat pemesanan manual (walk-in).
     */
    public function create()
    {
        $pasiens = User::where('peran', 'pasien')->orderBy('name')->get();
        $dokters = Dokter::with('user')->orderBy('id')->get();
        // Ambil data tindakan seperti di PasienController
        $daftarTindakans = DaftarTindakan::with('tindakanItems')->orderBy('nama_kategori')->get();

        return view('admin.pemesanan.create', compact('pasiens', 'dokters', 'daftarTindakans'));
    }

    public function getSlotWaktuAdmin(Dokter $dokter, $tanggal)
    {
        try {
            $date = Carbon::parse($tanggal);
            $dayOfWeekNumber = $date->dayOfWeek;
            $dayMap = [1 => 'Senin', 2 => 'Selasa', 3 => 'Rabu', 4 => 'Kamis', 5 => 'Jumat', 6 => 'Sabtu', 0 => 'Minggu'];
            $dayName = $dayMap[$dayOfWeekNumber] ?? null;

            $jadwal = $dokter->jadwal()->where('hari', $dayName)->first();

            if (!$jadwal) {
                return response()->json([]); // Kembalikan array kosong jika tidak ada jadwal
            }

            $startTime = Carbon::parse($jadwal->jam_mulai);
            $endTime = Carbon::parse($jadwal->jam_selesai);
            $slotDuration = $jadwal->durasi_slot_menit ?? 30; // Default 30 menit jika null
            $allSlots = [];

            while ($startTime < $endTime) {
                $allSlots[] = $startTime->format('H:i');
                $startTime->addMinutes($slotDuration);
            }

            $bookedSlots = Pemesanan::where('id_dokter', $dokter->id)
                ->where('tanggal_pesan', $date->format('Y-m-d'))
                ->whereIn('status', ['Dipesan', 'Dikonfirmasi']) // Hanya cek status aktif
                ->pluck('waktu_pesan')
                ->map(fn ($time) => Carbon::parse($time)->format('H:i'))
                ->toArray();

            $availableSlots = array_values(array_diff($allSlots, $bookedSlots));

            return response()->json($availableSlots);

        } catch (\Exception $e) {
            // Log error jika perlu: Log::error($e);
            return response()->json(['error' => 'Gagal memuat slot waktu.', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Menyimpan pemesanan manual dari admin.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => ['required', 'exists:users,id,peran,pasien'], // Pastikan user adalah pasien
            'id_dokter' => ['required', 'exists:dokter,id'],
            'tanggal_pesan' => ['required', 'date', 'after_or_equal:today'],
            'waktu_pesan' => ['required', 'date_format:H:i'],
            'status_pasien' => ['required', 'in:BPJS,Umum,Inhealth'],
            'nomor_bpjs' => ['nullable', 'required_if:status_pasien,BPJS', 'string', 'max:20'],
            'tindakan_awal' => ['nullable', 'array'],
            'tindakan_awal.*' => ['exists:tindakan,id'],
            'catatan' => ['nullable', 'string'],
            'status' => ['required', 'in:Dikonfirmasi,Selesai'], // Status awal dari Admin
        ]);

        $pasien = User::findOrFail($request->id_pasien);
        $tanggal = Carbon::parse($request->tanggal_pesan);
        $hariPraktek = $tanggal->translatedFormat('l'); // e.g., Senin, Selasa

        // Cari jadwal yang cocok
        $jadwal = Jadwal::where('id_dokter', $request->id_dokter)
            ->where('hari', $hariPraktek)
            // ->where('jam_mulai', '<=', $request->waktu_pesan) // Uncomment jika perlu validasi jam
            // ->where('jam_selesai', '>', $request->waktu_pesan)
            ->first();

        if (!$jadwal) {
            return back()->with('error', 'Dokter tidak memiliki jadwal pada hari/jam yang dipilih.')->withInput();
        }

        // Cek ketersediaan slot (opsional tapi disarankan)
        $slotExists = Pemesanan::where('id_dokter', $request->id_dokter)
                        ->where('tanggal_pesan', $request->tanggal_pesan)
                        ->where('waktu_pesan', $request->waktu_pesan)
                        ->whereIn('status', ['Dipesan', 'Dikonfirmasi'])
                        ->exists();

        if ($slotExists) {
             return back()->with('error', 'Slot waktu yang dipilih sudah dipesan.')->withInput();
        }


        DB::transaction(function () use ($request, $pasien, $jadwal) {
            // Buat data pemesanan
            $pemesanan = Pemesanan::create([
                'id_pasien' => $pasien->id,
                'nama_pasien_booking' => $pasien->name, // Ambil nama dari user pasien
                'id_dokter' => $request->id_dokter,
                'id_jadwal' => $jadwal->id,
                'tanggal_pesan' => $request->tanggal_pesan,
                'waktu_pesan' => $request->waktu_pesan,
                'status_pasien' => $request->status_pasien,
                'catatan' => $request->catatan,
                'status' => $request->status, // Status awal (misal: Dikonfirmasi)
                'nomor_bpjs' => $request->nomor_bpjs,
            ]);

            // Simpan data tindakan awal ke tabel pivot
            if ($request->has('tindakan_awal')) {
                $pemesanan->tindakanAwal()->attach($request->tindakan_awal);
            }
        });

        return redirect()->route('admin.pemesanan.index')->with('success', 'Pemesanan untuk pasien berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail spesifik pemesanan.
     */
    public function show(Pemesanan $pemesanan)
    {
        $pemesanan->load(['pasien', 'dokter.user', 'jadwal']);
        return view('admin.pemesanan.show', compact('pemesanan'));
    }

    /**
     * Menampilkan form untuk mengedit status pemesanan.
     */
    public function edit(Pemesanan $pemesanan)
    {
        // Memuat relasi yang dibutuhkan untuk ditampilkan di view
        $pemesanan->load(['pasien.biodata', 'dokter.user', 'jadwal']);
        return view('admin.pemesanan.edit', compact('pemesanan'));
    }

    /**
     * Memperbarui status pemesanan.
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'status' => 'required|string|in:Dikonfirmasi,Selesai,Dibatalkan,Dijadwalkan Ulang',
            // Catatan wajib diisi jika statusnya Dibatalkan atau Dijadwalkan Ulang
            'catatan_admin' => 'required_if:status,Dibatalkan,Dijadwalkan Ulang|nullable|string|max:1000',
        ]);

        $pemesanan->update([
            'status' => $request->status,
            'catatan_admin' => $request->catatan_admin,
        ]);

        return redirect()->route('admin.pemesanan.index')->with('success', 'Status pemesanan berhasil diperbarui.');
    }

    /**
     * Menghapus data pemesanan.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        // Sebaiknya pemesanan tidak dihapus permanen jika sudah ada rekam medis.
        // Opsi yang lebih aman adalah membatalkannya.
        if ($pemesanan->rekamMedis) {
            return back()->with('error', 'Pemesanan tidak dapat dihapus karena sudah memiliki rekam medis.');
        }
        $pemesanan->delete();
        return redirect()->route('admin.pemesanan.index')->with('success', 'Pemesanan berhasil dihapus.');
    }
}

===== app\Http\Controllers\Admin\TindakanController.php =====
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tindakan;
use Illuminate\Http\Request;
use App\Models\DaftarTindakan;

class TindakanController extends Controller
{
    /**
     * Menampilkan daftar kategori tindakan.
     */
    public function index()
    {
        $daftarTindakans = DaftarTindakan::with('tindakanItems')->latest()->get();
        return view('admin.tindakan.index', compact('daftarTindakans'));
    }

    /**
     * Menampilkan form untuk membuat kategori atau sub-tindakan baru.
     */
    public function create()
    {
        $kategoris = DaftarTindakan::orderBy('nama_kategori')->get();
        return view('admin.tindakan.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        // Cek apakah ini membuat kategori baru atau sub-tindakan baru
        if ($request->has('nama_kategori')) {
            // Buat kategori baru
            $request->validate(['nama_kategori' => 'required|string|max:255|unique:daftar_tindakan,nama_kategori']);
            DaftarTindakan::create($request->only('nama_kategori'));
            $message = 'Kategori tindakan baru berhasil ditambahkan.';
        } else {
            // Buat sub-tindakan baru
            $request->validate([
                'daftar_tindakan_id' => 'required|exists:daftar_tindakan,id',
                'keterangan' => 'required|string|max:255',
                'harga' => 'required|integer|min:0',
            ]);
            Tindakan::create($request->all());
            $message = 'Detail tindakan baru berhasil ditambahkan.';
        }

        return redirect()->route('admin.tindakan.index')->with('success', $message);
    }

    public function edit(Tindakan $tindakan)
    {
        $kategoris = DaftarTindakan::orderBy('nama_kategori')->get();
        return view('admin.tindakan.edit', compact('tindakan', 'kategoris'));
    }
    public function update(Request $request, Tindakan $tindakan)
    {
        $request->validate([
            'daftar_tindakan_id' => 'required|exists:daftar_tindakan,id',
            'keterangan' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
        ]);

        $tindakan->update($request->all());

        return redirect()->route('admin.tindakan.index')->with('success', 'Tindakan berhasil diperbarui.');
    }

    /**
     * Menghapus data (bisa kategori atau sub-tindakan).
     */
    public function destroy($id)
    {
        // Coba hapus sebagai sub-tindakan dulu
        $tindakan = Tindakan::find($id);
        if ($tindakan) {
            $tindakan->delete();
            return back()->with('success', 'Detail tindakan berhasil dihapus.');
        }

        // Jika tidak ditemukan, coba hapus sebagai kategori
        $kategori = DaftarTindakan::find($id);
        if ($kategori) {
            $kategori->delete(); // Sub-tindakan akan ikut terhapus karena onDelete('cascade')
            return back()->with('success', 'Kategori dan semua detailnya berhasil dihapus.');
        }

        return back()->with('error', 'Data tidak ditemukan.');
    }
}

===== app\Http\Controllers\Auth\AuthenticatedSessionController.php =====
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

===== app\Http\Controllers\Auth\ConfirmablePasswordController.php =====
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    public function show(): View
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('dashboard', absolute: false));
    }
}

===== app\Http\Controllers\Auth\EmailVerificationNotificationController.php =====
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}

===== app\Http\Controllers\Auth\EmailVerificationPromptController.php =====
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(route('dashboard', absolute: false))
                    : view('auth.verify-email');
    }
}

===== app\Http\Controllers\Auth\NewPasswordController.php =====
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]);
    }
}

===== app\Http\Controllers\Auth\PasswordController.php =====
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }
}

===== app\Http\Controllers\Auth\PasswordResetLinkController.php =====
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]);
    }
}

===== app\Http\Controllers\Auth\RegisteredUserController.php =====
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}

===== app\Http\Controllers\Auth\VerifyEmailController.php =====
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }
}

===== app\Http\Controllers\Dokter\DashboardController.php =====
<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;

class DashboardController extends Controller
{
    public function index(Request $request)
{
    $idDokter = Auth::user()->dokter->id;

    // AWAL MODIFIKASI: Filter berdasarkan tanggal (default hari ini)
    $query = Pemesanan::where('id_dokter', $idDokter)
        ->whereIn('status', ['Dikonfirmasi'])
        ->doesntHave('rekamMedis')
        ->with('pasien', 'tindakanAwal')
        ->orderBy('tanggal_pesan', 'desc')
        ->orderBy('waktu_pesan', 'asc');

    if ($request->filled('tanggal')) {
        $query->whereDate('tanggal_pesan', $request->tanggal);
    } else {
        $query->whereDate('tanggal_pesan', today());
    }

    $pemesananHariIni = $query->get();
    // AKHIR MODIFIKASI

    return view('dokter.dashboard', compact('pemesananHariIni'));
}


}

===== app\Http\Controllers\Dokter\JadwalController.php =====
<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    /**
     * Menampilkan daftar jadwal milik dokter yang sedang login.
     */
    public function index()
    {
        $idDokter = Auth::user()->dokter->id;
        $jadwals = Jadwal::where('id_dokter', $idDokter)->orderBy('hari')->get();
        
        return view('dokter.jadwal.index', compact('jadwals'));
    }

    /**
     * Menampilkan detail jadwal (jika diperlukan).
     */
    public function show(Jadwal $jadwal)
    {
        // Memastikan dokter hanya bisa melihat jadwal miliknya sendiri
        if ($jadwal->id_dokter !== Auth::user()->dokter->id) {
            abort(403, 'AKSES DITOLAK');
        }

        return view('dokter.jadwal.show', compact('jadwal'));
    }
}

===== app\Http\Controllers\Dokter\RekamMedisController.php =====
<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;
use App\Models\RekamMedis;
use Illuminate\Support\Facades\DB;
use App\Models\Tindakan;
use App\Models\User;
use App\Models\Obat;
use App\Models\DaftarTindakan;

class RekamMedisController extends Controller
{

    public function index(Request $request)
    {
        $dokterId = Auth::user()->dokter->id;
        $query = RekamMedis::query()
            ->selectRaw('u.id as pasien_id, u.name as nama_pasien, bp.nik as nik_pasien,
               COUNT(rm.id) as jumlah_kunjungan,
               MAX(rm.created_at) as terakhir_kunjungan,
               MAX(rm.diagnosis) as diagnosis_terakhir')
            ->from('rekam_medis as rm')
            ->join('pemesanan as p', 'p.id', '=', 'rm.id_pemesanan')
            ->join('users as u', 'u.id', '=', 'p.id_pasien')
            ->leftJoin('biodata_pasien as bp', 'u.id', '=', 'bp.user_id') // Join untuk NIK
            ->where('p.id_dokter', $dokterId)
            ->groupBy('u.id', 'u.name', 'bp.nik') // Tambah NIK ke group by
            ->orderByDesc('terakhir_kunjungan');

        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('u.name', 'like', '%' . $request->search . '%')
                    ->orWhere('bp.nik', 'like', '%' . $request->search . '%');
            });
        }

        $pasienRingkas = $query->paginate(10)->withQueryString();

        return view('dokter.rekam-medis.index', compact('pasienRingkas'));
    }

    
    public function showByPasien(User $pasien)
    {
        $dokterId = Auth::user()->dokter->id;

        $rekamMedisList = RekamMedis::with(['pemesanan', 'tindakan', 'resep', 'foto'])
            ->whereHas(
                'pemesanan',
                fn($q) =>
                $q->where('id_pasien', $pasien->id)
                    ->where('id_dokter', $dokterId)
            )
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('dokter.rekam-medis.pasien', compact('pasien', 'rekamMedisList'));
    }
    public function create(Request $request)
    {
        $pemesanan = Pemesanan::with('pasien', 'tindakanAwal')->findOrFail($request->query('id_pemesanan'));
        if ($pemesanan->id_dokter !== Auth::user()->dokter->id) {
            abort(403);
        }

        $daftarTindakans = DaftarTindakan::with('tindakanItems')->orderBy('nama_kategori')->get();

        $obats = Obat::where('stok', '>', 0)->orderBy('nama_obat')->get();
        $tindakanAwalIds = $pemesanan->tindakanAwal->pluck('id')->toArray();

        return view('dokter.rekam-medis.create', compact('pemesanan', 'daftarTindakans', 'obats', 'tindakanAwalIds'));
    }

    public function store(Request $request)
{
    $request->validate([
        'id_pemesanan' => 'required|exists:pemesanan,id',
        'diagnosis' => 'required|string|max:255',
        'perawatan' => 'required|string|max:255',
        'foto.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi untuk setiap file foto
    ]);
    
    $pemesanan = Pemesanan::findOrFail($request->id_pemesanan);

    $rekamMedis = $pemesanan->rekamMedis()->create([
        'diagnosis' => $request->diagnosis,
        'perawatan' => $request->perawatan,
        'catatan'   => $request->catatan,
        
    ]);

    if ($request->hasFile('foto')) {
        foreach ($request->file('foto') as $file) {
            
            $path = $file->store('foto-rekam-medis', 'public');
            $rekamMedis->foto()->create(['path_foto' => $path]);
        }
    }

    $subtotalTindakan = 0;
    $subtotalObat = 0;
    $potongan = 0;

    // === Tindakan ===
    if ($request->tindakans) {
        foreach ($request->tindakans as $id) {
            $tindakan = Tindakan::find($id);
            if ($tindakan) {
                $rekamMedis->tindakan()->attach($id, [
                    'harga_saat_itu' => $tindakan->harga
                ]);
                $subtotalTindakan += $tindakan->harga;

                
                if ($pemesanan->status_pasien == 'BPJS') {
                    $potongan += 2500;
                }
            }
        }
    }

    // === Obat ===
    if ($request->resep) {
        foreach ($request->resep as $item) {
            if (!empty($item['obat_id']) && !empty($item['jumlah'])) {
                $obat = Obat::find($item['obat_id']);
                if ($obat) {
                    $hargaSatuan = ($item['tipe_harga'] === 'resep')
                        ? $obat->harga_jual_resep
                        : $obat->harga_jual_non_resep;

                    $rekamMedis->resep()->create([
                        'obat_id'          => $item['obat_id'],
                        'jumlah'           => $item['jumlah'],
                        'harga_saat_resep' => $hargaSatuan,
                        'dosis'            => $item['dosis'] ?? null,
                        'instruksi'        => $item['instruksi'] ?? null,
                    ]);

                    $subtotalObat += $hargaSatuan * $item['jumlah'];

                    
                    if ($pemesanan->status_pasien == 'BPJS') {
                        $potongan += $hargaSatuan * $item['jumlah'];
                    }

                    $obat->decrement('stok', $item['jumlah']);
                }
            }
        }
    }

    // === Subtotal & Total ===
    $subtotal = $subtotalTindakan + $subtotalObat;

    // Inhealth: potongan manual dari input form
    if ($pemesanan->status_pasien == 'Inhealth' && $request->filled('potongan')) {
        $potongan = (float) $request->potongan;
    }

    $totalFinal = max(0, $subtotal - $potongan);

    // === Simpan ke Pembayaran ===
    $pemesanan->pembayaran()->updateOrCreate(
        ['pemesanan_id' => $pemesanan->id],
        [
            'subtotal'         => $subtotal,
            'potongan'         => $potongan,
            'total_biaya'      => $totalFinal,
            'status_pembayaran'=> $totalFinal > 0 ? 'Menunggu Pembayaran' : 'Selesai'
        ]
    );

    return redirect()->route('dokter.dashboard')
        ->with('success', 'Rekam medis berhasil dibuat.');
}


    public function show(RekamMedis $rekamMedi) // Menggunakan nama variabel $rekamMedi dari route
    {
        // Pastikan dokter hanya bisa melihat rekam medis dari pasiennya
        if ($rekamMedi->pemesanan->id_dokter !== Auth::user()->dokter->id) {
            abort(403);
        }

        // Muat semua relasi yang dibutuhkan untuk rincian biaya
        $rekamMedi->load([
            'pemesanan.pasien',
            'pemesanan.pembayaran', // Untuk total biaya final
            'pemesanan.tindakan', // [MODIFIKASI] Eager load tindakan dari pemesanan
            'tindakan',
            'resep.obat', // Untuk rincian resep & harga
            'foto'
        ]);

        // [MODIFIKASI] Ambil ID tindakan awal dari relasi pemesanan yang sudah di-load
        $tindakanAwalIds = $rekamMedi->pemesanan->tindakan->pluck('id')->toArray();

        // Ganti nama variabel agar konsisten di view
        $rekamMedis = $rekamMedi;

        // [MODIFIKASI] Kirim data tindakanAwalIds ke view
        return view('dokter.rekam-medis.show', compact('rekamMedis', 'tindakanAwalIds'));
    }
}

===== app\Http\Controllers\Pasien\DashboardController.php =====
<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;

class DashboardController extends Controller
{
    public function index()
    {
        $pemesananAktif = Pemesanan::where('id_pasien', Auth::id())
            ->whereIn('status', ['Dipesan', 'Dikonfirmasi'])
            ->with('dokter.user')
            ->get();
            
        return view('pasien.dashboard', compact('pemesananAktif'));
    }
}

===== app\Http\Controllers\Pasien\PemesananController.php =====
<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;
use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\RekamMedis;
use App\Models\Tindakan;
use App\Models\BiodataPasien;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\DaftarTindakan;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::where('id_pasien', Auth::id())
        ->with(['dokter.user', 'jadwal']) // Eager load relasi
        ->latest()
        ->paginate(10);
        return view('pasien.pemesanan.index', compact('pemesanans'));
    }

    //----------------------------------
    /**
     * Mengambil hari-hari praktek seorang dokter.
     * Akan mengembalikan response JSON.
     */
    public function getJadwalDokter(Dokter $dokter)
    {
        // Mengambil semua jadwal untuk dokter yang dipilih
        // dan hanya mengambil kolom 'hari' yang unik.
        $jadwal = $dokter->jadwal()->select('hari')->distinct()->pluck('hari');

        // Mengubah nama hari dari Bahasa Indonesia ke Bahasa Inggris untuk dicocokkan dengan Carbon
        $dayMap = [
            'Senin' => 'Monday',
            'Selasa' => 'Tuesday',
            'Rabu' => 'Wednesday',
            'Kamis' => 'Thursday',
            'Jumat' => 'Friday',
            'Sabtu' => 'Saturday',
            'Minggu' => 'Sunday',
        ];

        $englishDays = $jadwal->map(function ($hari) use ($dayMap) {
            return $dayMap[$hari] ?? null;
        })->filter();

        return response()->json($englishDays);
    }

    public function showRekamMedis(RekamMedis $rekamMedis)
    {
        // --- OTORISASI PENTING ---
        // Memastikan rekam medis ini benar-benar milik pasien yang sedang login.
        if ($rekamMedis->pemesanan->id_pasien !== Auth::id()) {
            abort(403, 'AKSES DITOLAK');
        }

        // Memuat semua relasi yang dibutuhkan untuk ditampilkan di view
        $rekamMedis->load(['pemesanan.dokter.user', 'pemesanan.tindakan', 'tindakan', 'resep.obat', 'foto', 'pemesanan.pembayaran']);

        // [MODIFIKASI] Ambil ID tindakan awal dari relasi pemesanan yang sudah di-load
        $tindakanAwalIds = $rekamMedis->pemesanan->tindakan->pluck('id')->toArray();

        // [MODIFIKASI] Kirim data tindakanAwalIds ke view
        return view('pasien.rekam-medis.show', compact('rekamMedis', 'tindakanAwalIds'));
    }

    /**
     * Mengambil slot waktu yang tersedia untuk dokter pada tanggal tertentu.
     * Akan mengembalikan response JSON.
     */
    public function getSlotWaktu(Dokter $dokter, $tanggal)
    {
        try {
            $date = Carbon::parse($tanggal);

            // --- PERUBAHAN LOGIKA DI SINI ---
            // 1. Dapatkan nomor hari (Minggu=0, Senin=1, ..., Sabtu=6)
            $dayOfWeekNumber = $date->dayOfWeek;

            // 2. Buat pemetaan dari nomor ke nama hari dalam Bahasa Indonesia
            $dayMap = [
                1 => 'Senin',
                2 => 'Selasa',
                3 => 'Rabu',
                4 => 'Kamis',
                5 => 'Jumat',
                6 => 'Sabtu',
                0 => 'Minggu',
            ];

            // 3. Dapatkan nama hari yang benar
            $dayName = $dayMap[$dayOfWeekNumber] ?? null;
            // --- AKHIR PERUBAHAN ---

            $jadwal = $dokter->jadwal()->where('hari', $dayName)->first();

            if (!$jadwal) {
                return response()->json([]);
            }

            // Generate semua slot waktu yang mungkin
            $startTime = Carbon::parse($jadwal->jam_mulai);
            $endTime = Carbon::parse($jadwal->jam_selesai);
            $slotDuration = $jadwal->durasi_slot_menit;
            $allSlots = [];

            while ($startTime < $endTime) {
                $allSlots[] = $startTime->format('H:i');
                $startTime->addMinutes($slotDuration);
            }

            // Cek slot yang sudah dipesan pada tanggal tersebut
            $bookedSlots = Pemesanan::where('id_dokter', $dokter->id)
                ->where('tanggal_pesan', $date->format('Y-m-d'))
                ->whereIn('status', ['Dipesan', 'Dikonfirmasi'])
                ->pluck('waktu_pesan')
                ->map(function ($time) {
                    try {
                        return Carbon::parse($time)->format('H:i');
                    } catch (\Exception $e) {
                        return null;
                    }
                })
                ->filter()
                ->toArray();

            $availableSlots = array_diff($allSlots, $bookedSlots);

            return response()->json(array_values($availableSlots));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan di server.', 'message' => $e->getMessage()], 500);
        }
    }

    //----------------------------------

    public function create()
{
    $dokters = Dokter::with('user')->get();

    // [MODIFIKASI] Ambil data tindakan yang sudah dikelompokkan berdasarkan kategori
    $daftarTindakans = DaftarTindakan::with('tindakanItems')->orderBy('nama_kategori')->get();

    return view('pasien.pemesanan.create', compact('dokters', 'daftarTindakans'));
}

    public function store(Request $request)
    {
        $request->validate([
            // Validasi untuk data diri (Langkah 1)
            'nama_pasien_booking' => ['required', 'string', 'max:255'],
            'nik' => ['nullable', 'string', 'digits:16'],
            'status_pasien' => ['required', 'in:BPJS,Umum,Inhealth'],
            'nomor_bpjs' => ['nullable', 'string', 'max:20'],

            // Validasi untuk jadwal (Langkah 2)
            'id_dokter' => ['required', 'exists:dokter,id'],
            'tanggal_pesan' => ['required', 'date', 'after_or_equal:today'],
            'waktu_pesan' => ['required', 'date_format:H:i'],
            'tindakan_awal' => ['nullable', 'array'],
            'tindakan_awal.*' => ['exists:tindakan,id'],
            'catatan' => ['nullable', 'string'],
        ]);

        $user = Auth::user();
        $tanggal = Carbon::parse($request->tanggal_pesan);
        $hariPraktek = $tanggal->translatedFormat('l');

        $jadwal = Jadwal::where('id_dokter', $request->id_dokter)
            ->where('hari', $hariPraktek)
            ->first();

        if (!$jadwal) {
            return back()->with('error', 'Dokter tidak memiliki jadwal pada hari yang dipilih.')->withInput();
        }

        DB::transaction(function () use ($request, $user, $jadwal) {
            // 1. Update atau buat NIK di biodata
            if ($request->filled('nik')) {
                BiodataPasien::updateOrCreate(
                    ['user_id' => $user->id],
                    ['nik' => $request->nik]
                );
            }

            // 2. Buat data pemesanan
            $pemesanan = Pemesanan::create([
                'id_pasien' => $user->id,
                'nama_pasien_booking' => $request->nama_pasien_booking,
                'id_dokter' => $request->id_dokter,
                'id_jadwal' => $jadwal->id,
                'tanggal_pesan' => $request->tanggal_pesan,
                'waktu_pesan' => $request->waktu_pesan,
                'status_pasien' => $request->status_pasien,
                'catatan' => $request->catatan,
                'status' => 'Dipesan',
                'nomor_bpjs' => $request->nomor_bpjs,
            ]);

            // 3. Simpan data tindakan awal ke tabel pivot
            if ($request->has('tindakan_awal')) {
                $pemesanan->tindakanAwal()->attach($request->tindakan_awal);
            }
        });

        return redirect()->route('pasien.pemesanan.index')->with('success', 'Pemesanan berhasil dibuat.');
    }



    public function show(Pemesanan $pemesanan)
    {
        if ($pemesanan->id_pasien !== Auth::id()) abort(403);
        return view('pasien.pemesanan.show', compact('pemesanan'));
    }

    public function destroy(Pemesanan $pemesanan)
    {
        if ($pemesanan->id_pasien !== Auth::id()) abort(403);

        if (in_array($pemesanan->status, ['Dipesan', 'Dikonfirmasi'])) {
            $pemesanan->update(['status' => 'Dibatalkan']);
            return redirect()->route('pasien.pemesanan.index')->with('success', 'Pemesanan berhasil dibatalkan.');
        }

        return redirect()->route('pasien.pemesanan.index')->with('error', 'Pemesanan yang sudah selesai tidak dapat dibatalkan.');
    }
}

===== app\Http\Controllers\Controller.php =====
<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}

===== app\Http\Controllers\ProfileController.php =====
<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

```


## Models Content
```
===== app\Models\BiodataPasien.php =====
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BiodataPasien extends Model
{
    use HasFactory;

    protected $table = 'biodata_pasien';

    protected $fillable = [
        'user_id',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'umur',
        'jenis_kelamin',
        'alamat',
        'pekerjaan',
        'nama_orang_tua',
        'status_pasien',
        'golongan_darah',
        'riwayat_penyakit',
        'riwayat_alergi_obat',
        'riwayat_alergi_makanan',
        'penyakit_penting',
    ];

    /**
     * Setiap biodata dimiliki oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

===== app\Models\DaftarTindakan.php =====
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DaftarTindakan extends Model
{
    use HasFactory;

    protected $table = 'daftar_tindakan';

    protected $fillable = ['nama_kategori'];

    /**
     * Mendapatkan semua detail tindakan (sub-tindakan) di bawah kategori ini.
     */
    public function tindakanItems()
    {
        return $this->hasMany(Tindakan::class, 'daftar_tindakan_id');
    }
}

===== app\Models\Dokter.php =====
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 'dokter';
    protected $fillable = ['user_id', 'spesialisasi', 'foto'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jadwal()
    {
        // Setiap dokter bisa punya banyak jadwal
        return $this->hasMany(Jadwal::class, 'id_dokter');
    }

    // Relasi: Setiap dokter bisa memiliki banyak pemesanan dari pasien.
    public function pemesananDokter()
    {
        return $this->hasMany(Pemesanan::class, 'id_dokter');
    }
}

===== app\Models\FotoRekamMedis.php =====
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FotoRekamMedis extends Model
{
    use HasFactory;
    protected $table = 'foto_rekam_medis';
    protected $fillable = ['id_rekam_medis', 'path_foto'];

    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class, 'id_rekam_medis');
    }
}

===== app\Models\Jadwal.php =====
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $fillable = ['id_dokter', 'hari', 'jam_mulai', 'jam_selesai', 'durasi_slot_menit'];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    // Relasi: Setiap jadwal bisa memiliki banyak pemesanan.
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_jadwal');
    }
}

===== app\Models\Obat.php =====
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'obat';
    protected $fillable = ['nama_obat', 'stok', 'harga_jual_resep', 'harga_jual_non_resep', 'kemasan'];

    public function resep()
    {
        return $this->hasMany(Resep::class, 'obat_id');
    }
}

===== app\Models\Pembayaran.php =====
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable = ['pemesanan_id', 'total_biaya', 'metode_pembayaran', 'status', 'tanggal_bayar','potongan'];

    /**
     * Relasi one-to-one ke Pemesanan.
     * Setiap pembayaran dimiliki oleh satu pemesanan.
     */
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id');
    }
}

===== app\Models\Pemesanan.php =====
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $fillable = ['id_pasien', 'id_dokter', 'id_jadwal', 'tanggal_pesan', 'waktu_pesan', 'catatan', 'status', 'status_pasien', 'nama_pasien_booking', 'catatan_admin', 'nomor_bpjs'];

    public function pasien()
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }

    public function tindakanAwal()
    {
        return $this->belongsToMany(Tindakan::class, 'pemesanan_tindakan', 'pemesanan_id', 'tindakan_id');
    }

    // Relasi: Setiap pemesanan ditujukan untuk satu dokter.
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    // Relasi: Setiap pemesanan terikat pada satu jadwal.
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }

    // Relasi: Setiap pemesanan akan memiliki satu rekam medis.
    public function rekamMedis()
    {
        return $this->hasOne(RekamMedis::class, 'id_pemesanan');
    }


    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'pemesanan_id');
    }
    public function tindakan()
    {
        return $this->belongsToMany(Tindakan::class, 'pemesanan_tindakan', 'pemesanan_id', 'tindakan_id');
    }
}

===== app\Models\RekamMedis.php =====
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RekamMedis extends Model
{
    use HasFactory;
    protected $table = 'rekam_medis';
    protected $fillable = ['id_pemesanan', 'diagnosis', 'perawatan', 'catatan'];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }

    // Relasi: Setiap rekam medis bisa memiliki banyak resep.
    public function resep()
    {
        return $this->hasMany(Resep::class, 'id_rekam_medis');
    }

    // Relasi: Setiap rekam medis bisa memiliki banyak foto.
    public function foto()
    {
        return $this->hasMany(FotoRekamMedis::class, 'id_rekam_medis');
    }

    public function tindakan()
    {
        return $this->belongsToMany(Tindakan::class, 'rekam_medis_tindakan', 'rekam_medis_id', 'tindakan_id')
                    ->withPivot('harga_saat_itu') // Ambil juga harga saat tindakan dilakukan
                    ->withTimestamps();
    }
}

===== app\Models\Resep.php =====
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resep extends Model
{
    use HasFactory;
    protected $table = 'resep';
    protected $fillable = ['id_rekam_medis', 'nama_obat', 'dosis', 'instruksi', 'obat_id', 'jumlah', 'harga_saat_resep'];

    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class, 'id_rekam_medis');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id');
    }
}

===== app\Models\Tindakan.php =====
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tindakan extends Model
{
    use HasFactory;
    protected $table = 'tindakan';
    protected $fillable = ['daftar_tindakan_id', 'keterangan', 'harga', 'deskripsi'];

    public function kategori()
    {
        return $this->belongsTo(DaftarTindakan::class, 'daftar_tindakan_id');
    }

    /**
     * Relasi many-to-many ke RekamMedis.
     * Satu tindakan bisa ada di banyak rekam medis.
     */
    public function rekamMedis()
    {
        return $this->belongsToMany(RekamMedis::class, 'rekam_medis_tindakan', 'tindakan_id', 'rekam_medis_id')
            ->withPivot('harga_saat_itu') // Ambil juga harga saat tindakan dilakukan
            ->withTimestamps();
    }

    public function pemesananAwal()
    {
        return $this->belongsToMany(Pemesanan::class, 'pemesanan_tindakan', 'tindakan_id', 'pemesanan_id');
    }
    public function daftarTindakan()
    {
        return $this->belongsTo(DaftarTindakan::class, 'daftar_tindakan_id');
    }
}

```


## Views & UI Files Content
```
===== resources\views\admin\dokter\create.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Dokter Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-notification />
                    <form method="POST" action="{{ route('admin.dokter.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Nama Lengkap -->
                        <div>
                            <x-input-label for="name" :value="__('Nama Lengkap')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="mt-4">
                            <x-input-label for="nomor_telepon" :value="__('Nomor Telepon')" />
                            <x-text-input id="nomor_telepon" class="block mt-1 w-full" type="text" name="nomor_telepon" :value="old('nomor_telepon')" required />
                        </div>

                        <!-- Spesialisasi -->
                        <div class="mt-4">
                            <x-input-label for="spesialisasi" :value="__('Spesialisasi')" />
                            <x-text-input id="spesialisasi" class="block mt-1 w-full" type="text" name="spesialisasi" :value="old('spesialisasi')" required />
                        </div>
                        
                        <!-- Foto -->
                        <div class="mt-4">
                            <x-input-label for="foto" :value="__('Foto')" />
                            <input id="foto" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" type="file" name="foto">
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Simpan Dokter') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\dokter\edit.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Dokter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-notification />
                    <form method="POST" action="{{ route('admin.dokter.update', $dokter->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama Lengkap -->
                        <div>
                            <x-input-label for="name" :value="__('Nama Lengkap')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $dokter->user->name)" required autofocus />
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $dokter->user->email)" required />
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="mt-4">
                            <x-input-label for="nomor_telepon" :value="__('Nomor Telepon')" />
                            <x-text-input id="nomor_telepon" class="block mt-1 w-full" type="text" name="nomor_telepon" :value="old('nomor_telepon', $dokter->user->nomor_telepon)" required />
                        </div>

                        <!-- Spesialisasi -->
                        <div class="mt-4">
                            <x-input-label for="spesialisasi" :value="__('Spesialisasi')" />
                            <x-text-input id="spesialisasi" class="block mt-1 w-full" type="text" name="spesialisasi" :value="old('spesialisasi', $dokter->spesialisasi)" required />
                        </div>
                        
                        <!-- Foto -->
                        <div class="mt-4">
                            <x-input-label for="foto" :value="__('Ganti Foto (Opsional)')" />
                            @if($dokter->foto)
                                <img src="{{ asset('storage/' . $dokter->foto) }}" alt="Foto {{ $dokter->user->name }}" class="w-24 h-24 rounded-md object-cover mb-2">
                            @endif
                            <input id="foto" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" type="file" name="foto">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Perbarui Data') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\dokter\index.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Dokter') }}
            </h2>
            <a href="{{ route('admin.dokter.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                Tambah Dokter
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="py-2 px-4 border-b">Nama</th>
                                    <th class="py-2 px-4 border-b">Email</th>
                                    <th class="py-2 px-4 border-b">Spesialisasi</th>
                                    <th class="py-2 px-4 border-b">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dokters as $dokter)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ $dokter->user->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $dokter->user->email }}</td>
                                        <td class="py-2 px-4 border-b">{{ $dokter->spesialisasi }}</td>
                                        <td class="py-2 px-4 border-b flex gap-2">
                                            <a href="{{ route('admin.dokter.edit', $dokter->id) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                                            <form action="{{ route('admin.dokter.destroy', $dokter->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokter ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-4 px-4 text-center">Tidak ada data dokter.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\jadwal\create.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Jadwal Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <x-notification />
                    <form method="POST" action="{{ route('admin.jadwal.store') }}">
                        @csrf

                        <!-- Pilih Dokter -->
                        <div>
                            <x-input-label for="id_dokter" :value="__('Dokter')" />
                            <select id="id_dokter" name="id_dokter" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm" required>
                                <option value="">-- Pilih Dokter --</option>
                                @foreach($dokters as $dokter)
                                    <option value="{{ $dokter->id }}" @selected(old('id_dokter', $selectedDokterId) == $dokter->id)>
                                        {{ $dokter->user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Hari -->
                        <div class="mt-4">
                            <x-input-label for="hari" :value="__('Hari Praktek')" />
                            <select id="hari" name="hari" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm" required>
                                <option value="">-- Pilih Hari --</option>
                                <option value="Senin" @selected(old('hari') == 'Senin')>Senin</option>
                                <option value="Selasa" @selected(old('hari') == 'Selasa')>Selasa</option>
                                <option value="Rabu" @selected(old('hari') == 'Rabu')>Rabu</option>
                                <option value="Kamis" @selected(old('hari') == 'Kamis')>Kamis</option>
                                <option value="Jumat" @selected(old('hari') == 'Jumat')>Jumat</option>
                                <option value="Sabtu" @selected(old('hari') == 'Sabtu')>Sabtu</option>
                                <option value="Minggu" @selected(old('hari') == 'Minggu')>Minggu</option>
                            </select>
                        </div>

                        <!-- Jam Mulai -->
                        <div class="mt-4">
                            <x-input-label for="jam_mulai" :value="__('Jam Mulai')" />
                            <x-text-input id="jam_mulai" class="block mt-1 w-full" type="time" name="jam_mulai" :value="old('jam_mulai')" required />
                        </div>

                        <!-- Jam Selesai -->
                        <div class="mt-4">
                            <x-input-label for="jam_selesai" :value="__('Jam Selesai')" />
                            <x-text-input id="jam_selesai" class="block mt-1 w-full" type="time" name="jam_selesai" :value="old('jam_selesai')" required />
                        </div>

                        <!-- Durasi Slot -->
                        <div class="mt-4">
                            <x-input-label for="durasi_slot_menit" :value="__('Durasi Slot (Menit)')" />
                            <x-text-input id="durasi_slot_menit" class="block mt-1 w-full" type="number" name="durasi_slot_menit" value="{{ old('durasi_slot_menit', 30) }}" required />
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-6">
                            <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">
                                {{ __('Simpan Jadwal') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\jadwal\edit.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Jadwal untuk ') . $jadwal->dokter->user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <x-notification />
                    <form method="POST" action="{{ route('admin.jadwal.update', $jadwal->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Info Dokter (Read-only) -->
                        <div>
                            <x-input-label for="dokter_name" :value="__('Dokter')" />
                            <x-text-input id="dokter_name" class="block mt-1 w-full bg-gray-100" type="text" :value="$jadwal->dokter->user->name" disabled />
                        </div>

                        <!-- Hari -->
                        <div class="mt-4">
                            <x-input-label for="hari" :value="__('Hari Praktek')" />
                            <select id="hari" name="hari" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm" required>
                                <option value="Senin" @selected(old('hari', $jadwal->hari) == 'Senin')>Senin</option>
                                <option value="Selasa" @selected(old('hari', $jadwal->hari) == 'Selasa')>Selasa</option>
                                <option value="Rabu" @selected(old('hari', $jadwal->hari) == 'Rabu')>Rabu</option>
                                <option value="Kamis" @selected(old('hari', $jadwal->hari) == 'Kamis')>Kamis</option>
                                <option value="Jumat" @selected(old('hari', $jadwal->hari) == 'Jumat')>Jumat</option>
                                <option value="Sabtu" @selected(old('hari', $jadwal->hari) == 'Sabtu')>Sabtu</option>
                                <option value="Minggu" @selected(old('hari', $jadwal->hari) == 'Minggu')>Minggu</option>
                            </select>
                        </div>

                        {{-- BAGIAN YANG DIPERBAIKI --}}
                        <!-- Jam Mulai -->
                        <div class="mt-4">
                            <x-input-label for="jam_mulai" :value="__('Jam Mulai')" />
                            <x-text-input id="jam_mulai" class="block mt-1 w-full" type="time" name="jam_mulai" :value="old('jam_mulai', \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i'))" required />
                        </div>

                        <!-- Jam Selesai -->
                        <div class="mt-4">
                            <x-input-label for="jam_selesai" :value="__('Jam Selesai')" />
                            <x-text-input id="jam_selesai" class="block mt-1 w-full" type="time" name="jam_selesai" :value="old('jam_selesai', \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i'))" required />
                        </div>
                        {{-- AKHIR PERBAIKAN --}}

                        <!-- Durasi Slot -->
                        <div class="mt-4">
                            <x-input-label for="durasi_slot_menit" :value="__('Durasi Slot (Menit)')" />
                            <x-text-input id="durasi_slot_menit" class="block mt-1 w-full" type="number" name="durasi_slot_menit" :value="old('durasi_slot_menit', $jadwal->durasi_slot_menit)" required />
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-6">
                            <a href="{{ route('admin.jadwal.show', $jadwal->id_dokter) }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">
                                {{ __('Perbarui Jadwal') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\jadwal\generate.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate Jadwal Mingguan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <p class="text-gray-600 mb-6">Gunakan form ini untuk membuat jadwal dengan jam yang sama untuk beberapa hari sekaligus.</p>

                    <form method="POST" action="{{ route('admin.jadwal.storeMultiple') }}">
                        @csrf

                        <div>
                            <x-input-label for="id_dokter" :value="__('Pilih Dokter')" />
                            <select name="id_dokter" id="id_dokter" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
                                <option value="">-- Pilih Dokter --</option>
                                @foreach ($dokters as $dokter)
                                    <option value="{{ $dokter->id }}" @selected(old('id_dokter') == $dokter->id)>{{ $dokter->user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-input-label :value="__('Pilih Hari Praktik')" />
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-2">
                                @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="hari[]" value="{{ $hari }}" class="rounded border-gray-300 text-purple-600 shadow-sm focus:ring-purple-500">
                                    <span>{{ $hari }}</span>
                                </label>
                                @endforeach
                            </div>
                            <x-input-error :messages="$errors->get('hari')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <x-input-label for="jam_mulai" :value="__('Jam Mulai')" />
                                <x-text-input id="jam_mulai" class="block mt-1 w-full" type="time" name="jam_mulai" :value="old('jam_mulai')" required />
                            </div>
                            <div>
                                <x-input-label for="jam_selesai" :value="__('Jam Selesai')" />
                                <x-text-input id="jam_selesai" class="block mt-1 w-full" type="time" name="jam_selesai" :value="old('jam_selesai')" required />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-6">
                            <a href="{{ route('admin.jadwal.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">
                                {{ __('Generate Jadwal') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\jadwal\index.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ringkasan Jadwal Dokter') }}
            </h2>
    
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.jadwal.generate') }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 shadow-sm text-sm font-medium">
                    Generate Mingguan
                </a>
                <a href="{{ route('admin.jadwal.create') }}" class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 shadow-sm text-sm font-medium">
                    Tambah Jadwal Baru
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left">Nama Dokter</th>
                                    <th class="py-3 px-4 border-b text-left">Hari Praktek</th>
                                    <th class="py-3 px-4 border-b text-left">Jam Praktek (Umum)</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dokters as $dokter)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b font-semibold">{{ $dokter->user->name }}</td>
                                        <td class="py-3 px-4 border-b">{{ $dokter->hari_praktek }}</td>
                                        <td class="py-3 px-4 border-b">{{ $dokter->jam_praktek }}</td>
                                        <td class="py-3 px-4 border-b text-center">
                                            <a href="{{ route('admin.jadwal.show', $dokter->id) }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                                                Kelola Jadwal
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-4 px-4 text-center text-gray-500">Belum ada data dokter. Silakan tambahkan dokter terlebih dahulu.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\jadwal\show.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Kelola Jadwal: <span class="font-bold">{{ $dokter->user->name }}</span>
                </h2>
            </div>
            <a href="{{ route('admin.jadwal.create', ['dokter_id' => $dokter->id]) }}" class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 shadow-md">
                Tambah Jadwal untuk Dokter Ini
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left">Hari</th>
                                    <th class="py-3 px-4 border-b text-left">Jam Mulai</th>
                                    <th class="py-3 px-4 border-b text-left">Jam Selesai</th>
                                    <th class="py-3 px-4 border-b text-left">Durasi Slot</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dokter->jadwal as $jadwal)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b">{{ $jadwal->hari }}</td>
                                        <td class="py-3 px-4 border-b">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}</td>
                                        <td class="py-3 px-4 border-b">{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</td>
                                        <td class="py-3 px-4 border-b">{{ $jadwal->durasi_slot_menit }} Menit</td>
                                        <td class="py-3 px-4 border-b text-center">
                                            <div class="flex justify-center gap-4">
                                                <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}" class="text-yellow-500 hover:text-yellow-700 font-semibold">Edit</a>
                                                <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-4 px-4 text-center text-gray-500">Dokter ini belum memiliki jadwal.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <a href="{{ route('admin.jadwal.index') }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                    &larr; Kembali ke Ringkasan Jadwal
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\laporan\cetak.blade.php =====
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pendapatan</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            width: 98%;
            margin: auto;
        }
        h1, h2 {
            text-align: center;
            margin-bottom: 5px;
        }
        h1 {
            font-size: 22px;
            color: #4338CA; /* Ungu gelap */
        }
        h2 {
            font-size: 16px;
            font-weight: normal;
            margin-bottom: 25px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            font-size: 12px;
            vertical-align: top;
        }
        /* [MODIFIKASI] Warna header diubah menjadi ungu */
        thead {
            background-color: #EDE9FE; /* Ungu sangat muda */
            color: #5B21B6; /* Ungu tua */
        }
        thead th {
            font-weight: 600;
        }
        tfoot {
            font-weight: bold;
            background-color: #f2f2f2;
        }
        .total-row th {
            text-align: right;
        }
        ul {
            margin: 0;
            padding-left: 15px;
        }
        li {
            margin-bottom: 3px;
        }
        @page {
            size: landscape;
            margin: 1cm;
        }
        @media print {
            body {
                padding: 0;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="container">
        <h1>Laporan Pendapatan Klinik</h1>
        <h2>Periode: {{ \Carbon\Carbon::parse(request('start_date'))->translatedFormat('d F Y') }} s/d {{ \Carbon\Carbon::parse(request('end_date'))->translatedFormat('d F Y') }}</h2>

        <table>
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Pasien</th>
                    <th>Dokter</th>
                    <th>Tindakan</th>
                    <th>Resep Obat</th>
                    <th>Tgl. Bayar</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th style="text-align: right;">Total Biaya</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporan as $item)
                    <tr>
                        <td>{{ $item->pasien->biodata->nik ?? '-' }}</td>
                        <td>{{ $item->pasien->name }}</td>
                        <td>{{ $item->dokter->user->name }}</td>
                        <td>
                            @if($item->rekamMedis && $item->rekamMedis->tindakan->isNotEmpty())
                                <ul>
                                    @foreach($item->rekamMedis->tindakan as $tindakan)
                                        <li>{{ $tindakan->keterangan }}</li>
                                    @endforeach
                                </ul>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                             @if($item->rekamMedis && $item->rekamMedis->resep->isNotEmpty())
                                <ul>
                                    @foreach($item->rekamMedis->resep as $resep)
                                        <li>{{ $resep->obat->nama_obat }} ({{$resep->jumlah}})</li>
                                    @endforeach
                                </ul>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $item->pembayaran ? \Carbon\Carbon::parse($item->pembayaran->tanggal_bayar)->format('d/m/Y') : '-' }}</td>
                        <td>{{ $item->pembayaran ? ucfirst($item->pembayaran->metode_pembayaran) : '-' }}</td>
                        <td>{{ $item->status }}</td>
                        <td style="text-align: right;">{{ $item->pembayaran ? 'Rp. ' . number_format($item->pembayaran->total_biaya, 0, ',', '.') : '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" style="text-align: center;">Tidak ada data untuk periode yang dipilih.</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <th colspan="8">Total Pendapatan</th>
                    <td style="text-align: right;">Rp. {{ number_format($totalPendapatan, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

</body>
</html>

===== resources\views\admin\laporan\index.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Pendapatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Card Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-gray-500 text-sm font-medium">Total Pendapatan</h3>
                    <p class="text-3xl font-semibold text-gray-800">
                        Rp. {{ number_format($totalPendapatan, 0, ',', '.') }}
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-gray-500 text-sm font-medium">Total Transaksi</h3>
                    <p class="text-3xl font-semibold text-gray-800">{{ $totalTransaksi }}</p>
                </div>
            </div>           

            {{-- Grafik --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg mb-4">Grafik Pendapatan Harian</h3>
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>

            {{-- Laporan & Filter --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg mb-4">Filter Laporan</h3>
                    <form action="{{ route('admin.laporan.index') }}" method="GET">
                        {{-- [MODIFIKASI] Ubah grid layout untuk 5 item --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 items-end">
                            <div>
                                <x-input-label for="start_date" :value="__('Tanggal Mulai')" />
                                <x-text-input type="date" id="start_date" name="start_date" class="mt-1 block w-full"
                                    value="{{ request('start_date', now()->subMonth()->format('Y-m-d')) }}" />
                            </div>
                            <div>
                                <x-input-label for="end_date" :value="__('Tanggal Selesai')" />
                                <x-text-input type="date" id="end_date" name="end_date" class="mt-1 block w-full"
                                    value="{{ request('end_date', now()->format('Y-m-d')) }}" />
                            </div>
                            <div>
                                <x-input-label for="metode_pembayaran" :value="__('Metode Pembayaran')" />
                                <select name="metode_pembayaran" id="metode_pembayaran"
                                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300">
                                    <option value="">Semua</option>
                                    @foreach ($metodePembayaranOptions as $metode)
                                        <option value="{{ $metode }}" @selected(request('metode_pembayaran') == $metode)>
                                            {{ ucfirst($metode) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-input-label for="status" :value="__('Status Janji')" />
                                <select name="status" id="status"
                                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300">
                                    <option value="">Semua</option>
                                    @foreach ($statusOptions as $status)
                                        <option value="{{ $status }}" @selected(request('status') == $status)>
                                            {{ ucfirst($status) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- [MODIFIKASI] Tambahkan dropdown Status Pasien --}}
                            <div>
                                <x-input-label for="status_pasien" :value="__('Status Pasien')" />
                                <select name="status_pasien" id="status_pasien"
                                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300">
                                    <option value="">Semua</option>
                                    @foreach ($statusPasienOptions as $status)
                                        <option value="{{ $status }}" @selected(request('status_pasien') == $status)>
                                            {{ ucfirst($status) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 mt-4">
                            <x-primary-button type="submit">{{ __('Filter') }}</x-primary-button>
                            @if (request()->filled('start_date') && request()->filled('end_date'))
                                <a href="{{ route('admin.laporan.cetak', request()->all()) }}"
                                    class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500">
                                    Cetak Laporan
                                </a>
                            @endif
                        </div>
                    </form>

                    {{-- [MODIFIKASI] Tambahkan div dengan class 'overflow-x-auto' di sini --}}
                    <div class="mt-6 overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">NIK</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pasien
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status Pasien
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dokter
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tindakan
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Resep
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tgl.
                                        Bayar</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Metode
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status
                                    </th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Total
                                        Biaya</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($laporan as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $item->pasien->biodata->nik ?? '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $item->pasien->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $item->pasien->biodata->status_pasien ?? '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $item->dokter->user->name }}</td>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            @if ($item->rekamMedis && $item->rekamMedis->tindakan->isNotEmpty())
                                                <ul class="list-disc list-inside">
                                                    @foreach ($item->rekamMedis->tindakan as $tindakan)
                                                        <li>{{ $tindakan->keterangan }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            @if ($item->rekamMedis && $item->rekamMedis->resep->isNotEmpty())
                                                <ul class="list-disc list-inside">
                                                    @foreach ($item->rekamMedis->resep as $resep)
                                                        <li>{{ $resep->obat->nama_obat }} ({{ $resep->jumlah }})</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @if ($item->status !== 'Menunggu Pembayaran' && $item->pembayaran)
                                                {{ \Carbon\Carbon::parse($item->pembayaran->tanggal_bayar)->format('d/m/Y') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $item->pembayaran ? ucfirst($item->pembayaran->metode_pembayaran) : '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @php
                                                $status = $item->status;
                                                $badgeColor =
                                                    [
                                                        'Selesai' => 'bg-green-100 text-green-800',
                                                        'Menunggu Pembayaran' => 'bg-yellow-100 text-yellow-800',
                                                        'Dikonfirmasi' => 'bg-blue-100 text-blue-800',
                                                    ][$status] ?? 'bg-gray-100 text-gray-800';
                                            @endphp
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $badgeColor }}">
                                                {{ $status }}
                                            </span>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium text-right">
                                            {{ $item->pembayaran ? 'Rp. ' . number_format($item->pembayaran->total_biaya, 0, ',', '.') : '-' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="px-6 py-4 text-center text-sm text-gray-500">
                                            Tidak ada data untuk filter yang dipilih.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> {{-- Penutup div overflow --}}
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($chartData['labels']),
                    datasets: [{
                        label: 'Pendapatan',
                        data: @json($chartData['data']),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        tension: 0.3
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
</x-app-layout>

===== resources\views\admin\obat\create.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Tambah Data Obat Baru') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.obat.store') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="nama_obat" :value="__('Nama Obat')" />
                                <x-text-input id="nama_obat" class="block mt-1 w-full" type="text" name="nama_obat" :value="old('nama_obat')" required />
                            </div>
                             <div>
                                <x-input-label for="kemasan" :value="__('Kemasan (Strip/Botol/Box)')" />
                                <x-text-input id="kemasan" class="block mt-1 w-full" type="text" name="kemasan" :value="old('kemasan')" required />
                            </div>
                             <div>
                                <x-input-label for="stok" :value="__('Stok Awal')" />
                                <x-text-input id="stok" class="block mt-1 w-full" type="number" name="stok" :value="old('stok')" required />
                            </div>
                             <div>
                                <x-input-label for="harga_jual_resep" :value="__('Harga Jual (Resep)')" />
                                <x-text-input id="harga_jual_resep" class="block mt-1 w-full" type="number" name="harga_jual_resep" :value="old('harga_jual_resep')" required />
                            </div>
                             <div class="md:col-span-2">
                                <x-input-label for="harga_jual_non_resep" :value="__('Harga Jual (Non-Resep)')" />
                                <x-text-input id="harga_jual_non_resep" class="block mt-1 w-full" type="number" name="harga_jual_non_resep" :value="old('harga_jual_non_resep')" required />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-6">
                            <a href="{{ route('admin.obat.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">{{ __('Simpan Obat') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\obat\edit.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Data Obat: {{ $obat->nama_obat }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.obat.update', $obat->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="nama_obat" :value="__('Nama Obat')" />
                                <x-text-input id="nama_obat" class="block mt-1 w-full" type="text" name="nama_obat" :value="old('nama_obat', $obat->nama_obat)" required />
                            </div>
                            <div>
                                <x-input-label for="kemasan" :value="__('Kemasan (Strip/Botol/Box)')" />
                                <x-text-input id="kemasan" class="block mt-1 w-full" type="text" name="kemasan" :value="old('kemasan', $obat->kemasan)" required />
                            </div>
                            <div>
                                <x-input-label for="stok" :value="__('Stok')" />
                                <x-text-input id="stok" class="block mt-1 w-full" type="number" name="stok" :value="old('stok', $obat->stok)" required />
                            </div>
                             <div>
                                <x-input-label for="harga_jual_resep" :value="__('Harga Jual (Resep)')" />
                                <x-text-input id="harga_jual_resep" class="block mt-1 w-full" type="number" name="harga_jual_resep" :value="old('harga_jual_resep', $obat->harga_jual_resep)" required />
                            </div>
                            <div class="md:col-span-2">
                                <x-input-label for="harga_jual_non_resep" :value="__('Harga Jual (Non-Resep)')" />
                                <x-text-input id="harga_jual_non_resep" class="block mt-1 w-full" type="number" name="harga_jual_non_resep" :value="old('harga_jual_non_resep', $obat->harga_jual_non_resep)" required />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-6">
                            <a href="{{ route('admin.obat.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">{{ __('Simpan Perubahan') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\obat\index.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Stok Obat') }}
            </h2>
            <a href="{{ route('admin.obat.create') }}" class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 shadow-md">
                Tambah Obat Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left">Nama Obat</th>
                                    <th class="py-3 px-4 border-b text-left">Kemasan</th>
                                    <th class="py-3 px-4 border-b text-center">Stok</th>
                                    <th class="py-3 px-4 border-b text-left">Harga Jual (Resep)</th>
                                    <th class="py-3 px-4 border-b text-left">Harga Jual (Non-Resep)</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($obats as $obat)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b font-semibold">{{ $obat->nama_obat }}</td>
                                        <td class="py-3 px-4 border-b">{{ $obat->kemasan }}</td>
                                        <td class="py-3 px-4 border-b text-center">{{ $obat->stok }}</td>
                                        <td class="py-3 px-4 border-b">Rp {{ number_format($obat->harga_jual_resep, 0, ',', '.') }}</td>
                                        <td class="py-3 px-4 border-b">Rp {{ number_format($obat->harga_jual_non_resep, 0, ',', '.') }}</td>
                                        <td class="py-3 px-4 border-b text-center">
                                            <a href="{{ route('admin.obat.edit', $obat->id) }}" class="text-purple-600 hover:text-purple-800 font-semibold">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-4 px-4 text-center text-gray-500">Belum ada data obat.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                     <div class="mt-4">
                        {{ $obats->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\pasien\create.blade.php =====

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftarkan Akun Pasien Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <x-notification />
                    <form method="POST" action="{{ route('admin.pasien.store') }}">
                        @csrf

                        <h3 class="text-lg font-semibold mb-4 border-b pb-2">Data Pasien</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 mb-6">
                            {{-- Kolom Kiri --}}
                            <div class="space-y-4">
                                <div>
                                    <x-input-label for="name" :value="__('Nama Pasien')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <x-input-label for="tempat_lahir" :value="__('Tempat Lahir')" />
                                        <x-text-input id="tempat_lahir" class="block mt-1 w-full" type="text" name="tempat_lahir" :value="old('tempat_lahir')" />
                                    </div>
                                    <div>
                                        <x-input-label for="tanggal_lahir" :value="__('Tgl. Lahir')" />
                                        <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" :value="old('tanggal_lahir')" />
                                    </div>
                                </div>
                                <div>
                                    <x-input-label for="umur" :value="__('Umur (Tahun)')" />
                                    <x-text-input id="umur" class="block mt-1 w-full" type="number" name="umur" :value="old('umur')" min="0" />
                                </div>
                                <div>
                                    <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                        <option value="">-- Pilih --</option>
                                        <option value="Laki-laki" @selected(old('jenis_kelamin') == 'Laki-laki')>Laki-laki</option>
                                        <option value="Perempuan" @selected(old('jenis_kelamin') == 'Perempuan')>Perempuan</option>
                                    </select>
                                </div>
                                <div>
                                    <x-input-label for="alamat" :value="__('Alamat')" />
                                    <textarea id="alamat" name="alamat" rows="2" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('alamat') }}</textarea>
                                </div>
                                <div>
                                    <x-input-label for="nomor_telepon" :value="__('Nomor HP')" />
                                    <x-text-input id="nomor_telepon" class="block mt-1 w-full" type="text" name="nomor_telepon" :value="old('nomor_telepon')" />
                                </div>
                                <div>
                                    <x-input-label for="pekerjaan" :value="__('Pekerjaan')" />
                                    <x-text-input id="pekerjaan" class="block mt-1 w-full" type="text" name="pekerjaan" :value="old('pekerjaan')" />
                                </div>
                                <div>
                                    <x-input-label for="nama_orang_tua" :value="__('Nama Orang Tua (Jika pasien anak)')" />
                                    <x-text-input id="nama_orang_tua" class="block mt-1 w-full" type="text" name="nama_orang_tua" :value="old('nama_orang_tua')" />
                                </div>
                            </div>

                            {{-- Kolom Kanan --}}
                            <div class="space-y-4">
                                <div>
                                    <x-input-label for="status_pasien" :value="__('Status Pasien')" />
                                    <select id="status_pasien" name="status_pasien" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                        <option value="">-- Pilih --</option>
                                        <option value="BPJS" @selected(old('status_pasien') == 'BPJS')>BPJS</option>
                                        <option value="Umum" @selected(old('status_pasien') == 'Umum')>Umum</option>
                                        <option value="Inhealth" @selected(old('status_pasien') == 'Inhealth')>Inhealth</option>
                                    </select>
                                </div>
                                <div>
                                    <x-input-label for="golongan_darah" :value="__('Golongan Darah')" />
                                    <select id="golongan_darah" name="golongan_darah" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                        <option value="">-- Pilih --</option>
                                        <option value="A" @selected(old('golongan_darah') == 'A')>A</option>
                                        <option value="B" @selected(old('golongan_darah') == 'B')>B</option>
                                        <option value="AB" @selected(old('golongan_darah') == 'AB')>AB</option>
                                        <option value="O" @selected(old('golongan_darah') == 'O')>O</option>
                                    </select>
                                </div>
                                <div>
                                    <x-input-label for="riwayat_penyakit" :value="__('Riwayat Penyakit')" />
                                    <textarea id="riwayat_penyakit" name="riwayat_penyakit" rows="2" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('riwayat_penyakit') }}</textarea>
                                </div>
                                 <div>
                                    <x-input-label for="riwayat_alergi_obat" :value="__('Riwayat Alergi Obat')" />
                                    <textarea id="riwayat_alergi_obat" name="riwayat_alergi_obat" rows="2" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('riwayat_alergi_obat') }}</textarea>
                                </div>
                                 <div>
                                    <x-input-label for="riwayat_alergi_makanan" :value="__('Riwayat Alergi Makanan')" />
                                    <textarea id="riwayat_alergi_makanan" name="riwayat_alergi_makanan" rows="2" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('riwayat_alergi_makanan') }}</textarea>
                                </div>
                                 <div>
                                    <x-input-label for="penyakit_penting" :value="__('Penyakit Penting Lainnya')" />
                                    <textarea id="penyakit_penting" name="penyakit_penting" rows="2" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('penyakit_penting') }}</textarea>
                                </div>
                            </div>
                        </div>

                         <h3 class="text-lg font-semibold mb-4 border-b pb-2 mt-8">Data Akun</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                             <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            </div>
                             <div>
                                <x-input-label for="password" :value="__('Password Sementara')" />
                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                            </div>
                             <div>
                                <x-input-label for="nik" :value="__('NIK')" />
                                <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik')" />
                                <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-6">
                            <a href="{{ route('admin.pasien.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">
                                {{ __('Simpan Akun Pasien') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\pasien\edit.blade.php =====

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Data Pasien: <span class="font-bold">{{ $pasien->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <x-notification />
                    <form method="POST" action="{{ route('admin.pasien.update', $pasien->id) }}">
                        @csrf
                        @method('PUT')

                         <h3 class="text-lg font-semibold mb-4 border-b pb-2">Data Pasien</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 mb-6">
                            {{-- Kolom Kiri --}}
                            <div class="space-y-4">
                                <div>
                                    <x-input-label for="name" :value="__('Nama Pasien')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $pasien->name)" required />
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <x-input-label for="tempat_lahir" :value="__('Tempat Lahir')" />
                                        <x-text-input id="tempat_lahir" class="block mt-1 w-full" type="text" name="tempat_lahir" :value="old('tempat_lahir', optional($pasien->biodata)->tempat_lahir)" />
                                    </div>
                                    <div>
                                        <x-input-label for="tanggal_lahir" :value="__('Tgl. Lahir')" />
                                        <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" :value="old('tanggal_lahir', optional($pasien->biodata)->tanggal_lahir)" />
                                    </div>
                                </div>
                                <div>
                                    <x-input-label for="umur" :value="__('Umur (Tahun)')" />
                                    <x-text-input id="umur" class="block mt-1 w-full" type="number" name="umur" :value="old('umur', optional($pasien->biodata)->umur)" min="0" />
                                </div>
                                <div>
                                    <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                        <option value="">-- Pilih --</option>
                                        <option value="Laki-laki" @selected(old('jenis_kelamin', optional($pasien->biodata)->jenis_kelamin) == 'Laki-laki')>Laki-laki</option>
                                        <option value="Perempuan" @selected(old('jenis_kelamin', optional($pasien->biodata)->jenis_kelamin) == 'Perempuan')>Perempuan</option>
                                    </select>
                                </div>
                                <div>
                                    <x-input-label for="alamat" :value="__('Alamat')" />
                                    <textarea id="alamat" name="alamat" rows="2" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('alamat', optional($pasien->biodata)->alamat) }}</textarea>
                                </div>
                                <div>
                                    <x-input-label for="nomor_telepon" :value="__('Nomor HP')" />
                                    <x-text-input id="nomor_telepon" class="block mt-1 w-full" type="text" name="nomor_telepon" :value="old('nomor_telepon', $pasien->nomor_telepon)" />
                                </div>
                                <div>
                                    <x-input-label for="pekerjaan" :value="__('Pekerjaan')" />
                                    <x-text-input id="pekerjaan" class="block mt-1 w-full" type="text" name="pekerjaan" :value="old('pekerjaan', optional($pasien->biodata)->pekerjaan)" />
                                </div>
                                <div>
                                    <x-input-label for="nama_orang_tua" :value="__('Nama Orang Tua (Jika pasien anak)')" />
                                    <x-text-input id="nama_orang_tua" class="block mt-1 w-full" type="text" name="nama_orang_tua" :value="old('nama_orang_tua', optional($pasien->biodata)->nama_orang_tua)" />
                                </div>
                            </div>

                            {{-- Kolom Kanan --}}
                            <div class="space-y-4">
                                <div>
                                    <x-input-label for="status_pasien" :value="__('Status Pasien')" />
                                    <select id="status_pasien" name="status_pasien" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                        <option value="">-- Pilih --</option>
                                        <option value="BPJS" @selected(old('status_pasien', optional($pasien->biodata)->status_pasien) == 'BPJS')>BPJS</option>
                                        <option value="Umum" @selected(old('status_pasien', optional($pasien->biodata)->status_pasien) == 'Umum')>Umum</option>
                                        <option value="Inhealth" @selected(old('status_pasien', optional($pasien->biodata)->status_pasien) == 'Inhealth')>Inhealth</option>
                                    </select>
                                </div>
                                <div>
                                    <x-input-label for="golongan_darah" :value="__('Golongan Darah')" />
                                    <select id="golongan_darah" name="golongan_darah" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                        <option value="">-- Pilih --</option>
                                        <option value="A" @selected(old('golongan_darah', optional($pasien->biodata)->golongan_darah) == 'A')>A</option>
                                        <option value="B" @selected(old('golongan_darah', optional($pasien->biodata)->golongan_darah) == 'B')>B</option>
                                        <option value="AB" @selected(old('golongan_darah', optional($pasien->biodata)->golongan_darah) == 'AB')>AB</option>
                                        <option value="O" @selected(old('golongan_darah', optional($pasien->biodata)->golongan_darah) == 'O')>O</option>
                                    </select>
                                </div>
                                <div>
                                    <x-input-label for="riwayat_penyakit" :value="__('Riwayat Penyakit')" />
                                    <textarea id="riwayat_penyakit" name="riwayat_penyakit" rows="2" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('riwayat_penyakit', optional($pasien->biodata)->riwayat_penyakit) }}</textarea>
                                </div>
                                 <div>
                                    <x-input-label for="riwayat_alergi_obat" :value="__('Riwayat Alergi Obat')" />
                                    <textarea id="riwayat_alergi_obat" name="riwayat_alergi_obat" rows="2" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('riwayat_alergi_obat', optional($pasien->biodata)->riwayat_alergi_obat) }}</textarea>
                                </div>
                                 <div>
                                    <x-input-label for="riwayat_alergi_makanan" :value="__('Riwayat Alergi Makanan')" />
                                    <textarea id="riwayat_alergi_makanan" name="riwayat_alergi_makanan" rows="2" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('riwayat_alergi_makanan', optional($pasien->biodata)->riwayat_alergi_makanan) }}</textarea>
                                </div>
                                 <div>
                                    <x-input-label for="penyakit_penting" :value="__('Penyakit Penting Lainnya')" />
                                    <textarea id="penyakit_penting" name="penyakit_penting" rows="2" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('penyakit_penting', optional($pasien->biodata)->penyakit_penting) }}</textarea>
                                </div>
                            </div>
                        </div>

                         <h3 class="text-lg font-semibold mb-4 border-b pb-2 mt-8">Data Akun</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                             <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $pasien->email)" required />
                            </div>
                             {{-- Password tidak diubah di sini --}}
                             <div>
                                <x-input-label for="nik" :value="__('NIK')" />
                                <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik', optional($pasien->biodata)->nik)" />
                                <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-6">
                            <a href="{{ route('admin.pasien.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">
                                {{ __('Simpan Perubahan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\pasien\index.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Pasien') }}
            </h2>
            <a href="{{ route('admin.pasien.create') }}" class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 shadow-md">
                Daftarkan Pasien Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="GET" action="{{ route('admin.pasien.index') }}" class="mb-6">
                        <div class="flex items-center">
                            <x-text-input type="text" name="search" placeholder="Cari nama pasien..." class="w-full md:w-1/3" value="{{ request('search') }}" />
                            <x-primary-button class="ms-3">
                                Cari
                            </x-primary-button>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left">Nama Pasien</th>
                                    <th class="py-3 px-4 border-b text-left">Kontak</th>
                                    <th class="py-3 px-4 border-b text-left">NIK</th>
                                    <th class="py-3 px-4 border-b text-left">Status Pasien</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pasiens as $pasien)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b">{{ $pasien->name }}</td>
                                        <td class="py-3 px-4 border-b">{{ $pasien->email }} <br> <span class="text-sm text-gray-500">{{ $pasien->nomor_telepon }}</span></td>
                                        <td class="py-3 px-4 border-b">{{ $pasien->biodata->nik ?? '-' }}</td>

                                        <td class="py-3 px-4 border-b">
                                            {{-- [MODIFIKASI] Ambil status dari biodata --}}
                                            @php
                                                // Ambil status langsung dari relasi biodata
                                                $status = $pasien->biodata->status_pasien ?? null;
                                                $badgeColor = [
                                                    'BPJS' => 'bg-blue-100 text-blue-800',
                                                    'Inhealth' => 'bg-yellow-100 text-yellow-800',
                                                    'Umum' => 'bg-green-100 text-green-800',
                                                ][$status] ?? 'bg-gray-100 text-gray-800';
                                            @endphp
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $badgeColor }}">
                                                {{ $status ?? '-' }}
                                            </span>
                                        </td>
                                        {{-- <td class="py-3 px-4 border-b">
                                            @php
                                                $latestPemesanan = $pasien->pemesanan->first();
                                                $status = $latestPemesanan->status_pasien ?? null;
                                                $badgeColor = [
                                                    'BPJS' => 'bg-blue-100 text-blue-800',
                                                    'Inhealth' => 'bg-yellow-100 text-yellow-800',
                                                    'Umum' => 'bg-green-100 text-green-800',
                                                ][$status] ?? 'bg-gray-100 text-gray-800';
                                            @endphp
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $badgeColor }}">
                                                {{ $status ?? '-' }}
                                            </span>
                                        </td> --}}
                                        <td class="py-3 px-4 border-b text-center">
                                            <a href="{{ route('admin.pasien.show', $pasien->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold mr-3">
                                                Lihat Detail
                                            </a>
                                            <a href="{{ route('admin.pasien.edit', $pasien->id) }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-4 px-4 text-center text-gray-500">Tidak ada data pasien.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $pasiens->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\pasien\show.blade.php =====
{{-- AWAL MODIFIKASI: resources/views/admin/pasien.show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between md:items-center gap-4">
             <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detail Pasien: <span class="font-bold text-purple-700">{{ $pasien->name }}</span>
            </h2>
             <a href="{{ route('admin.pasien.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
             </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <div class="flex items-center mb-8">
                        <img src="{{ asset('images/logodeliyana.png') }}" alt="Logo Klinik" class="h-16 w-auto mr-4">
                        <div>
                            <h2 class="text-2xl font-bold text-purple-800 leading-tight">Deliyana Dental Care</h2>
                            <p class="text-sm text-gray-500">Detail Informasi Pasien</p>
                        </div>
                    </div>

                    {{-- Data Akun --}}
                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-purple-800 mb-4 pb-2 border-b border-purple-200">Data Akun</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 text-base">
                            <div class="space-y-1">
                                <p class="text-sm font-medium text-gray-500">Nama Lengkap</p>
                                <p class="text-gray-900">{{ $pasien->name }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm font-medium text-gray-500">Email</p>
                                <p class="text-gray-900">{{ $pasien->email }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm font-medium text-gray-500">Nomor HP</p>
                                <p class="text-gray-900">{{ $pasien->nomor_telepon ?? '-' }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm font-medium text-gray-500">Terdaftar Sejak</p>
                                <p class="text-gray-900">{{ $pasien->created_at->translatedFormat('d F Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Data Pribadi & Medis --}}
                    @if($pasien->biodata)
                    <div class="mt-8 pt-8 border-t border-gray-200">
                         <h3 class="text-xl font-bold text-purple-800 mb-4 pb-2 border-b border-purple-200">Data Pribadi & Medis</h3>
                         <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-6 text-base">
                             {{-- Kolom Kiri --}}
                             <div class="space-y-4">
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">NIK</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->nik ?? '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Tempat, Tanggal Lahir</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->tempat_lahir ?? '-' }}, {{ $pasien->biodata->tanggal_lahir ? \Carbon\Carbon::parse($pasien->biodata->tanggal_lahir)->translatedFormat('d F Y') : '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Umur</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->umur ? $pasien->biodata->umur . ' Tahun' : ($pasien->biodata->tanggal_lahir ? \Carbon\Carbon::parse($pasien->biodata->tanggal_lahir)->age . ' Tahun' : '-') }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Jenis Kelamin</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->jenis_kelamin ?? '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Alamat</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->alamat ?? '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Pekerjaan</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->pekerjaan ?? '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Nama Orang Tua</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->nama_orang_tua ?? '-' }}</p>
                                </div>
                            </div>
                            {{-- Kolom Kanan --}}
                            <div class="space-y-4">
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Status Pasien Terakhir</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->status_pasien ?? '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Golongan Darah</p>
                                    <p class="text-gray-900 uppercase">{{ $pasien->biodata->golongan_darah ?? '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Riwayat Penyakit</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->riwayat_penyakit ?? '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Riwayat Alergi Obat</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->riwayat_alergi_obat ?? '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Riwayat Alergi Makanan</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->riwayat_alergi_makanan ?? '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Penyakit Penting Lainnya</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->penyakit_penting ?? '-' }}</p>
                                </div>
                            </div>
                         </div>
                    </div>
                    @else
                     <div class="mt-8 pt-8 border-t border-gray-200">
                        <p class="text-center text-gray-500 italic">Biodata lengkap pasien belum diisi.</p>
                     </div>
                    @endif

                    {{-- Tombol Edit --}}
                    <div class="mt-8 pt-6 border-t flex justify-end">
                        <a href="{{ route('admin.pasien.edit', $pasien->id) }}" class="inline-flex items-center px-5 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            Edit Data Pasien
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
{{-- AKHIR MODIFIKASI --}}

===== resources\views\admin\pembayaran\cetak.blade.php =====
<x-print-layout>
    <x-slot name="title">Struk Pembayaran {{ $pemesanan->pasien->name }}</x-slot>

    <div class="max-w-2xl mx-auto my-8 bg-white shadow-lg">
        <div class="p-8">
            <div class="flex justify-between items-start pb-4 border-b">
                <div class="flex items-center mb-6">
                    <img src="{{ asset('images/logodeliyana.png') }}" 
                         alt="Logo Deliyana Dental Care" 
                         class="w-14 h-14 object-contain mr-4">
                    <div>
                        <h1 class="text-2xl font-bold text-purple-700">Deliyana Dental Care</h1>
                        <p class="text-gray-500 text-sm">Klinik Gigi & Estetika</p>
                    </div>
                </div>
                
                <div class="text-right">
                    <p class="font-semibold">Invoice #{{ str_pad($pemesanan->pembayaran->id, 6, '0', STR_PAD_LEFT) }}</p>
                    <p class="text-sm text-gray-600">Tanggal: {{ \Carbon\Carbon::parse($pemesanan->pembayaran->tanggal_bayar ?? now())->translatedFormat('d F Y') }}</p>
                </div>
            </div>

            <div class="mt-6">
                <p class="text-sm text-gray-500">Tagihan Untuk:</p>
                <p class="font-semibold text-gray-800">{{ $pemesanan->pasien->name }}</p>
            </div>

            <div class="mt-6">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="py-2 px-4 text-left text-sm font-semibold text-gray-600">Deskripsi Layanan</th>
                            <th class="py-2 px-4 text-right text-sm font-semibold text-gray-600">Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Rincian Tindakan --}}
                        @if($pemesanan->rekamMedis && $pemesanan->rekamMedis->tindakan->isNotEmpty())
                            @foreach($pemesanan->rekamMedis->tindakan as $tindakan)
                            <tr class="border-b">
                                {{-- [FIX] Menggunakan 'keterangan' --}}
                                <td class="py-3 px-4">{{ $tindakan->keterangan }}</td>
                                <td class="py-3 px-4 text-right">Rp {{ number_format($tindakan->pivot->harga_saat_itu, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        @endif

                        {{-- [BARU] Rincian Resep Obat --}}
                        @if($pemesanan->rekamMedis && $pemesanan->rekamMedis->resep->isNotEmpty())
                             @foreach($pemesanan->rekamMedis->resep as $item)
                            <tr class="border-b">
                                <td class="py-3 px-4">Obat: {{ $item->obat->nama_obat }} ({{ $item->jumlah }}x)</td>
                                <td class="py-3 px-4 text-right">Rp {{ number_format($item->jumlah * $item->harga_saat_resep, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-end">
                <div class="w-full max-w-xs">
                    <div class="flex justify-between py-3 bg-purple-50 px-4 rounded-b-lg">
                        <span class="font-bold text-purple-800">TOTAL</span>
                        <span class="font-bold text-purple-800">Rp {{ number_format($pemesanan->pembayaran->total_biaya, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center">
                @if($pemesanan->pembayaran->status == 'Lunas')
                    <p class="text-2xl font-bold text-green-600">LUNAS</p>
                    <p class="text-sm text-gray-500">Metode Pembayaran: {{ $pemesanan->pembayaran->metode_pembayaran }}</p>
                @endif
                <p class="mt-4 text-sm text-gray-600">Terima kasih atas kunjungan Anda!</p>
            </div>
        </div>
    </div>

    <div class="max-w-2xl mx-auto my-8 text-center no-print">
        <button onclick="window.print()" class="px-6 py-3 bg-purple-600 text-white font-semibold rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
            Cetak Struk
        </button>
        <a href="{{ route('admin.pembayaran.show', $pemesanan->id) }}" class="ml-4 text-gray-600 hover:text-gray-800">
            Kembali
        </a>
    </div>
</x-print-layout>

===== resources\views\admin\pembayaran\index.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Daftar Transaksi Pasien</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left">Tanggal</th>
                                    <th class="py-3 px-4 border-b text-left">Nama Pasien</th>
                                    <th class="py-3 px-4 border-b text-left">Total Biaya</th>
                                    <th class="py-3 px-4 border-b text-center">Status Pembayaran</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pemesanans as $pemesanan)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b">{{ $pemesanan->tanggal_pesan }}</td>
                                        <td class="py-3 px-4 border-b">{{ $pemesanan->pasien->name }}</td>
                                        <td class="py-3 px-4 border-b">
                                            @if($pemesanan->pembayaran)
                                                Rp {{ number_format($pemesanan->pembayaran->total_biaya, 0, ',', '.') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="py-3 px-4 border-b text-center">
                                            @if($pemesanan->pembayaran && $pemesanan->pembayaran->status == 'Lunas')
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Lunas
                                                </span>
                                            @else
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Belum Lunas
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4 border-b text-center">
                                            @if($pemesanan->pembayaran && $pemesanan->pembayaran->status == 'Belum Lunas')
                                                <a href="{{ route('admin.pembayaran.show', $pemesanan->id) }}" class="px-4 py-2 bg-purple-600 text-white text-xs font-semibold rounded-md hover:bg-purple-700">
                                                    Proses Bayar
                                                </a>
                                            @else
                                                <a href="{{ route('admin.pembayaran.show', $pemesanan->id) }}" class="text-gray-500 hover:text-gray-700 text-xs font-semibold">
                                                    Lihat Detail
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-4 px-4 text-center text-gray-500">Tidak ada transaksi yang perlu diproses.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\pembayaran\show.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail & Konfirmasi Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <div class="flex items-center mb-6">
                        <img src="{{ asset('images/logodeliyana.png') }}" alt="Logo Deliyana Dental Care"
                            class="w-16 h-16 object-contain mr-4">
                        <div>
                            <h2 class="text-2xl font-bold text-purple-800 leading-tight">Deliyana Dental Care</h2>
                        </div>
                    </div>






                    <div class="grid grid-cols-2 gap-4 mb-6 pb-6 border-b">
                        <div>
                            <h3 class="text-sm text-gray-500">Pasien</h3>
                            <p class="font-bold text-lg text-gray-800">{{ $pemesanan->pasien->name }}
                                ({{ $pemesanan->status_pasien }})</p>
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-500">Status Pasien</h3>
                            <p class="font-bold text-lg text-gray-800">{{ $rekamMedis->pemesanan->status_pasien }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-500">Nomor BPJS</h3>
                            <p class="font-bold text-lg text-gray-800">{{ $rekamMedis->pemesanan->nomor_bpjs }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-500">Tanggal Perawatan</h3>
                            <p class="font-bold text-lg text-gray-800">
                                {{ $rekamMedis->created_at->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <h4 class="font-semibold text-gray-700">Diagnosis</h4>
                            <p class="mt-1 text-gray-600">{{ $rekamMedis->diagnosis }}</p>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-700">Perawatan</h4>
                            <p class="mt-1 text-gray-600">{{ $rekamMedis->perawatan }}</p>
                        </div>
                        @if ($rekamMedis->catatan)
                            <div>
                                <h4 class="font-semibold text-gray-700">Catatan Tambahan</h4>
                                <p class="mt-1 text-gray-600">{{ $rekamMedis->catatan }}</p>
                            </div>
                        @endif
                    </div>
                    @if ($rekamMedis->foto->isNotEmpty())
                        <div class="mt-6 border-t pt-6">
                            <h4 class="text-lg font-semibold mb-4 text-gray-800">Foto Pendukung</h4>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                @foreach ($rekamMedis->foto as $foto)
                                    <a href="{{ asset('storage/' . $foto->path_foto) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $foto->path_foto) }}" alt="Foto Rekam Medis"
                                            class="rounded-lg object-cover w-full h-32 hover:opacity-80 transition">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="mt-6 border-t pt-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Rincian Tagihan</h3>

                        @php
                            $tindakanPasien = $rekamMedis->tindakan->whereIn('id', $tindakanAwalIds);
                            $tindakanDokter = $rekamMedis->tindakan->whereNotIn('id', $tindakanAwalIds);
                        @endphp

                        @if ($tindakanPasien->isNotEmpty())
                            <div class="mb-4">
                                <h4 class="text-md font-semibold text-gray-700 mb-2">Tindakan Pilihan Pasien</h4>
                                <div class="space-y-2">
                                    @foreach ($tindakanPasien as $tindakan)
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-600">
                                                {{-- tampilkan kategori (jika ada) dan keterangan tindakan --}}
                                                {{ $tindakan->daftarTindakan->nama_kategori ?? '-' }} â€”
                                                {{ $tindakan->keterangan }}
                                            </span>
                                            <span class="font-medium text-gray-800">
                                                Rp {{ number_format($tindakan->pivot->harga_saat_itu, 0, ',', '.') }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($tindakanDokter->isNotEmpty())
                            <div class="mb-4 pt-4 border-t border-dashed">
                                <h4 class="text-md font-semibold text-gray-700 mb-2">Tindakan Tambahan Dokter</h4>
                                <div class="space-y-2">
                                    @foreach ($tindakanDokter as $tindakan)
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-600">
                                                {{ $tindakan->daftarTindakan->nama_kategori ?? '-' }} â€”
                                                {{ $tindakan->keterangan }}
                                            </span>
                                            <span class="font-medium text-gray-800">
                                                Rp {{ number_format($tindakan->pivot->harga_saat_itu, 0, ',', '.') }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif


                        @if ($rekamMedis->resep->isNotEmpty())
                            <div class="pt-4 mt-4 border-t border-dashed">
                                <h4 class="text-md font-semibold text-gray-700 mb-2">Biaya Obat</h4>
                                @foreach ($rekamMedis->resep as $item)
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Obat: {{ $item->obat->nama_obat }}
                                            ({{ $item->jumlah }} x Rp
                                            {{ number_format($item->harga_saat_resep, 0, ',', '.') }})
                                        </span>
                                        <span class="font-medium text-gray-800">Rp
                                            {{ number_format($item->jumlah * $item->harga_saat_resep, 0, ',', '.') }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if ($pemesanan->status_pasien == 'BPJS')
                            @if ($potonganTindakan > 0)
                                <div class="flex justify-between items-center text-red-600">
                                    <span>Potongan Tindakan BPJS</span>
                                    <span>- Rp {{ number_format($potonganTindakan, 0, ',', '.') }}</span>
                                </div>
                            @endif
                            @if ($potonganObat > 0)
                                <div class="flex justify-between items-center text-red-600">
                                    <span>Potongan Obat BPJS (Gratis)</span>
                                    <span>- Rp {{ number_format($potonganObat, 0, ',', '.') }}</span>
                                </div>
                            @endif
                        @elseif($pemesanan->status_pasien == 'Inhealth' && $potonganInhealth > 0)
                            <div class="flex justify-between items-center text-red-600">
                                <span>Potongan Inhealth</span>
                                <span>- Rp {{ number_format($potonganInhealth, 0, ',', '.') }}</span>
                            </div>
                        @endif

                        @if ($rekamMedis->pemesanan->pembayaran)
                            <div class="flex justify-between items-center p-3 mt-6 bg-purple-50 rounded-lg">
                                <span class="font-bold text-purple-800">Total Biaya Keseluruhan</span>
                                <span class="font-bold text-lg text-purple-900">
                                    Rp
                                    {{ number_format($rekamMedis->pemesanan->pembayaran->total_biaya, 0, ',', '.') }}
                                </span>
                            </div>
                        @endif
                    </div>

                    @if ($rekamMedis->resep->isNotEmpty())
                        <div class="mt-6 border-t pt-6">
                            <h4 class="text-lg font-semibold mb-4 text-gray-800">Detail Resep Obat</h4>
                            <ul class="list-disc list-inside space-y-2 text-gray-600">
                                @foreach ($rekamMedis->resep as $item)
                                    <li><strong>{{ $item->obat->nama_obat }}</strong> - {{ $item->jumlah }}
                                        {{ $item->obat->kemasan }}. Dosis: {{ $item->dosis }}. Instruksi:
                                        {{ $item->instruksi }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    

                    {{-- AKHIR MODIFIKASI --}}


                    {{-- Form Konfirmasi Pembayaran dari Kode Lama (Tetap Ada) --}}
                    @if ($pemesanan->pembayaran->status == 'Belum Lunas')
                        <form method="POST" action="{{ route('admin.pembayaran.store', $pemesanan->id) }}">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                                <div>
                                    <x-input-label for="metode_pembayaran" :value="__('Pilih Metode Pembayaran')" />
                                    <select id="metode_pembayaran" name="metode_pembayaran"
                                        class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm"
                                        required>
                                        <option value="Tunai">Tunai</option>
                                        <option value="Transfer">Transfer</option>
                                        <option value="Kartu Debit/Kredit">Kartu Debit/Kredit</option>
                                    </select>
                                </div>
                                <div class="md:text-right mt-4 md:mt-0">
                                    <x-primary-button
                                        class="w-full md:w-auto justify-center bg-green-600 hover:bg-green-700 text-lg px-8 py-3">
                                        {{ __('Konfirmasi Pembayaran') }}
                                    </x-primary-button>
                                </div>
                            </div>
                        </form>
                    @else
                        <!-- Status Lunas -->
                        <div class="text-center p-6 bg-green-50 rounded-lg">
                            <h3 class="text-xl font-bold text-green-800">LUNAS</h3>
                            <p class="text-green-700 mt-1">
                                Dibayar pada
                                {{ \Carbon\Carbon::parse($pemesanan->pembayaran->tanggal_bayar)->translatedFormat('d F Y, H:i') }}
                                melalui {{ $pemesanan->pembayaran->metode_pembayaran }}.
                            </p>
                            <div class="mt-4">
                                <a href="{{ route('admin.pembayaran.cetak', $pemesanan->id) }}" target="_blank"
                                    class="inline-block px-5 py-2 bg-gray-600 text-white text-sm font-semibold rounded-md hover:bg-gray-700">
                                    Cetak Struk
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\pemesanan\create.blade.php =====
<x-app-layout>
    {{-- Tambahkan CSS & JS Tom Select jika belum ada di layout utama admin --}}
    <x-slot name="header_scripts">
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Pemesanan untuk Pasien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-8"
     x-data="adminBookingForm()"
     x-init="init()">
 {{-- Nama fungsi JS diubah --}}
                
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Formulir Janji Temu (Admin)</h3>
                <x-notification />

                <form method="POST" action="{{ route('admin.pemesanan.store') }}">
                    @csrf
                    
                    {{-- LANGKAH 1: PILIH PASIEN & STATUS --}}
                    <div>
                        <h4 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">Langkah 1: Pilih Pasien & Status</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                             <div>
                                <x-input-label for="id_pasien" value="Pilih Pasien" />
                                <select id="id_pasien" name="id_pasien" required>
                                    <option value="">-- Cari Pasien --</option>
                                    @foreach($pasiens as $pasien)
                                        <option value="{{ $pasien->id }}" @selected(old('id_pasien') == $pasien->id)>
                                            {{ $pasien->name }} {{ $pasien->biodata?->nik ? '('.$pasien->biodata->nik.')' : '' }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('id_pasien')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="status_pasien" value="Status Pasien" />
                                <select id="status_pasien" name="status_pasien" x-model="formData.status_pasien" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="BPJS">BPJS</option>
                                    <option value="Umum">Umum</option>
                                    <option value="Inhealth">Inhealth</option>
                                </select>
                            </div>
                            <div x-show="formData.status_pasien === 'BPJS'" x-transition class="md:col-span-2">
                                <x-input-label for="nomor_bpjs" value="Nomor BPJS" />
                                <x-text-input id="nomor_bpjs" class="block mt-1 w-full" type="text" name="nomor_bpjs" x-model="formData.nomor_bpjs" />
                            </div>
                        </div>
                    </div>

                    {{-- LANGKAH 2: JADWAL & KELUHAN --}}
                    <div class="mt-8 border-t pt-6">
                        <h4 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">Langkah 2: Pilih Jadwal & Keluhan</h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Pilih Dokter --}}
                            <div>
                                <x-input-label value="Pilih Dokter" />
                                {{-- @change dihapus dari sini --}}
                                <select x-model="selectedDokter" name="id_dokter" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                                    <option value="">-- Pilih Dokter --</option>
                                    @foreach($dokters as $dokter)
                                        <option value="{{ $dokter->id }}" @selected(old('id_dokter') == $dokter->id)>{{ $dokter->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Pilih Tanggal --}}
                            <div x-show="selectedDokter" x-transition>
                                <x-input-label value="Pilih Tanggal" />
                                {{-- [FIX] Hapus ':' dari value dan gunakan sintaks Blade biasa --}}
                                <input type="date" x-model="selectedTanggal" name="tanggal_pesan" :min="today" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required value="{{ old('tanggal_pesan', '') }}">
                            </div>
                        </div>

                        {{-- Pilih Jam --}}
                        <div class="mt-6" x-show="selectedTanggal && !loadingSlot" x-transition>
                            <x-input-label value="Pilih Jam Tersedia" />
                            <div x-show="availableSlots.length > 0" class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-2 mt-1">
                                <template x-for="slot in availableSlots" :key="slot">
                                    <label :class="{'bg-purple-600 text-white': selectedSlot === slot, 'bg-gray-100 hover:bg-purple-100': selectedSlot !== slot}" class="cursor-pointer text-center p-3 rounded-md transition-colors duration-200">
                                        <input type="radio" x-model="selectedSlot" name="waktu_pesan" :value="slot" class="hidden" required>
                                        <span x-text="slot"></span>
                                    </label>
                                </template>
                            </div>
                             <div x-show="loadingSlot" class="text-sm text-gray-500 mt-2" x-text="loadingSlot"></div>
                            <div x-show="availableSlots.length === 0 && selectedTanggal && !loadingSlot" class="text-sm text-red-500 p-3 bg-red-50 rounded-md mt-1">
                                Tidak ada slot tersedia atau jadwal tidak ditemukan. Periksa kembali jadwal dokter.
                            </div>
                             <x-input-error :messages="$errors->get('waktu_pesan')" class="mt-2" />
                        </div>

                        {{-- Keluhan Awal & Catatan --}}
                        <div class="mt-6">
                            <x-input-label for="tindakan_awal" value="Keluhan / Tindakan Awal (Opsional)" />
                            <select name="tindakan_awal[]" id="tindakan_awal" multiple>
                                @foreach($daftarTindakans as $kategori)
                                    <optgroup label="{{ $kategori->nama_kategori }}">
                                        @foreach($kategori->tindakanItems as $tindakan)
                                            <option value="{{ $tindakan->id }}" data-harga="{{ $tindakan->harga }}">
                                                {{ $tindakan->keterangan }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="catatan" value="Catatan Tambahan (Opsional)" />
                            <textarea name="catatan" id="catatan" rows="3" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('catatan') }}</textarea>
                        </div>

                        {{-- Status Pemesanan Awal --}}
                         <div class="mt-4">
                            <x-input-label for="status" value="Status Pemesanan Awal" />
                            <select id="status" name="status" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="Dikonfirmasi" @selected(old('status', 'Dikonfirmasi') == 'Dikonfirmasi')>Langsung Dikonfirmasi</option>
                                <option value="Selesai" @selected(old('status') == 'Selesai')>Langsung Selesai (Pasien sudah diperiksa)</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6 border-t pt-6">
                         <a href="{{ route('admin.pemesanan.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                         <x-primary-button type="submit" x-bind:disabled="!isFormComplete()" class="bg-purple-600 hover:bg-purple-700 disabled:bg-gray-400">


                            Simpan Pemesanan
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("âœ… DOMContentLoaded â€” Inisialisasi TomSelect");
    
            // Inisialisasi Tom Select untuk Pasien
            new TomSelect('#id_pasien', { 
                create: false, 
                sortField: { field: "text", direction: "asc" } 
            });
    
            // Inisialisasi Tom Select untuk Tindakan
            new TomSelect('#tindakan_awal', {
                plugins: ['remove_button'],
                render: {
                    option: function(data, escape) {
                        const optionElement = document.querySelector(`#tindakan_awal option[value="${data.value}"]`);
                        const harga = optionElement ? optionElement.getAttribute('data-harga') : null;
                        const hargaFormatted = harga ? new Intl.NumberFormat('id-ID').format(harga) : 'N/A';
                        return `<div><span class="font-medium">${escape(data.text)}</span><span class="text-sm text-gray-500 ml-2">(Rp ${hargaFormatted})</span></div>`;
                    },
                    item: function(data, escape) { 
                        return `<div>${escape(data.text)}</div>`; 
                    }
                }
            });
        });
        
        function adminBookingForm() {
            console.log("ðŸ§© Alpine component adminBookingForm() DIINISIALISASI");
    
            return {
                formData: { 
                    status_pasien: '{{ old('status_pasien', '') }}',
                    nomor_bpjs: '{{ old('nomor_bpjs', '') }}',
                },
                selectedDokter: '{{ old('id_dokter', '') }}',
                selectedTanggal: '{{ old('tanggal_pesan', '') }}',
                today: new Date().toISOString().split('T')[0],
                availableSlots: [],
                loadingSlot: '',
                selectedSlot: '{{ old('waktu_pesan', '') }}',
    
                init() {
                    console.log("ðŸš€ init() DIPANGGIL â€” Alpine aktif dan watcher disiapkan");
                    
                    if (this.selectedDokter && this.selectedTanggal) {
                        console.log("ðŸ“… Dokter & tanggal sudah ada di awal, ambil slot...");
                        this.fetchSlotWaktu();
                    }
    
                    this.$watch('selectedDokter', (val) => {
                        console.log("ðŸ‘©â€âš•ï¸ selectedDokter berubah:", val);
                        this.resetTanggalDanSlot();
                    });
    
                    this.$watch('selectedTanggal', (val) => {
                        console.log("ðŸ“† selectedTanggal berubah:", val);
                        this.fetchSlotWaktu();
                    });
    
                    this.$watch('selectedSlot', (val) => {
                        console.log("â° Slot waktu dipilih:", val);
                    });
                },
                
                isFormComplete() {
                    const pasienSelected = document.getElementById('id_pasien').value !== '';
                    const complete = pasienSelected && this.selectedDokter && this.selectedTanggal && this.selectedSlot;
                    console.log("âœ… Mengecek kelengkapan form:", {
                        pasienSelected,
                        selectedDokter: this.selectedDokter,
                        selectedTanggal: this.selectedTanggal,
                        selectedSlot: this.selectedSlot,
                        complete
                    });
                    return complete;
                },
    
                fetchSlotWaktu() {
                    console.log("ðŸ”Ž Fetch slot waktu untuk dokter:", this.selectedDokter, "tanggal:", this.selectedTanggal);
                    
                    this.availableSlots = [];
                    this.selectedSlot = ''; 
                    if (!this.selectedTanggal || !this.selectedDokter) {
                        this.loadingSlot = ''; 
                        console.warn("âš ï¸ fetchSlotWaktu dibatalkan â€” tanggal atau dokter kosong");
                        return;
                    }
    
                    this.loadingSlot = 'Mencari slot waktu...';
                    fetch(`/admin/get-slot-waktu/${this.selectedDokter}/${this.selectedTanggal}`) 
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(err => { 
                                    throw new Error(err.message || 'Jadwal tidak ditemukan atau terjadi kesalahan server.'); 
                                });
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (Array.isArray(data)) {
                                this.availableSlots = data;
                                this.loadingSlot = data.length === 0 ? 'Tidak ada slot tersedia.' : '';
                                console.log("ðŸ•“ Slot tersedia:", data);
                            } else {
                                console.error('Data slot tidak valid:', data);
                                this.loadingSlot = 'Gagal memuat slot (format data salah).';
                                this.availableSlots = [];
                            }
                        })
                        .catch((error) => {
                            console.error('âŒ Error fetching slots:', error);
                            this.loadingSlot = `Error: ${error.message || 'Gagal memuat slot.'}`;
                            this.availableSlots = []; 
                        });
                },
    
                resetTanggalDanSlot() {
                    console.log("ðŸ”„ Reset tanggal & slot karena dokter berubah");
                    this.selectedTanggal = '';
                    this.availableSlots = [];
                    this.selectedSlot = '';
                    this.loadingSlot = '';
                }
            }
        }
    </script>
    
</x-app-layout>

===== resources\views\admin\pemesanan\edit.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Janji Temu Pasien
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">

                    <div class="mb-6 pb-6 border-b">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Detail Janji Temu</h3>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div><strong>Pasien:</strong> {{ $pemesanan->nama_pasien_booking }}</div>
                            <div><strong>Dokter:</strong> {{ $pemesanan->dokter->user->name }}</div>
                            <div><strong>NIK:</strong> {{ $pemesanan->pasien->biodata->nik ?? '-' }}</div>
                            <div><strong>Status Pasien:</strong> {{ $pemesanan->status_pasien }}</div>
                            <div><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pemesanan->tanggal_pesan)->isoFormat('D MMMM YYYY') }}</div>
                            <div><strong>Waktu:</strong> {{ \Carbon\Carbon::parse($pemesanan->waktu_pesan)->format('H:i') }}</div>
                            <div class="col-span-2"><strong>Status Saat Ini:</strong> {{ $pemesanan->status }}</div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('admin.pemesanan.update', $pemesanan->id) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="status" :value="__('Ubah Status')" class="font-bold" />
                            <select name="status" id="status" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50">
                                <option value="Dikonfirmasi" @selected(old('status', $pemesanan->status) == 'Dikonfirmasi')>Konfirmasi Janji Temu</option>
                                <option value="Dijadwalkan Ulang" @selected(old('status', $pemesanan->status) == 'Dijadwalkan Ulang')>Jadwalkan Ulang</option>
                                <option value="Dibatalkan" @selected(old('status', $pemesanan->status) == 'Dibatalkan')>Batalkan Janji Temu</option>
                                <option value="Selesai" @selected(old('status', $pemesanan->status) == 'Selesai')>Selesaikan (Telah Diperiksa)</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="catatan_admin">
                                Catatan untuk Pasien <span class="text-gray-500 text-xs">(Wajib diisi jika dibatalkan/dijadwalkan ulang)</span>
                            </x-input-label>
                            <textarea id="catatan_admin" name="catatan_admin" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50" rows="4">{{ old('catatan_admin', $pemesanan->catatan_admin) }}</textarea>
                            <x-input-error :messages="$errors->get('catatan_admin')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.pemesanan.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Kembali
                            </a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">
                                {{ __('Simpan Perubahan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\pemesanan\index.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Semua Pemesanan') }}
            </h2>
            <a href="{{ route('admin.pemesanan.create') }}" class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 shadow-md text-sm font-medium">
                Buat Pemesanan Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="py-2 px-4 border-b">Pasien</th>
                                    <th class="py-2 px-4 border-b">NIK</th>
                                    <th class="py-2 px-4 border-b">Status Pasien</th>
                                    <th class="py-2 px-4 border-b">Dokter</th>
                                    <th class="py-2 px-4 border-b">Tanggal</th>
                                    <th class="py-2 px-4 border-b">Waktu</th>
                                    <th class="py-2 px-4 border-b">Status</th>
                                    <th class="py-2 px-4 border-b">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pemesanans as $pemesanan)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ $pemesanan->pasien->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $pemesanan->pasien->biodata->nik ?? '-' }}</td>
                                        <td class="py-2 px-4 border-b">
                                            @php
                                                $statusPasien = $pemesanan->status_pasien;
                                                $badgeColorPasien = [
                                                    'BPJS' => 'bg-blue-100 text-blue-800',
                                                    'Inhealth' => 'bg-yellow-100 text-yellow-800',
                                                    'Umum' => 'bg-green-100 text-green-800',
                                                ][$statusPasien] ?? 'bg-gray-100 text-gray-800';
                                            @endphp
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $badgeColorPasien }}">
                                                {{ $statusPasien }}
                                            </span>
                                        </td>
                                        <td class="py-2 px-4 border-b">{{ $pemesanan->dokter->user->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($pemesanan->tanggal_pesan)->translatedFormat('d F Y') }}</td>
                                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($pemesanan->waktu_pesan)->format('H:i') }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($pemesanan->status == 'Selesai') bg-green-100 text-green-800 
                                                @elseif($pemesanan->status == 'Dibatalkan') bg-red-100 text-red-800
                                                @elseif($pemesanan->status == 'Dikonfirmasi') bg-blue-100 text-blue-800
                                                @else bg-yellow-100 text-yellow-800 @endif">
                                                {{ $pemesanan->status }}
                                            </span>
                                        </td>
                                        <td class="py-2 px-4 border-b">
                                            <a href="{{ route('admin.pemesanan.edit', $pemesanan->id) }}" class="text-indigo-600 hover:text-indigo-900">Ubah Status</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-4 px-4 text-center">Tidak ada data pemesanan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\tindakan\create.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Tambah Kategori atau Detail Tindakan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Form untuk Kategori Baru -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">Tambah Kategori Tindakan Baru</h3>
                    <form method="POST" action="{{ route('admin.tindakan.store') }}">
                        @csrf
                        <div>
                            <x-input-label for="nama_kategori" :value="__('Nama Kategori (Contoh: Tambal Gigi, Cabut Gigi)')" />
                            <x-text-input id="nama_kategori" class="block mt-1 w-full" type="text"
                                name="nama_kategori" :value="old('nama_kategori')" required />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="bg-blue-600 hover:bg-blue-700">Simpan Kategori</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Form untuk Detail Tindakan Baru -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white">
                    <h3 class="text-lg font-bold mb-4">Tambah Detail Tindakan Baru</h3>
                    <form method="POST" action="{{ route('admin.tindakan.store') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="daftar_tindakan_id" :value="__('Pilih Kategori')" />
                                <select name="daftar_tindakan_id" id="daftar_tindakan_id"
                                    class="block mt-1 w-full rounded-md border-gray-300" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-input-label for="keterangan" :value="__('Keterangan (Contoh: Gigi Depan, Gigi Geraham)')" />
                                <x-text-input id="keterangan" class="block mt-1 w-full" type="text" name="keterangan"
                                    :value="old('keterangan')" required />
                            </div>
                            <div class="md:col-span-2">
                                <x-input-label for="harga" :value="__('Harga')" />
                                <x-text-input id="harga" class="block mt-1 w-full" type="number" name="harga"
                                    :value="old('harga')" required />
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">Simpan Detail
                                Tindakan</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\tindakan\edit.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Detail Tindakan</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.tindakan.update', $tindakan->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="daftar_tindakan_id" :value="__('Kategori')" />
                                <select name="daftar_tindakan_id" id="daftar_tindakan_id"
                                    class="block mt-1 w-full rounded-md border-gray-300" required>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}" @selected($tindakan->daftar_tindakan_id == $kategori->id)>
                                            {{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-input-label for="keterangan" :value="__('Keterangan')" />
                                <x-text-input id="keterangan" class="block mt-1 w-full" type="text" name="keterangan"
                                    :value="old('keterangan', $tindakan->keterangan)" required />
                            </div>
                            <div class="md:col-span-2">
                                <x-input-label for="harga" :value="__('Harga')" />
                                <x-text-input id="harga" class="block mt-1 w-full" type="number" name="harga"
                                    :value="old('harga', $tindakan->harga)" required />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-6">
                            <a href="{{ route('admin.tindakan.index') }}"
                                class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">Simpan
                                Perubahan</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\tindakan\index.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Daftar Tindakan') }}
            </h2>
            <a href="{{ route('admin.tindakan.create') }}"
                class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 shadow-md">
                Tambah Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @forelse ($daftarTindakans as $kategori)
                        <div class="mb-6 pb-4 border-b">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-lg font-bold text-gray-800">{{ $kategori->nama_kategori }}</h3>
                                <form action="{{ route('admin.tindakan.destroy', $kategori->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kategori ini beserta semua detailnya?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Hapus
                                        Kategori</button>
                                </form>
                            </div>
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="py-2 px-4 text-left">Keterangan</th>
                                        <th class="py-2 px-4 text-right">Harga</th>
                                        <th class="py-2 px-4 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kategori->tindakanItems as $item)
                                        <tr class="hover:bg-gray-50">
                                            <td class="py-2 px-4">{{ $item->keterangan }}</td>
                                            <td class="py-2 px-4 text-right">Rp
                                                {{ number_format($item->harga, 0, ',', '.') }}</td>
                                            <td class="py-2 px-4 text-center">
                                                <a href="{{ route('admin.tindakan.edit', $item->id) }}"
                                                    class="text-purple-600 hover:text-purple-800 font-semibold mr-3">Edit</a>
                                                <form action="{{ route('admin.tindakan.destroy', $item->id) }}"
                                                    method="POST" class="inline-block"
                                                    onsubmit="return confirm('Yakin ingin menghapus item ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-500 hover:text-red-700">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="py-2 px-4 text-center text-gray-400">Belum ada
                                                detail tindakan untuk kategori ini.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    @empty
                        <p class="text-center text-gray-500">Belum ada kategori tindakan yang dibuat.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\admin\dashboard.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-700">Jumlah Pasien</h3>
                    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $jumlahPasien }}</p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-700">Jumlah Dokter</h3>
                    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $jumlahDokter }}</p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-700">Pemesanan Hari Ini</h3>
                    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $pemesananHariIni }}</p>
                </div>
            </div>

            {{-- [MODIFIKASI] Grid untuk dua grafik --}}
            <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-4">Grafik Pendapatan (6 Bulan Terakhir)</h3>
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-4">5 Tindakan Paling Populer</h3>
                        <canvas id="tindakanChart"></canvas>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-4">Distribusi Status Pasien</h3>
                        <canvas id="statusPasienChart"></canvas>
                    </div>
                </div>
                
                {{-- Grafik Kunjungan Pasien (Baru) --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-4">Kunjungan Selesai (30 Hari Terakhir)</h3>
                        <canvas id="kunjunganChart"></canvas>
                    </div>
                </div>
            </div>

            {{-- Grafik Top Dokter (Baru) --}}
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Top 5 Dokter (Berdasarkan Tindakan)</h3>
                    <canvas id="dokterChart"></canvas>
                </div>
            </div>
            </div>
        </div>
    </div>

    {{-- Script untuk Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Grafik Pendapatan (Bar Chart)
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            new Chart(revenueCtx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        label: 'Pendapatan (Rp)',
                        data: {!! json_encode($data) !!},
                        backgroundColor: 'rgba(139, 92, 246, 0.5)',
                        borderColor: 'rgba(139, 92, 246, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                                }
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) { label += ': '; }
                                    if (context.parsed.y !== null) {
                                        label += 'Rp ' + new Intl.NumberFormat('id-ID').format(context.parsed.y);
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });

            // [MODIFIKASI] Grafik Tindakan Populer (Pie Chart)
            const tindakanCtx = document.getElementById('tindakanChart').getContext('2d');
            new Chart(tindakanCtx, {
                type: 'pie', // Tipe grafik diubah menjadi 'pie'
                data: {
                    labels: {!! json_encode($tindakanLabels) !!},
                    datasets: [{
                        label: 'Jumlah Dilakukan',
                        data: {!! json_encode($tindakanData) !!},
                        {{-- [MODIFIKASI] Ubah warna menjadi berbeda --}}
                        backgroundColor: [
                            'rgba(139, 92, 246, 0.7)',  // Ungu
                            'rgba(16, 185, 129, 0.7)', // Hijau
                            'rgba(239, 68, 68, 0.7)',   // Merah
                            'rgba(234, 179, 8, 0.7)',  // Kuning
                            'rgba(59, 130, 246, 0.7)'   // Biru
                        ],
                        borderColor: '#ffffff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) { label += ': '; }
                                    if (context.parsed !== null) {
                                        label += context.parsed + ' kali';
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });

            const statusPasienCtx = document.getElementById('statusPasienChart').getContext('2d');
            new Chart(statusPasienCtx, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($statusPasienLabels) !!},
                    datasets: [{
                        label: 'Jumlah Pasien',
                        data: {!! json_encode($statusPasienData) !!},
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.7)',  // Biru (misal: BPJS)
                            'rgba(16, 185, 129, 0.7)', // Hijau (misal: Umum)
                            'rgba(234, 179, 8, 0.7)',  // Kuning (misal: Inhealth)
                        ],
                        borderColor: '#ffffff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) { label += ': '; }
                                    if (context.parsed !== null) {
                                        label += context.parsed + ' pasien';
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });

            // 4. [BARU] Grafik Kunjungan Pasien (Line Chart)
            const kunjunganCtx = document.getElementById('kunjunganChart').getContext('2d');
            new Chart(kunjunganCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($kunjunganLabels) !!},
                    datasets: [{
                        label: 'Jumlah Kunjungan Selesai',
                        data: {!! json_encode($kunjunganData) !!},
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderColor: 'rgba(16, 185, 129, 1)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: { scales: { y: { beginAtZero: true } }, plugins: { tooltip: { callbacks: { label: context => `${context.parsed.y} kunjungan` } } } }
            });

            // 5. [BARU] Grafik Top Dokter (Horizontal Bar Chart)
            const dokterCtx = document.getElementById('dokterChart').getContext('2d');
            new Chart(dokterCtx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($dokterLabels) !!},
                    datasets: [{
                        label: 'Jumlah Tindakan Dilakukan',
                        data: {!! json_encode($dokterData) !!},
                        backgroundColor: 'rgba(239, 68, 68, 0.5)',
                        borderColor: 'rgba(239, 68, 68, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y', // <-- Ini membuatnya horizontal
                    scales: { x: { beginAtZero: true } },
                    plugins: { legend: { display: false }, tooltip: { callbacks: { label: context => `${context.parsed.x} tindakan` } } }
                }
            });
        });
    </script>
</x-app-layout>

===== resources\views\auth\confirm-password.blade.php =====
<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

===== resources\views\auth\forgot-password.blade.php =====
<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-800">Lupa Password Anda?</h2>
        <p class="text-gray-500 mt-2">Tidak masalah. Masukkan email Anda dan kami akan mengirimkan link untuk mengatur ulang password.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-primary-button class="w-full justify-center bg-purple-600 hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-800 focus:ring-purple-500">
                {{ __('Kirim Link Reset Password') }}
            </x-primary-button>
        </div>
        
        <div class="mt-6 text-center text-sm text-gray-600">
            <a class="underline hover:text-purple-700 font-semibold" href="{{ route('login') }}">
                Kembali ke Login
            </a>
        </div>
    </form>
</x-guest-layout>

===== resources\views\auth\login.blade.php =====
{{-- AWAL MODIFIKASI: resources/views/auth/login.blade.php --}}
<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800">Selamat Datang Kembali!</h2>
        <p class="text-gray-500 mt-2">Silakan masuk ke akun Anda.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <div class="flex justify-between items-center">
                <x-input-label for="password" :value="__('Password')" />
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-purple-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Lupa password?') }}
                    </a>
                @endif
            </div>
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-purple-600 shadow-sm focus:ring-purple-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
            </label>
        </div>

        <div class="mt-4">
            <x-input-label for="captcha" :value="__('Verifikasi Keamanan')" />
            <div class="flex items-center space-x-2 mt-1">
                {{-- Tampilkan gambar captcha --}}
                <span class="border rounded-md p-1 bg-gray-100">
                    {!! captcha_img() !!}
                </span>
                {{-- Input untuk kode --}}
                <x-text-input id="captcha" class="block w-full" type="text" name="captcha" required />
            </div>
            <x-input-error :messages="$errors->get('captcha')" class="mt-2" />
        </div>
        <div class="mt-6">
            <x-primary-button class="w-full justify-center bg-purple-600 hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-800 focus:ring-purple-500">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="mt-6 text-center text-sm text-gray-600">
            Belum punya akun?
            <a class="underline hover:text-purple-700 font-semibold" href="{{ route('register') }}">
                Daftar di sini
            </a>
        </div>
    </form>
</x-guest-layout>
{{-- AKHIR MODIFIKASI --}}

===== resources\views\auth\register.blade.php =====
<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800">Buat Akun Baru</h2>
        <p class="text-gray-500 mt-2">Hanya butuh beberapa detik untuk memulai.</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-primary-button class="w-full justify-center bg-purple-600 hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-800 focus:ring-purple-500">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>

        <div class="mt-6 text-center text-sm text-gray-600">
            Sudah punya akun?
            <a class="underline hover:text-purple-700 font-semibold" href="{{ route('login') }}">
                Masuk di sini
            </a>
        </div>
    </form>
</x-guest-layout>

===== resources\views\auth\reset-password.blade.php =====
<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

===== resources\views\auth\verify-email.blade.php =====
<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>

===== resources\views\components\application-logo.blade.php =====
<svg viewBox="0 0 316 316" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
    <path d="M305.8 81.125C305.77 80.995 305.69 80.885 305.65 80.755C305.56 80.525 305.49 80.285 305.37 80.075C305.29 79.935 305.17 79.815 305.07 79.685C304.94 79.515 304.83 79.325 304.68 79.175C304.55 79.045 304.39 78.955 304.25 78.845C304.09 78.715 303.95 78.575 303.77 78.475L251.32 48.275C249.97 47.495 248.31 47.495 246.96 48.275L194.51 78.475C194.33 78.575 194.19 78.725 194.03 78.845C193.89 78.955 193.73 79.045 193.6 79.175C193.45 79.325 193.34 79.515 193.21 79.685C193.11 79.815 192.99 79.935 192.91 80.075C192.79 80.285 192.71 80.525 192.63 80.755C192.58 80.875 192.51 80.995 192.48 81.125C192.38 81.495 192.33 81.875 192.33 82.265V139.625L148.62 164.795V52.575C148.62 52.185 148.57 51.805 148.47 51.435C148.44 51.305 148.36 51.195 148.32 51.065C148.23 50.835 148.16 50.595 148.04 50.385C147.96 50.245 147.84 50.125 147.74 49.995C147.61 49.825 147.5 49.635 147.35 49.485C147.22 49.355 147.06 49.265 146.92 49.155C146.76 49.025 146.62 48.885 146.44 48.785L93.99 18.585C92.64 17.805 90.98 17.805 89.63 18.585L37.18 48.785C37 48.885 36.86 49.035 36.7 49.155C36.56 49.265 36.4 49.355 36.27 49.485C36.12 49.635 36.01 49.825 35.88 49.995C35.78 50.125 35.66 50.245 35.58 50.385C35.46 50.595 35.38 50.835 35.3 51.065C35.25 51.185 35.18 51.305 35.15 51.435C35.05 51.805 35 52.185 35 52.575V232.235C35 233.795 35.84 235.245 37.19 236.025L142.1 296.425C142.33 296.555 142.58 296.635 142.82 296.725C142.93 296.765 143.04 296.835 143.16 296.865C143.53 296.965 143.9 297.015 144.28 297.015C144.66 297.015 145.03 296.965 145.4 296.865C145.5 296.835 145.59 296.775 145.69 296.745C145.95 296.655 146.21 296.565 146.45 296.435L251.36 236.035C252.72 235.255 253.55 233.815 253.55 232.245V174.885L303.81 145.945C305.17 145.165 306 143.725 306 142.155V82.265C305.95 81.875 305.89 81.495 305.8 81.125ZM144.2 227.205L100.57 202.515L146.39 176.135L196.66 147.195L240.33 172.335L208.29 190.625L144.2 227.205ZM244.75 114.995V164.795L226.39 154.225L201.03 139.625V89.825L219.39 100.395L244.75 114.995ZM249.12 57.105L292.81 82.265L249.12 107.425L205.43 82.265L249.12 57.105ZM114.49 184.425L96.13 194.995V85.305L121.49 70.705L139.85 60.135V169.815L114.49 184.425ZM91.76 27.425L135.45 52.585L91.76 77.745L48.07 52.585L91.76 27.425ZM43.67 60.135L62.03 70.705L87.39 85.305V202.545V202.555V202.565C87.39 202.735 87.44 202.895 87.46 203.055C87.49 203.265 87.49 203.485 87.55 203.695V203.705C87.6 203.875 87.69 204.035 87.76 204.195C87.84 204.375 87.89 204.575 87.99 204.745C87.99 204.745 87.99 204.755 88 204.755C88.09 204.905 88.22 205.035 88.33 205.175C88.45 205.335 88.55 205.495 88.69 205.635L88.7 205.645C88.82 205.765 88.98 205.855 89.12 205.965C89.28 206.085 89.42 206.225 89.59 206.325C89.6 206.325 89.6 206.325 89.61 206.335C89.62 206.335 89.62 206.345 89.63 206.345L139.87 234.775V285.065L43.67 229.705V60.135ZM244.75 229.705L148.58 285.075V234.775L219.8 194.115L244.75 179.875V229.705ZM297.2 139.625L253.49 164.795V114.995L278.85 100.395L297.21 89.825V139.625H297.2Z"/>
</svg>

===== resources\views\components\auth-session-status.blade.php =====
@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
        {{ $status }}
    </div>
@endif

===== resources\views\components\danger-button.blade.php =====
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

===== resources\views\components\dropdown-link.blade.php =====
<a {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out']) }}>{{ $slot }}</a>

===== resources\views\components\dropdown.blade.php =====
@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
$alignmentClasses = match ($align) {
    'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
    'top' => 'origin-top',
    default => 'ltr:origin-top-right rtl:origin-top-left end-0',
};

$width = match ($width) {
    '48' => 'w-48',
    default => $width,
};
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute z-50 mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}"
            style="display: none;"
            @click="open = false">
        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>

===== resources\views\components\input-error.blade.php =====
@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

===== resources\views\components\input-label.blade.php =====
@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>

===== resources\views\components\modal.blade.php =====
@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl'
])

@php
$maxWidth = [
    'sm' => 'sm:max-w-sm',
    'md' => 'sm:max-w-md',
    'lg' => 'sm:max-w-lg',
    'xl' => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
][$maxWidth];
@endphp

<div
    x-data="{
        show: @js($show),
        focusables() {
            // All focusable element types...
            let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'
            return [...$el.querySelectorAll(selector)]
                // All non-disabled elements...
                .filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
    }"
    x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('overflow-y-hidden');
            {{ $attributes->has('focusable') ? 'setTimeout(() => firstFocusable().focus(), 100)' : '' }}
        } else {
            document.body.classList.remove('overflow-y-hidden');
        }
    })"
    x-on:open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:close-modal.window="$event.detail == '{{ $name }}' ? show = false : null"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-show="show"
    class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
    style="display: {{ $show ? 'block' : 'none' }};"
>
    <div
        x-show="show"
        class="fixed inset-0 transform transition-all"
        x-on:click="show = false"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div
        x-show="show"
        class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full {{ $maxWidth }} sm:mx-auto"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    >
        {{ $slot }}
    </div>
</div>

===== resources\views\components\nav-link.blade.php =====
@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-3 w-full px-4 py-2 rounded-lg bg-purple-600 text-white font-semibold shadow-md transition-colors duration-200'
            : 'flex items-center gap-3 w-full px-4 py-2 rounded-lg text-gray-600 hover:bg-purple-100 hover:text-purple-700 transition-colors duration-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

===== resources\views\components\notification.blade.php =====
@if (session('success'))
    <div class="mb-4 rounded-md bg-green-100 p-4 text-sm font-medium text-green-800" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-4 rounded-md bg-red-100 p-4 text-sm font-medium text-red-800" role="alert">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="mb-4 rounded-md bg-red-100 p-4 text-sm font-medium text-red-800">
        <p class="font-bold">Terjadi kesalahan:</p>
        <ul class="list-inside list-disc">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

===== resources\views\components\primary-button.blade.php =====
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

===== resources\views\components\print-layout.blade.php =====
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Cetak Dokumen' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                -webkit-print-color-adjust: exact; /* Chrome, Safari */
                color-adjust: exact; /* Firefox */
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    {{ $slot }}
</body>
</html>

===== resources\views\components\responsive-nav-link.blade.php =====
@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-400 text-start text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

===== resources\views\components\secondary-button.blade.php =====
<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

===== resources\views\components\text-input.blade.php =====
@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>

===== resources\views\dokter\jadwal\index.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jadwal Praktek Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="py-2 px-4 border-b">Hari</th>
                                    <th class="py-2 px-4 border-b">Jam Mulai</th>
                                    <th class="py-2 px-4 border-b">Jam Selesai</th>
                                    <th class="py-2 px-4 border-b">Durasi Slot (Menit)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jadwals as $jadwal)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ $jadwal->hari }}</td>
                                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}</td>
                                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</td>
                                        <td class="py-2 px-4 border-b">{{ $jadwal->durasi_slot_menit }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-4 px-4 text-center">Anda belum memiliki jadwal praktek.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\dokter\rekam-medis\create.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Buat Rekam Medis untuk: <span class="font-bold">{{ $pemesanan->pasien->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('dokter.rekam-medis.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_pemesanan" value="{{ $pemesanan->id }}">

                        {{-- Bagian Diagnosis, Perawatan, Catatan --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="diagnosis" :value="__('Diagnosis')" />
                                <x-text-input id="diagnosis" class="block mt-1 w-full" type="text" name="diagnosis"
                                    :value="old('diagnosis')" required />
                            </div>
                            <div>
                                <x-input-label for="perawatan" :value="__('Perawatan')" />
                                <x-text-input id="perawatan" class="block mt-1 w-full" type="text" name="perawatan"
                                    :value="old('perawatan')" required />
                            </div>
                            <div class="md:col-span-2">
                                <x-input-label for="catatan" :value="__('Catatan Tambahan (Opsional)')" />
                                <textarea id="catatan" name="catatan" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" rows="3">{{ old('catatan') }}</textarea>
                            </div>
                        </div>

                        @php
                            $openKategoriId = '';
                            if ($daftarTindakans && $tindakanAwalIds) {
                                foreach ($daftarTindakans as $kategori) {
                                    if (
                                        count(
                                            array_intersect(
                                                $kategori->tindakanItems->pluck('id')->toArray(),
                                                $tindakanAwalIds,
                                            ),
                                        ) > 0
                                    ) {
                                        $openKategoriId = $kategori->id;
                                        break;
                                    }
                                }
                            }
                        @endphp

                        {{-- [MODIFIKASI] Blok untuk Tindakan yang Dipilih Pasien --}}
                        <div class="mt-6 border-t pt-6" x-data="{ openKategori: '{{ $openKategoriId }}_pasien' }">

                            <h3 class="text-lg font-bold mb-4">Tindakan Medis Dipilih Pasien</h3>
                            <div class="space-y-2">
                                @foreach ($daftarTindakans as $kategori)
                                    @php
                                        $pilihanPasien = $kategori->tindakanItems->whereIn('id', $tindakanAwalIds);
                                    @endphp
                                    @if ($pilihanPasien->isNotEmpty())
                                        <div class="border rounded-md overflow-hidden">
                                            <button type="button"
                                                @click="openKategori = (openKategori === '{{ $kategori->id }}_pasien' ? '' : '{{ $kategori->id }}_pasien')"
                                                class="w-full flex justify-between items-center p-3 text-left font-semibold text-gray-700 bg-gray-50 hover:bg-gray-100">
                                                <span>{{ $kategori->nama_kategori }}</span>
                                                <svg class="w-5 h-5 transform transition-transform"
                                                    :class="{ 'rotate-180': openKategori === '{{ $kategori->id }}_pasien' }"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </button>
                                            <div x-show="openKategori === '{{ $kategori->id }}_pasien'" x-collapse
                                                class="p-4 bg-blue-50">
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                                    @foreach ($pilihanPasien as $tindakan)
                                                        <label
                                                            class="flex items-center space-x-2 p-2 border rounded-md bg-white cursor-not-allowed">
                                                            <input type="checkbox" value="{{ $tindakan->id }}"
                                                                class="tindakan-checkbox rounded border-gray-300"
                                                                data-harga="{{ $tindakan->harga }}" checked disabled>
                                                            <input type="hidden" name="tindakans[]"
                                                                value="{{ $tindakan->id }}">
                                                            <span>{{ $tindakan->keterangan }} <span
                                                                    class="text-gray-500">(Rp
                                                                    {{ number_format($tindakan->harga, 0, ',', '.') }})</span></span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        {{-- [MODIFIKASI] Blok untuk Tindakan Tambahan Dokter --}}
                        <div class="mt-6 border-t pt-6" x-data="{ openKategori: '' }">
                            <h3 class="text-lg font-bold mb-4">Tindakan Medis Tambahan Dokter</h3>
                            <div class="space-y-2">
                                @foreach ($daftarTindakans as $kategori)
                                    @php
                                        $tindakanLain = $kategori->tindakanItems->whereNotIn('id', $tindakanAwalIds);
                                    @endphp
                                    @if ($tindakanLain->isNotEmpty())
                                        <div class="border rounded-md overflow-hidden">
                                            <button type="button"
                                                @click="openKategori = (openKategori === '{{ $kategori->id }}_dokter' ? '' : '{{ $kategori->id }}_dokter')"
                                                class="w-full flex justify-between items-center p-3 text-left font-semibold text-gray-700 bg-gray-50 hover:bg-gray-100">
                                                <span>{{ $kategori->nama_kategori }}</span>
                                                <svg class="w-5 h-5 transform transition-transform"
                                                    :class="{ 'rotate-180': openKategori === '{{ $kategori->id }}_dokter' }"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </button>
                                            <div x-show="openKategori === '{{ $kategori->id }}_dokter'" x-collapse
                                                class="p-4">
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                                    @foreach ($tindakanLain as $tindakan)
                                                        <label
                                                            class="flex items-center space-x-2 p-2 border rounded-md bg-white hover:bg-gray-100">
                                                            <input type="checkbox" name="tindakans[]"
                                                                value="{{ $tindakan->id }}"
                                                                class="tindakan-checkbox rounded border-gray-300"
                                                                data-harga="{{ $tindakan->harga }}"
                                                                {{ in_array($tindakan->id, old('tindakans', [])) ? 'checked' : '' }}>
                                                            <span>
                                                                {{ $tindakan->keterangan }}
                                                                <span class="text-gray-500">(Rp
                                                                    {{ number_format($tindakan->harga, 0, ',', '.') }})</span>
                                                            </span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        {{-- Bagian Resep, Foto, dan Total Biaya --}}
                        <div class="mt-6 border-t pt-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-bold">Resep Obat</h3>
                                <button type="button" id="tambah-resep"
                                    class="px-3 py-1 bg-green-500 text-white rounded-md text-sm hover:bg-green-600">Tambah
                                    Obat</button>
                            </div>
                            <div id="resep-container" class="space-y-4"></div>
                        </div>

                        <div class="mt-6 border-t pt-6">
                            <h3 class="text-lg font-bold mb-4">Foto Pendukung (Opsional)</h3>
                            <input type="file" name="foto[]" multiple
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100" />
                        </div>

                        <div class="mt-6 border-t pt-6">
                            <div class="space-y-3 max-w-md ml-auto">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Subtotal Tindakan</span>
                                    <span id="subtotal-tindakan" class="font-semibold text-gray-800">Rp 0</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Subtotal Obat</span>
                                    <span id="subtotal-obat" class="font-semibold text-gray-800">Rp 0</span>
                                </div>
                        
                                {{-- Potongan BPJS --}}
                                @if ($pemesanan->status_pasien == 'BPJS')
                                    <div id="baris-potongan-tindakan" 
                                        class="flex justify-between items-center text-red-600" style="display: none;">
                                        <span>Potongan BPJS Tindakan</span>
                                        <span id="potongan-tindakan-display">- Rp 0</span>
                                    </div>
                                    <div id="baris-potongan-obat" 
                                        class="flex justify-between items-center text-red-600" style="display: none;">
                                        <span>Potongan BPJS Obat</span>
                                        <span id="potongan-obat-display">- Rp 0</span>
                                    </div>
                                @endif
                        
                                {{-- Potongan Inhealth --}}
                                @if ($pemesanan->status_pasien == 'Inhealth')
                                    <div class="flex justify-between items-center">
                                        <label for="potongan" class="text-gray-600">Potongan Inhealth</label>
                                        <div class="flex items-center">
                                            <span class="mr-2 text-gray-500">Rp.</span>
                                            <x-text-input type="number" name="potongan" id="potongan"
                                                value="{{ old('potongan', 0) }}" min="0"
                                                class="text-right w-36" oninput="calculateTotal()" />
                                        </div>
                                    </div>
                                @endif
                        
                                {{-- Total Akhir --}}
                                <div class="flex justify-between items-center border-t pt-3">
                                    <h3 class="text-lg font-bold text-gray-800">Total Akhir</h3>
                                    <span id="total-biaya" class="text-xl font-bold text-purple-600">Rp 0</span>
                                </div>
                            </div>
                        </div>
                        
                        



                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('dokter.dashboard') }}"
                                class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">Simpan Rekam
                                Medis</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        {{-- Script tidak berubah, karena logika kalkulasi tetap sama --}}
        <script>
            const obats = @json($obats);
            const statusPasien = @json($pemesanan->status_pasien);

            document.addEventListener('DOMContentLoaded', function() {
                const resepContainer = document.getElementById('resep-container');
                const addButton = document.getElementById('tambah-resep');
                const subtotalBiayaEl = document.getElementById('subtotal-biaya');
                const totalBiayaEl = document.getElementById('total-biaya');
                const barisPotonganBpjs = document.getElementById('baris-potongan-bpjs');
                const potonganBpjsDisplay = document.getElementById('potongan-bpjs-display');

                window.calculateTotal = function() {
    let subtotalTindakan = 0;
    let subtotalObat = 0;
    let potonganTindakan = 0;
    let potonganObat = 0;

    // === Hitung tindakan
    document.querySelectorAll('.tindakan-checkbox:not(:disabled):checked, .tindakan-checkbox:disabled')
        .forEach(checkbox => {
            let hargaTindakan = parseFloat(checkbox.dataset.harga) || 0;
            subtotalTindakan += hargaTindakan;

            if (statusPasien === 'BPJS') {
                potonganTindakan += 2500; // potongan per tindakan
            }
        });

    // === Hitung obat
    document.querySelectorAll('#resep-container .resep-row').forEach(row => {
        const obatSelect = row.querySelector('.obat-select');
        const jumlah = parseFloat(row.querySelector('.jumlah-input').value) || 0;
        const tipeHarga = row.querySelector('.tipe-harga-select').value;
        const hargaDisplay = row.querySelector('.harga-obat');

        if (obatSelect && obatSelect.value && jumlah > 0) {
            const selectedOption = obatSelect.options[obatSelect.selectedIndex];
            let hargaSatuan = tipeHarga === 'resep'
                ? parseFloat(selectedOption.dataset.hargaResep)
                : parseFloat(selectedOption.dataset.hargaNonresep);

            subtotalObat += hargaSatuan * jumlah;
            hargaDisplay.value = 'Rp ' + (hargaSatuan * jumlah).toLocaleString('id-ID');

            if (statusPasien === 'BPJS') {
                potonganObat += hargaSatuan * jumlah; // seluruh harga obat gratis
            }
        } else {
            hargaDisplay.value = 'Rp 0';
        }
    });

    // Update subtotal tampilan
    document.getElementById('subtotal-tindakan').textContent =
        'Rp ' + subtotalTindakan.toLocaleString('id-ID');
    document.getElementById('subtotal-obat').textContent =
        'Rp ' + subtotalObat.toLocaleString('id-ID');

    // Potongan BPJS
    if (statusPasien === 'BPJS') {
        // tampilkan potongan tindakan
        const barisPotTind = document.getElementById('baris-potongan-tindakan');
        const potTindDisp = document.getElementById('potongan-tindakan-display');
        if (potonganTindakan > 0) {
            barisPotTind.style.display = 'flex';
            potTindDisp.textContent = '- Rp ' + potonganTindakan.toLocaleString('id-ID');
        } else {
            barisPotTind.style.display = 'none';
        }

        // tampilkan potongan obat
        const barisPotObat = document.getElementById('baris-potongan-obat');
        const potObatDisp = document.getElementById('potongan-obat-display');
        if (potonganObat > 0) {
            barisPotObat.style.display = 'flex';
            potObatDisp.textContent = '- Rp ' + potonganObat.toLocaleString('id-ID');
        } else {
            barisPotObat.style.display = 'none';
        }
    }

    // Potongan Inhealth
    let potonganInhealth = 0;
    if (statusPasien === 'Inhealth') {
        const potonganEl = document.getElementById('potongan');
        if (potonganEl) {
            potonganInhealth = parseFloat(potonganEl.value) || 0;
        }
    }

    // Total akhir
    const totalAkhir = Math.max(0, subtotalTindakan + subtotalObat - potonganTindakan - potonganObat - potonganInhealth);
    document.getElementById('total-biaya').textContent = 'Rp ' + totalAkhir.toLocaleString('id-ID');
}





                let resepIndex = 0;


                function addResepRow() {
                    const selectId = `select-obat-${resepIndex}`;
                    const row = document.createElement('div');
                    row.classList.add('resep-row', 'p-4', 'border', 'rounded-md', 'bg-gray-50', 'space-y-3');
                    row.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            <div>
                <label class="block text-sm font-medium text-gray-700">Pilih Obat</label>
                <select id="${selectId}" name="resep[${resepIndex}][obat_id]" class="obat-select" required>
                    <option value="">-- Pilih dari Stok --</option>
                    ${obats.map(obat =>
                        `<option value="${obat.id}" 
                                                                                                 data-harga-resep="${obat.harga_jual_resep}" 
                                                                                                 data-harga-nonresep="${obat.harga_jual_non_resep}">
                                                                                            ${obat.nama_obat} (Stok: ${obat.stok})
                                                                                         </option>`
                    ).join('')}
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Tipe Harga</label>
                <select name="resep[${resepIndex}][tipe_harga]" 
                        class="tipe-harga-select mt-1 block w-full rounded-md border-gray-300" required>
                    <option value="resep">Harga Resep</option>
                    <option value="non_resep">Harga Non-Resep</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input type="number" name="resep[${resepIndex}][jumlah]" 
                       class="jumlah-input mt-1 block w-full rounded-md border-gray-300" 
                       min="1" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="text" class="harga-obat mt-1 block w-full rounded-md border-gray-300 bg-gray-100 text-right" 
                       value="Rp 0" readonly>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Dosis</label>
                <input type="text" name="resep[${resepIndex}][dosis]" 
                       class="mt-1 block w-full rounded-md border-gray-300">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Instruksi</label>
                <input type="text" name="resep[${resepIndex}][instruksi]" 
                       class="mt-1 block w-full rounded-md border-gray-300">
            </div>
        </div>
        <button type="button" class="hapus-resep text-red-500 text-sm hover:text-red-700">Hapus</button>
    `;
                    resepContainer.appendChild(row);
                    new TomSelect(`#${selectId}`, {
                        create: false,
                        sortField: {
                            field: "text",
                            direction: "asc"
                        }
                    });
                    resepIndex++;
                }


                addButton.addEventListener('click', addResepRow);
                document.body.addEventListener('change', (e) => {
                    if (e.target.matches(
                            '.tindakan-checkbox, .obat-select, .tipe-harga-select, .jumlah-input')) {
                        calculateTotal();
                    }
                });
                document.body.addEventListener('input', (e) => {
                    if (e.target.matches('.jumlah-input')) {
                        calculateTotal();
                    }
                });
                document.body.addEventListener('click', (e) => {
                    if (e.target.classList.contains('hapus-resep')) {
                        e.target.closest('.resep-row').remove();
                        calculateTotal();
                    }
                });

                addResepRow();
                calculateTotal(); // <-- INI YANG AKTIFKAN
            });
        </script>
    @endpush
</x-app-layout>

===== resources\views\dokter\rekam-medis\index.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ringkasan Rekam Medis per Pasien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Form Pencarian -->
                    <form method="GET" action="{{ route('dokter.rekam-medis.index') }}" class="mb-6">
                        <div class="flex items-center">
                            <x-text-input type="text" name="search" placeholder="Cari nama pasien..."
                                class="w-full md:w-1/3" value="{{ request('search') }}" />
                            <x-primary-button class="ms-3">Cari</x-primary-button>
                        </div>
                    </form>

                    <!-- Tabel Ringkasan -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left">NIK</th>
                                    <th class="py-3 px-4 border-b text-left">Nama Pasien</th>
                                    <th class="py-3 px-4 border-b text-center">Jumlah Kunjungan</th>
                                    <th class="py-3 px-4 border-b text-left">Diagnosis Terakhir</th>
                                    <th class="py-3 px-4 border-b text-left">Terakhir Kunjungan</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pasienRingkas as $row)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b">{{ $row->nik_pasien }}</td>
                                        <td class="py-3 px-4 border-b">{{ $row->nama_pasien }}</td>
                                        <td class="py-3 px-4 border-b text-center">{{ $row->jumlah_kunjungan }}</td>
                                        <td class="py-3 px-4 border-b">{{ Str::limit($row->diagnosis_terakhir, 50) }}</td>
                                        <td class="py-3 px-4 border-b">
                                            {{ \Carbon\Carbon::parse($row->terakhir_kunjungan)->translatedFormat('d F Y') }}
                                        </td>
                                        <td class="py-3 px-4 border-b text-center">
                                            <a href="{{ route('dokter.rekam-medis.pasien', $row->pasien_id) }}"
                                                class="text-purple-600 hover:text-purple-800 font-semibold">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-4 px-4 text-center text-gray-500">
                                            Tidak ada data rekam medis.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginasi -->
                    <div class="mt-6">
                        {{ $pasienRingkas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\dokter\rekam-medis\pasien.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Riwayat Rekam Medis Pasien: <span class="font-bold">{{ $pasien->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left w-16">No.</th>
                                    <th class="py-3 px-4 border-b text-left">Tanggal Kunjungan</th>
                                    <th class="py-3 px-4 border-b text-left">Diagnosis / Perawatan</th>
                                    <th class="py-3 px-4 border-b text-left">Tindakan</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rekamMedisList as $index => $rekamMedis)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b">{{ $rekamMedisList->firstItem() + $index }}</td>
                                        <td class="py-3 px-4 border-b">{{ $rekamMedis->created_at->isoFormat('D MMMM YYYY') }}</td>
                                        <td class="py-3 px-4 border-b">{{ $rekamMedis->diagnosis }}</td>
                                        <td class="py-3 px-4 border-b">
                                            @if($rekamMedis->tindakan->isNotEmpty())
                                                <ul class="list-disc list-inside text-sm">
                                                    @foreach($rekamMedis->tindakan as $tindakan)
                                                        {{-- [FIX] Menggunakan 'keterangan' sesuai struktur database baru --}}
                                                        <li>{{ $tindakan->keterangan }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="py-3 px-4 border-b text-center">
                                            <a href="{{ route('dokter.rekam-medis.show', $rekamMedis->id) }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                                                Lihat Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-4 px-4 text-center text-gray-500">
                                            Pasien ini belum memiliki riwayat rekam medis.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $rekamMedisList->links() }}
                    </div>
                    <div class="mt-8 pt-6 text-right">
                        <a href="{{ route('dokter.rekam-medis.index') }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                            &larr; Kembali ke Riwayat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\dokter\rekam-medis\show.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Rekam Medis') }}
            </h2>
            <a href="{{ route('dokter.rekam-medis.pasien', $rekamMedis->pemesanan->pasien) }}"
                class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 text-sm">
                &larr; Kembali ke Riwayat
            </a>
        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="flex items-center  pl-4 pt-4">
                    <img src="{{ asset('images/logodeliyana.png') }}" alt="Logo Deliyana Dental Care"
                        class="w-14 h-14 object-contain mr-4">
                    <div>
                        <h1 class="text-2xl font-bold text-purple-700 leading-tight">Deliyana Dental Care</h1>
                    </div>
                </div>
                


                <div class="p-6 md:p-8 bg-white border-b border-gray-200">

                    <div class="grid grid-cols-2 gap-4 mb-6 pb-6 border-b bg">
                        <div>
                            <h3 class="text-sm text-gray-500">Pasien</h3>
                            <p class="font-bold text-lg text-gray-800">{{ $rekamMedis->pemesanan->pasien->name }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-500">Status Pasien</h3>
                            <p class="font-bold text-lg text-gray-800">{{ $rekamMedis->pemesanan->status_pasien }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-500">Nomor BPJS</h3>
                        <p class="font-bold text-lg text-gray-800">{{ $rekamMedis->pemesanan->nomor_bpjs }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-500">Tanggal Perawatan</h3>
                            <p class="font-bold text-lg text-gray-800">
                                {{ $rekamMedis->created_at->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <h4 class="font-semibold text-gray-700">Diagnosis</h4>
                            <p class="mt-1 text-gray-600">{{ $rekamMedis->diagnosis }}</p>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-700">Perawatan</h4>
                            <p class="mt-1 text-gray-600">{{ $rekamMedis->perawatan }}</p>
                        </div>
                        @if ($rekamMedis->catatan)
                            <div>
                                <h4 class="font-semibold text-gray-700">Catatan Tambahan</h4>
                                <p class="mt-1 text-gray-600">{{ $rekamMedis->catatan }}</p>
                            </div>
                        @endif
                    </div>
                    @if ($rekamMedis->foto->isNotEmpty())
                        <div class="mt-6 border-t pt-6">
                            <h4 class="text-lg font-semibold mb-4 text-gray-800">Foto Pendukung</h4>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                @foreach ($rekamMedis->foto as $foto)
                                    <a href="{{ asset('storage/' . $foto->path_foto) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $foto->path_foto) }}" alt="Foto Rekam Medis"
                                            class="rounded-lg object-cover w-full h-32 hover:opacity-80 transition">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    
                    <div class="mt-6 border-t pt-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Rincian Tagihan</h3>

                        @php
                            // Pisahkan tindakan awal pasien & tambahan dokter
                            $tindakanPasien = $rekamMedis->tindakan->whereIn(
                                'id',
                                $rekamMedis->pemesanan->tindakanAwal->pluck('id')->toArray(),
                            );
                            $tindakanDokter = $rekamMedis->tindakan->whereNotIn(
                                'id',
                                $rekamMedis->pemesanan->tindakanAwal->pluck('id')->toArray(),
                            );

                            $subtotalTindakan = $rekamMedis->tindakan->sum(fn($t) => $t->pivot->harga_saat_itu);
                            $subtotalObat = $rekamMedis->resep->sum(fn($r) => $r->jumlah * $r->harga_saat_resep);
                            $jumlahTindakan = $rekamMedis->tindakan->count();
                            $pembayaran = $rekamMedis->pemesanan->pembayaran;

                            // Default
                            $potonganTindakan = 0;
                            $potonganObat = 0;
                            $potonganInhealth = 0;

                            if ($rekamMedis->pemesanan->status_pasien == 'BPJS') {
                                $potonganTindakan = $jumlahTindakan * 2500;
                                $potonganObat = $subtotalObat;
                            }

                            if ($rekamMedis->pemesanan->status_pasien == 'Inhealth' && $pembayaran) {
                                $potonganInhealth = $pembayaran->potongan;
                            }
                        @endphp

                        {{-- TINDAKAN PILIHAN PASIEN --}}
                        @if ($tindakanPasien->isNotEmpty())
                            <div class="mb-4">
                                <h4 class="text-md font-semibold text-gray-700 mb-2">Tindakan Pilihan Pasien</h4>
                                <div class="space-y-1">
                                    @foreach ($tindakanPasien as $tindakan)
                                        <div class="flex justify-between items-center text-sm">
                                            <span class="text-gray-600">
                                                {{ $tindakan->daftarTindakan->nama_kategori ?? '-' }} â€”
                                                {{ $tindakan->keterangan }}
                                            </span>
                                            <span class="font-medium text-gray-800">
                                                Rp {{ number_format($tindakan->pivot->harga_saat_itu, 0, ',', '.') }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- TINDAKAN TAMBAHAN DOKTER --}}
                        @if ($tindakanDokter->isNotEmpty())
                            <div class="mb-4 pt-4 border-t border-dashed">
                                <h4 class="text-md font-semibold text-gray-700 mb-2">Tindakan Tambahan Dokter</h4>
                                <div class="space-y-1">
                                    @foreach ($tindakanDokter as $tindakan)
                                        <div class="flex justify-between items-center text-sm">
                                            <span class="text-gray-600">
                                                {{ $tindakan->daftarTindakan->nama_kategori ?? '-' }} â€”
                                                {{ $tindakan->keterangan }}
                                            </span>
                                            <span class="font-medium text-gray-800">
                                                Rp {{ number_format($tindakan->pivot->harga_saat_itu, 0, ',', '.') }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- BIAYA OBAT / RESEP --}}
                        @if ($rekamMedis->resep->isNotEmpty())
                            <div class="pt-4 mt-4 border-t border-dashed">
                                <h4 class="text-md font-semibold text-gray-700 mb-2">Biaya Obat</h4>
                                @foreach ($rekamMedis->resep as $item)
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="text-gray-600">
                                            {{ $item->obat->nama_obat }} ({{ $item->jumlah }} x Rp
                                            {{ number_format($item->harga_saat_resep, 0, ',', '.') }})
                                        </span>
                                        <span class="font-medium text-gray-800">
                                            Rp
                                            {{ number_format($item->jumlah * $item->harga_saat_resep, 0, ',', '.') }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- SUBTOTAL --}}
                        <div class="mt-4">
                            <div class="pt-4 mt-4 border-t border-dashed">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Subtotal Tindakan</span>
                                    <span class="font-medium text-gray-800">Rp
                                        {{ number_format($subtotalTindakan, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Subtotal Obat</span>
                                    <span class="font-medium text-gray-800">Rp
                                        {{ number_format($subtotalObat, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- POTONGAN --}}
                        @if ($rekamMedis->pemesanan->status_pasien == 'BPJS')
                            <div class="flex justify-between items-center text-red-600">
                                <span>Potongan BPJS Tindakan</span>
                                <span>- Rp {{ number_format($potonganTindakan, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center text-red-600">
                                <span>Potongan BPJS Obat</span>
                                <span>- Rp {{ number_format($potonganObat, 0, ',', '.') }}</span>
                            </div>
                        @elseif ($rekamMedis->pemesanan->status_pasien == 'Inhealth' && $potonganInhealth > 0)
                            <div class="flex justify-between items-center text-red-600">
                                <span>Potongan Inhealth</span>
                                <span>- Rp {{ number_format($potonganInhealth, 0, ',', '.') }}</span>
                            </div>
                        @endif

                        {{-- TOTAL --}}
                        @if ($pembayaran)
                            <div class="flex justify-between items-center p-3 mt-4 bg-purple-50 rounded-lg">
                                <span class="font-bold text-purple-800">Total Biaya Keseluruhan</span>
                                <span class="font-bold text-lg text-purple-900">
                                    Rp {{ number_format($pembayaran->total_biaya, 0, ',', '.') }}
                                </span>
                            </div>
                        @endif
                    </div>
                    {{-- AKHIR MODIFIKASI --}}







                    @if ($rekamMedis->resep->isNotEmpty())
                        <div class="mt-6 border-t pt-6">
                            <h4 class="text-lg font-semibold mb-4 text-gray-800">Detail Resep Obat</h4>
                            <ul class="list-disc list-inside space-y-2 text-gray-600">
                                @foreach ($rekamMedis->resep as $item)
                                    <li><strong>{{ $item->obat->nama_obat }}</strong> - {{ $item->jumlah }}
                                        {{ $item->obat->kemasan }}. Dosis: {{ $item->dosis }}. Instruksi:
                                        {{ $item->instruksi }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\dokter\dashboard.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Dokter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Header Judul --}}
                    <h3 class="text-lg font-semibold mb-4">
                        Antrian Pasien ({{ \Carbon\Carbon::now()->translatedFormat('d F Y') }})
                    </h3>

                    {{-- AWAL MODIFIKASI: Tambah filter tanggal --}}
                    <form method="GET" action="{{ route('dokter.dashboard') }}" class="flex flex-wrap items-end gap-4 mb-6">
                        <div>
                            <x-input-label for="tanggal" value="Tanggal" />
                            <x-text-input id="tanggal" name="tanggal" type="date"
                                value="{{ request('tanggal') ?? now()->toDateString() }}"
                                class="mt-1 block w-full" />
                        </div>

                        <div>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">
                                Tampilkan
                            </x-primary-button>

                            @if (request()->has('tanggal'))
                                <a href="{{ route('dokter.dashboard') }}"
                                    class="ml-2 text-sm text-gray-600 hover:text-purple-700">
                                    Reset
                                </a>
                            @endif
                        </div>
                    </form>
                    {{-- AKHIR MODIFIKASI --}}

                    {{-- AWAL MODIFIKASI: Tabel antrian pasien dirapikan --}}
<div class="overflow-x-auto">
    <table class="min-w-full border border-gray-200 rounded-lg shadow-sm">
        <thead class="bg-purple-100 text-purple-800">
            <tr>
                <th class="py-3 px-4 text-left text-sm font-semibold border-b border-gray-200">Waktu</th>
                <th class="py-3 px-4 text-left text-sm font-semibold border-b border-gray-200">Nama Pasien & Keluhan</th>
                <th class="py-3 px-4 text-left text-sm font-semibold border-b border-gray-200">Status</th>
                <th class="py-3 px-4 text-center text-sm font-semibold border-b border-gray-200">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse ($pemesananHariIni as $pemesanan)
                <tr class="hover:bg-purple-50 transition-colors">
                    <td class="py-3 px-4 align-top text-gray-700 whitespace-nowrap">
                        {{ \Carbon\Carbon::parse($pemesanan->waktu_pesan)->format('H:i') }}
                    </td>

                    <td class="py-3 px-4 align-top">
                        {{-- Nama Pasien --}}
                        <div class="font-semibold text-gray-900">{{ $pemesanan->pasien->name }}</div>

                        {{-- Keluhan Awal --}}
                        {{-- AWAL MODIFIKASI: tampilkan kategori + keterangan + harga tindakan --}}
@if ($pemesanan->tindakanAwal->isNotEmpty())
<div class="text-xs text-gray-600 mt-1 space-x-1">
    <span class="font-medium text-gray-500">Keluhan:</span>
    @foreach ($pemesanan->tindakanAwal as $tindakan)
        <span class="inline-block bg-purple-100 text-purple-800 px-2 py-0.5 rounded-full mb-1">
            {{ $tindakan->daftarTindakan->nama_kategori ?? '-' }} â€” {{ $tindakan->keterangan }} â€”
            Rp {{ number_format($tindakan->harga, 0, ',', '.') }}
        </span>
    @endforeach
</div>
@endif
{{-- AKHIR MODIFIKASI --}}

                    </td>

                    <td class="py-3 px-4 align-top">
                        <span
                            class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                            {{ $pemesanan->status === 'Dikonfirmasi' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                            {{ $pemesanan->status }}
                        </span>
                    </td>

                    <td class="py-3 px-4 align-top text-center">
                        <a href="{{ route('dokter.rekam-medis.create', ['id_pemesanan' => $pemesanan->id]) }}"
                            class="inline-block text-sm font-semibold text-white bg-green-600 hover:bg-green-700 px-4 py-1.5 rounded-md shadow-sm transition">
                            Proses
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="py-6 px-4 text-center text-gray-600">
                        Tidak ada antrian untuk tanggal ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{-- AKHIR MODIFIKASI --}}


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\layouts\app.blade.php =====
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{ $header_scripts ?? '' }}
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
</head>

<body x-data="{ sidebarOpen: false }" class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">

        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 w-64 z-30 bg-white border-r border-gray-200 transform transition-transform duration-200 ease-in-out md:relative md:translate-x-0 md:z-auto">
            @include('layouts.navigation')
        </div>

        <!-- Overlay -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false" x-cloak
            class="fixed inset-0 bg-black bg-opacity-25 z-20 md:hidden"></div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col w-full">

            <!-- Mobile topbar -->
            <header class="bg-white border-b px-4 py-3 flex items-center justify-between md:hidden relative">
                <!-- Tombol hamburger -->
                <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- Judul di tengah -->
                <div class="absolute left-1/2 transform -translate-x-1/2 text-lg font-bold text-gray-800">
                    {{ config('app.name', 'MY APP') }}
                </div>
            </header>


            <!-- Optional header (desktop only) -->
            @isset($header)
                <header class="bg-white shadow hidden md:block">
                    <div class="px-6 py-7">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
</body>

</html>

===== resources\views\layouts\guest.blade.php =====
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .bg-gradient-purple-auth {
            background: linear-gradient(135deg, #8B5CF6, #5B21B6);
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen grid grid-cols-1 md:grid-cols-2">
        <!-- Kolom Kiri (Branding) -->
        <div class="hidden md:flex flex-col justify-center items-center p-12 bg-gradient-purple-auth text-white text-center">
            <a href="/" class="flex items-center mb-6 text-3xl font-bold">
                {{-- <img src="{{ asset('images/logodeliyana.png') }}" alt="Logo Deliyana Dental Care"
                            class="h-10 w-10 mr-2"> --}}
                Deliyana Dental Care
            </a>
            <p class="max-w-md">
                Memberikan layanan terbaik untuk senyum sehat Anda. Daftar atau masuk untuk mengatur janji temu Anda dengan mudah.
            </p>
            <img src="{{ asset('images/deli.jpeg') }}" alt="Ilustrasi Klinik Gigi" class="mt-8 rounded-lg">
        </div>

        <!-- Kolom Kanan (Form) -->
        <div class="flex flex-col justify-center items-center p-6 sm:p-12 bg-slate-50">
            <div class="w-full sm:max-w-md">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>

===== resources\views\layouts\navigation.blade.php =====
<aside class="h-full flex flex-col bg-white border-r border-gray-200 md:h-screen md:sticky md:top-0">
    <!-- Logo -->
    <div class="p-6 border-b border-gray-200">
        <a href="{{ route('dashboard') }}" 
           class="flex items-center gap-3 whitespace-nowrap">
            <img src="{{ asset('images/logodeliyana.png') }}" 
                 alt="Logo Deliyana Dental Care"
                 class="h-8 w-10">
            <span class="text-l font-bold text-purple-800">
                Deliyana Dental Care
            </span>
        </a>
    </div>
    

    <!-- Nav Links -->
    <nav class="flex-1 px-4 py-6 space-y-2">
        @if (Auth::user()->peran == 'admin')
            {{-- Menu untuk Admin --}}
            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span>{{ __('Dashboard') }}</span>
            </x-nav-link>
            <x-nav-link :href="route('admin.pasien.index')" :active="request()->routeIs('admin.pasien.*')">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21v-2a6 6 0 00-12 0v2"></path></svg>
                <span>{{ __('Kelola Pasien') }}</span>
            </x-nav-link>
            <x-nav-link :href="route('admin.dokter.index')" :active="request()->routeIs('admin.dokter.*')">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <span>{{ __('Kelola Dokter') }}</span>
            </x-nav-link>
            <x-nav-link :href="route('admin.jadwal.index')" :active="request()->routeIs('admin.jadwal.*')">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span>{{ __('Kelola Jadwal') }}</span>
            </x-nav-link>
            <x-nav-link :href="route('admin.pemesanan.index')" :active="request()->routeIs('admin.pemesanan.*')">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                <span>{{ __('Kelola Pemesanan') }}</span>
            </x-nav-link>
            <x-nav-link :href="route('admin.tindakan.index')" :active="request()->routeIs('admin.tindakan.*')">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span>{{ __('Kelola Tindakan') }}</span>
            </x-nav-link>
            <x-nav-link :href="route('admin.pembayaran.index')" :active="request()->routeIs('admin.pembayaran.*')">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <span>{{ __('Kelola Pembayaran') }}</span>
            </x-nav-link>
            <x-nav-link :href="route('admin.laporan.index')" :active="request()->routeIs('admin.laporan.*')">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span>{{ __('Laporan Klinik') }}</span>
            </x-nav-link>
            <x-nav-link :href="route('admin.obat.index')" :active="request()->routeIs('admin.obat.*')">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                <span>{{ __('Kelola Obat') }}</span>
            </x-nav-link>
        @elseif (Auth::user()->peran == 'dokter')
            {{-- Menu untuk Dokter --}}
            <x-nav-link :href="route('dokter.dashboard')" :active="request()->routeIs('dokter.dashboard')">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span>{{ __('Dashboard') }}</span>
            </x-nav-link>
            <x-nav-link :href="route('dokter.jadwal.index')" :active="request()->routeIs('dokter.jadwal.*')">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span>{{ __('Jadwal Saya') }}</span>
            </x-nav-link>
            <x-nav-link :href="route('dokter.rekam-medis.index')" :active="request()->routeIs('dokter.rekam-medis.*')">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3h2m-4 3h2m-4 3h2m-4 3h2"></path></svg>
                <span>{{ __('Riwayat Rekam Medis') }}</span>
            </x-nav-link>

        @elseif (Auth::user()->peran == 'pasien')
            {{-- Menu untuk Pasien --}}
            <x-nav-link :href="route('pasien.dashboard')" :active="request()->routeIs('pasien.dashboard')">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span>{{ __('Dashboard') }}</span>
            </x-nav-link>
            <x-nav-link :href="route('pasien.pemesanan.create')" :active="request()->routeIs('pasien.pemesanan.create')">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{ __('Buat Janji Temu') }}</span>
            </x-nav-link>
            <x-nav-link :href="route('pasien.pemesanan.index')" :active="request()->routeIs('pasien.pemesanan.index')">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                <span>{{ __('Riwayat Pemesanan') }}</span>
            </x-nav-link>
        @endif
    </nav>
    
    <!-- User Dropdown -->
    <div class="px-4 py-4 border-t border-gray-200">
        <div x-data="{ open: false }" class="relative">
            <!-- Tombol Dropdown -->
            <button @click="open = !open"
                class="w-full flex items-center justify-between px-4 py-2 text-sm font-medium text-left bg-gray-50 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                <span>{{ Auth::user()->name }}</span>
                <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transform transition-transform" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Menu Dropdown (muncul ke atas) -->
            <div x-show="open" 
                 @click.away="open = false" 
                 x-cloak 
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute bottom-full w-full mb-2 bg-white rounded-md shadow-lg border text-sm text-gray-700">
                
                <a href="{{ route('profile.edit') }}"
                    class="block w-full text-left px-4 py-2 hover:bg-gray-100 rounded-t-md">
                    {{ __('Profile') }}
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="block w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 hover:text-red-700 rounded-b-md">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>

===== resources\views\pasien\pemesanan\create.blade.php =====
<x-app-layout>
    {{-- Tambahkan CSS Tom Select di header --}}
    <x-slot name="header_scripts">
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Janji Temu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-8" 
                 x-data="bookingForm()">
                
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Formulir Janji Temu</h3>
                <x-notification />

                <form method="POST" action="{{ route('pasien.pemesanan.store') }}">
                    @csrf
                    
                    {{-- LANGKAH 1: DATA DIRI --}}
                    <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0">
                        <h4 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">Langkah 1: Data Diri Pasien</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="nama_pasien_booking" value="Nama Pasien" />
                                <x-text-input id="nama_pasien_booking" class="block mt-1 w-full" type="text" name="nama_pasien_booking" x-model="formData.nama_pasien_booking" required />
                            </div>
                            <div>
                                <x-input-label for="nik" value="NIK" />
                                <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" x-model="formData.nik" />
                            </div>
                            <div class="md:col-span-2">
                                <x-input-label for="status_pasien" value="Status Pasien" />
                                <select id="status_pasien" name="status_pasien" x-model="formData.status_pasien" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="BPJS">BPJS</option>
                                    <option value="Umum">Umum</option>
                                    <option value="Inhealth">Inhealth</option>
                                </select>
                            </div>
                            <div x-show="formData.status_pasien === 'BPJS'" x-transition>
                                <x-input-label for="nomor_bpjs" value="Nomor BPJS" />
                                <x-text-input id="nomor_bpjs" class="block mt-1 w-full" type="text" name="nomor_bpjs" x-model="formData.nomor_bpjs" />
                            </div>
                        </div>
                        <div class="flex justify-end mt-6">
                            <button type="button" @click="nextStep()" :disabled="!isStep1Complete()" class="px-6 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 disabled:bg-gray-400">
                                Lanjutkan
                            </button>
                        </div>
                    </div>

                    {{-- LANGKAH 2: JADWAL & KELUHAN --}}
                    <div x-show="step === 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0">
                        <h4 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">Langkah 2: Pilih Jadwal & Keluhan</h4>
                        
                        <!-- Pilih Dokter -->
                        <div class="mb-6">
                            <x-input-label value="Pilih Dokter" />
                            <select x-model="selectedDokter" @change="fetchJadwalDokter" name="id_dokter" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm">
                                <option value="">-- Silakan Pilih Dokter --</option>
                                @foreach($dokters as $dokter)
                                    <option value="{{ $dokter->id }}">{{ $dokter->user->name }} ({{ $dokter->spesialisasi }})</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Pilih Tanggal -->
                        <div class="mb-6" x-show="selectedDokter" x-transition>
                            <x-input-label value="Pilih Tanggal" />
                            <input type="date" x-model="selectedTanggal" @change="fetchSlotWaktu" name="tanggal_pesan" :min="today" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm">
                        </div>

                        <!-- Pilih Jam -->
                        <div class="mb-6" x-show="selectedTanggal && !loadingSlot" x-transition>
                            <x-input-label value="Pilih Jam Tersedia" />
                            <div x-show="availableSlots.length > 0" class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-2 mt-1">
                                <template x-for="slot in availableSlots" :key="slot">
                                    <label :class="{'bg-purple-600 text-white': selectedSlot === slot, 'bg-gray-100 hover:bg-purple-100': selectedSlot !== slot}" class="cursor-pointer text-center p-3 rounded-md transition-colors duration-200">
                                        <input type="radio" x-model="selectedSlot" name="waktu_pesan" :value="slot" class="hidden">
                                        <span x-text="slot"></span>
                                    </label>
                                </template>
                            </div>
                            <div x-show="availableSlots.length === 0 && selectedTanggal && !loadingSlot" class="text-sm text-red-500 p-3 bg-red-50 rounded-md mt-1">
                                Tidak ada slot tersedia. Silakan pilih tanggal lain.
                            </div>
                        </div>

                        <!-- Keluhan Awal & Catatan -->
                        <div x-show="selectedSlot" x-transition>
                            <div class="mb-6">
                                <x-input-label for="tindakan_awal" value="Layanan yang diinginkan" />
                                <select name="tindakan_awal[]" id="tindakan_awal" multiple>
                                    @foreach($daftarTindakans as $kategori)
                                        <optgroup label="{{ $kategori->nama_kategori }}">
                                            @foreach($kategori->tindakanItems as $tindakan)
                                                {{-- [FIX] Tambahkan data-harga di sini --}}
                                                <option value="{{ $tindakan->id }}" data-harga="{{ $tindakan->harga }}">
                                                    {{ $tindakan->keterangan }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-6">
                                <x-input-label for="catatan" value="Catatan Tambahan (Opsional)" />
                                <textarea name="catatan" id="catatan" rows="3" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm"></textarea>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-6 border-t pt-6">
                            <button type="button" @click="step = 1" class="text-sm text-gray-600 hover:text-gray-900">&larr; Kembali</button>
                            <x-primary-button type="submit" ::disabled="!isFormComplete()" class="bg-purple-600 hover:bg-purple-700 disabled:bg-gray-400">
                                Buat Janji Temu
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        // Inisialisasi Tom Select
        document.addEventListener('DOMContentLoaded', function() {
            new TomSelect('#tindakan_awal', {
                plugins: ['remove_button'],
                render: {
                    // Custom render untuk menampilkan harga
                    option: function(data, escape) {
                        const harga = data.harga ? new Intl.NumberFormat('id-ID').format(data.harga) : 'N/A';
                        return `<div>
                                    <span class="font-medium">${escape(data.text)}</span>
                                    <span class="text-sm text-gray-500 ml-2">(Rp ${harga})</span>
                                </div>`;
                    },
                    item: function(data, escape) {
                        return `<div>${escape(data.text)}</div>`;
                    }
                }
            });
        });
        
        function bookingForm() {
            return {
                step: 1,
                formData: {
                    nama_pasien_booking: '{{ Auth::user()->name }}',
                    nik: '{{ Auth::user()->biodata->nik ?? '' }}',
                    status_pasien: '',
                    nomor_bpjs: '',
                },
                selectedDokter: '',
                jadwalDokter: [],
                loadingJadwal: '',
                selectedTanggal: '',
                today: new Date().toISOString().split('T')[0],
                availableSlots: [],
                loadingSlot: '',
                selectedSlot: '',
                isStep1Complete() {
                    if (this.formData.status_pasien === 'BPJS') {
                        return this.formData.nama_pasien_booking && this.formData.status_pasien && this.formData.nomor_bpjs;
                    }
                    return this.formData.nama_pasien_booking && this.formData.status_pasien;

                },
                nextStep() {
                    if (this.isStep1Complete()) {
                        this.step = 2;
                    } else {
                        alert('Harap isi Nama Pasien dan Status Pasien untuk melanjutkan.');
                    }
                },
                isFormComplete() {
                    return this.isStep1Complete() && this.selectedDokter && this.selectedTanggal && this.selectedSlot;
                },

                fetchJadwalDokter() {
                    this.resetTanggalDanSlot();
                    if (!this.selectedDokter) return;

                    this.loadingJadwal = 'Memuat jadwal dokter...';
                    fetch(`/pasien/get-jadwal-dokter/${this.selectedDokter}`)
                        .then(response => response.json())
                        .then(data => {
                            this.jadwalDokter = data;
                            this.loadingJadwal = '';
                        })
                        .catch(() => {
                            this.loadingJadwal = 'Gagal memuat jadwal.';
                        });
                },

                fetchSlotWaktu() {
                    this.availableSlots = [];
                    this.selectedSlot = '';
                    if (!this.selectedTanggal || !this.selectedDokter) return;

                    this.loadingSlot = 'Mencari slot waktu...';
                    fetch(`/pasien/get-slot-waktu/${this.selectedDokter}/${this.selectedTanggal}`)
                        .then(response => {
                            if (!response.ok) throw new Error('Jadwal tidak ditemukan');
                            return response.json();
                        })
                        .then(data => {
                            this.availableSlots = data;
                            this.loadingSlot = '';
                        })
                        .catch(() => {
                            this.loadingSlot = '';
                        });
                },
                
                isFormComplete() {
                    return this.selectedDokter && this.selectedTanggal && this.selectedSlot;
                },

                resetTanggalDanSlot() {
                    this.selectedTanggal = '';
                    this.availableSlots = [];
                    this.selectedSlot = '';
                }
            }
        }
    </script>
</x-app-layout>

===== resources\views\pasien\pemesanan\index.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Pemesanan Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="py-2 px-4 border-b">Tanggal</th>
                                    <th class="py-2 px-4 border-b">Dokter</th>
                                    <th class="py-2 px-4 border-b">Status</th>
                                    <th class="py-2 px-4 border-b">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pemesanans as $pemesanan)
                                    {{-- BARIS UTAMA UNTUK SETIAP PEMESANAN --}}
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($pemesanan->tanggal_pesan)->translatedFormat('d M Y') }} - {{ \Carbon\Carbon::parse($pemesanan->waktu_pesan)->format('H:i') }}</td>
                                        <td class="py-2 px-4 border-b">{{ $pemesanan->dokter->user->name }}</td>
                                        <td class="py-2 px-4 border-b">
                                            {{-- [MODIFIKASI] Menambahkan warna untuk status "Dijadwalkan Ulang" --}}
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($pemesanan->status == 'Selesai') bg-green-100 text-green-800 
                                                @elseif($pemesanan->status == 'Dibatalkan') bg-red-100 text-red-800
                                                @elseif($pemesanan->status == 'Dijadwalkan Ulang') bg-yellow-100 text-yellow-800
                                                @else bg-blue-100 text-blue-800 @endif">
                                                {{ $pemesanan->status }}
                                            </span>
                                        </td>
                                        <td class="py-2 px-4 border-b">
                                            @if($pemesanan->status == 'Selesai' && $pemesanan->rekamMedis)
                                                <a href="{{ route('pasien.rekamMedis.show', $pemesanan->rekamMedis->id) }}" class="text-blue-600 hover:text-blue-900">Lihat Rekam Medis</a>
                                            @elseif(in_array($pemesanan->status, ['Dipesan', 'Dikonfirmasi']))
                                                <form action="{{ route('pasien.pemesanan.destroy', $pemesanan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pemesanan ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700">Batalkan</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>

                                    {{-- Baris ini akan muncul HANYA JIKA ada catatan dari admin --}}
                                    @if($pemesanan->catatan_admin)
                                    <tr class="bg-yellow-50 hover:bg-yellow-100">
                                        <td colspan="4" class="py-3 px-4 border-b text-sm">
                                            <strong class="text-yellow-800">Catatan dari Klinik:</strong>
                                            <p class="mt-1 text-gray-700">{{ $pemesanan->catatan_admin}}</p>
                                        </td>
                                    </tr>
                                    @endif
                                    @empty
                                    <tr>
                                        <td colspan="4" class="py-4 px-4 text-center">Anda belum pernah membuat pemesanan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $pemesanans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\pasien\rekam-medis\show.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Riwayat Kunjungan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                {{-- AWAL MODIFIKASI: Logo Klinik --}}
                <div class="flex items-center  pl-4 pt-4">
                    <img src="{{ asset('images/logodeliyana.png') }}" 
                         alt="Logo Deliyana Dental Care" 
                         class="w-14 h-14 object-contain mr-4">
                    <div>
                        <h1 class="text-2xl font-bold text-purple-700 leading-tight">Deliyana Dental Care</h1>
                    </div>
                </div>
                {{-- AKHIR MODIFIKASI --}}

                <div class="p-6 md:p-8 bg-white border-b border-gray-200">

                    {{-- Informasi Kunjungan --}}
                    <div class="grid grid-cols-2 gap-4 mb-6 pb-6 border-b">
                        <div>
                            <h3 class="text-sm text-gray-500">Status Pasien</h3>
                            <p class="font-bold text-lg text-gray-800">{{ $rekamMedis->pemesanan->status_pasien }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-500">Nomor BPJS</h3>
                            <p class="font-bold text-lg text-gray-800">{{ $rekamMedis->pemesanan->nomor_bpjs }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-500">Tanggal Perawatan</h3>
                            <p class="font-bold text-lg text-gray-800">
                                {{ \Carbon\Carbon::parse($rekamMedis->created_at)->translatedFormat('d F Y') }}
                            </p>
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-500">Dokter</h3>
                            <p class="font-bold text-lg text-gray-800">
                                {{ $rekamMedis->pemesanan->dokter->user->name }}
                            </p>
                        </div>
                    </div>

                    {{-- Detail Medis --}}
                    <div class="space-y-6">
                        <div>
                            <h4 class="font-semibold text-gray-700">Diagnosis</h4>
                            <p class="mt-1 text-gray-600">{{ $rekamMedis->diagnosis }}</p>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-700">Perawatan</h4>
                            <p class="mt-1 text-gray-600">{{ $rekamMedis->perawatan }}</p>
                        </div>
                        @if ($rekamMedis->catatan)
                            <div>
                                <h4 class="font-semibold text-gray-700">Catatan Dokter</h4>
                                <p class="mt-1 text-gray-600">{{ $rekamMedis->catatan }}</p>
                            </div>
                        @endif
                    </div>
                    @if ($rekamMedis->foto->isNotEmpty())
                        <div class="mt-6 border-t pt-6">
                            <h4 class="text-lg font-semibold mb-4 text-gray-800">Foto Pendukung</h4>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                @foreach ($rekamMedis->foto as $foto)
                                    <a href="{{ asset('storage/' . $foto->path_foto) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $foto->path_foto) }}" 
                                             alt="Foto Rekam Medis"
                                             class="rounded-lg object-cover w-full h-32 hover:opacity-80 transition">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- AWAL MODIFIKASI: Rincian Tagihan --}}
                    <div class="mt-6 border-t pt-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Rincian Tagihan</h3>

                        @php
                            $tindakanPasien = $rekamMedis->tindakan->whereIn(
                                'id',
                                $rekamMedis->pemesanan->tindakanAwal->pluck('id')->toArray(),
                            );
                            $tindakanDokter = $rekamMedis->tindakan->whereNotIn(
                                'id',
                                $rekamMedis->pemesanan->tindakanAwal->pluck('id')->toArray(),
                            );

                            $subtotalTindakan = $rekamMedis->tindakan->sum(fn($t) => $t->pivot->harga_saat_itu);
                            $subtotalObat = $rekamMedis->resep->sum(fn($r) => $r->jumlah * $r->harga_saat_resep);
                            $jumlahTindakan = $rekamMedis->tindakan->count();
                            $pembayaran = $rekamMedis->pemesanan->pembayaran;

                            $potonganTindakan = 0;
                            $potonganObat = 0;
                            $potonganInhealth = 0;

                            if ($rekamMedis->pemesanan->status_pasien == 'BPJS') {
                                $potonganTindakan = $jumlahTindakan * 2500;
                                $potonganObat = $subtotalObat;
                            }

                            if ($rekamMedis->pemesanan->status_pasien == 'Inhealth' && $pembayaran) {
                                $potonganInhealth = $pembayaran->potongan;
                            }
                        @endphp

                        {{-- Tindakan Pasien --}}
                        @if ($tindakanPasien->isNotEmpty())
                            <div class="mb-4">
                                <h4 class="text-md font-semibold text-gray-700 mb-2">Tindakan Pilihan Pasien</h4>
                                <div class="space-y-1">
                                    @foreach ($tindakanPasien as $tindakan)
                                        <div class="flex justify-between items-center text-sm">
                                            <span class="text-gray-600">
                                                {{ $tindakan->daftarTindakan->nama_kategori ?? '-' }} â€” {{ $tindakan->keterangan }}
                                            </span>
                                            <span class="font-medium text-gray-800">
                                                Rp {{ number_format($tindakan->pivot->harga_saat_itu, 0, ',', '.') }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Tindakan Tambahan Dokter --}}
                        @if ($tindakanDokter->isNotEmpty())
                            <div class="mb-4 pt-4 border-t border-dashed">
                                <h4 class="text-md font-semibold text-gray-700 mb-2">Tindakan Tambahan Dokter</h4>
                                <div class="space-y-1">
                                    @foreach ($tindakanDokter as $tindakan)
                                        <div class="flex justify-between items-center text-sm">
                                            <span class="text-gray-600">
                                                {{ $tindakan->daftarTindakan->nama_kategori ?? '-' }} â€” {{ $tindakan->keterangan }}
                                            </span>
                                            <span class="font-medium text-gray-800">
                                                Rp {{ number_format($tindakan->pivot->harga_saat_itu, 0, ',', '.') }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Obat --}}
                        @if ($rekamMedis->resep->isNotEmpty())
                            <div class="pt-4 mt-4 border-t border-dashed">
                                <h4 class="text-md font-semibold text-gray-700 mb-2">Biaya Obat</h4>
                                @foreach ($rekamMedis->resep as $item)
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="text-gray-600">
                                            {{ $item->obat->nama_obat }} ({{ $item->jumlah }} x Rp {{ number_format($item->harga_saat_resep, 0, ',', '.') }})
                                        </span>
                                        <span class="font-medium text-gray-800">
                                            Rp {{ number_format($item->jumlah * $item->harga_saat_resep, 0, ',', '.') }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Subtotal --}}
                        <div class="mt-4">
                            <div class="pt-4 mt-4 border-t border-dashed">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Subtotal Tindakan</span>
                                    <span class="font-medium text-gray-800">Rp {{ number_format($subtotalTindakan, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Subtotal Obat</span>
                                    <span class="font-medium text-gray-800">Rp {{ number_format($subtotalObat, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Potongan --}}
                        @if ($rekamMedis->pemesanan->status_pasien == 'BPJS')
                            <div class="flex justify-between items-center text-red-600">
                                <span>Potongan BPJS Tindakan</span>
                                <span>- Rp {{ number_format($potonganTindakan, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center text-red-600">
                                <span>Potongan BPJS Obat</span>
                                <span>- Rp {{ number_format($potonganObat, 0, ',', '.') }}</span>
                            </div>
                        @elseif ($rekamMedis->pemesanan->status_pasien == 'Inhealth' && $potonganInhealth > 0)
                            <div class="flex justify-between items-center text-red-600">
                                <span>Potongan Inhealth</span>
                                <span>- Rp {{ number_format($potonganInhealth, 0, ',', '.') }}</span>
                            </div>
                        @endif

                        {{-- Total --}}
                        @if ($pembayaran)
                            <div class="flex justify-between items-center p-3 mt-4 bg-purple-50 rounded-lg">
                                <span class="font-bold text-purple-800">Total Biaya Keseluruhan</span>
                                <span class="font-bold text-lg text-purple-900">
                                    Rp {{ number_format($pembayaran->total_biaya, 0, ',', '.') }}
                                </span>
                            </div>
                        @endif
                    </div>
                    {{-- AKHIR MODIFIKASI --}}

                    {{-- Resep & Foto --}}
                    @if ($rekamMedis->resep->isNotEmpty())
                        <div class="mt-6 border-t pt-6">
                            <h4 class="text-lg font-semibold mb-4 text-gray-800">Detail Resep Obat</h4>
                            <ul class="list-disc list-inside space-y-2 text-gray-600">
                                @foreach ($rekamMedis->resep as $item)
                                    <li>
                                        <strong>{{ $item->obat->nama_obat }}</strong> - {{ $item->jumlah }} {{ $item->obat->kemasan }}. 
                                        Dosis: {{ $item->dosis }}. Instruksi: {{ $item->instruksi }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    

                    {{-- Tombol Kembali --}}
                    <div class="mt-8 border-t pt-6 text-right">
                        <a href="{{ route('pasien.pemesanan.index') }}"
                            class="text-purple-600 hover:text-purple-800 font-semibold">
                            &larr; Kembali ke Riwayat Pemesanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\pasien\dashboard.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Selamat Datang, ') . Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Pemesanan Aktif Anda</h3>
                    @if($pemesananAktif->isNotEmpty())
                        @foreach($pemesananAktif as $pemesanan)
                            <div class="border p-4 rounded-lg mb-4">
                                <p><strong>Dokter:</strong> {{ $pemesanan->dokter->user->name }}</p>
                                <p><strong>Jadwal:</strong> {{ \Carbon\Carbon::parse($pemesanan->tanggal_pesan)->translatedFormat('l, d F Y') }} pukul {{ \Carbon\Carbon::parse($pemesanan->waktu_pesan)->format('H:i') }}</p>
                                <p><strong>Status:</strong> <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">{{ $pemesanan->status }}</span></p>
                            </div>
                        @endforeach
                    @else
                        <p>Anda tidak memiliki pemesanan yang aktif saat ini.</p>
                        <a href="{{ route('pasien.pemesanan.create') }}" class="inline-block mt-4 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                            Buat Pemesanan Baru
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\profile\partials\delete-user-form.blade.php =====
<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

===== resources\views\profile\partials\update-password-form.blade.php =====
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

===== resources\views\profile\partials\update-profile-information-form.blade.php =====
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

===== resources\views\profile\edit.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\dashboard.blade.php =====
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

===== resources\views\welcome.blade.php =====
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Deliyana Dental Care - Klinik Gigi Modern & Terpercaya</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Inline Styles & Scripts -->
    <style>
        /* Tema Warna */
        .bg-gradient-purple {
            background: linear-gradient(90deg, #8B5CF6, #6D28D9);
        }

        .text-purple-accent {
            color: #6D28D9;
        }

        /* Efek Underline Navigasi */
        .nav-link-hover {
            position: relative;
            padding-bottom: 0.25rem;
        }

        .nav-link-hover::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #8B5CF6;
            transition: width 0.3s ease-in-out;
        }

        .nav-link-hover:hover::after {
            width: 100%;
        }

        /* Efek Tombol Utama */
        .cta-button-hover:hover {
            background: linear-gradient(90deg, #A78BFA, #8B5CF6);
            box-shadow: 0 10px 20px rgba(139, 92, 246, 0.3), 0 6px 6px rgba(139, 92, 246, 0.25);
        }

        /* Animasi Fade-in */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .fade-in.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="font-sans antialiased bg-slate-50 text-gray-800" x-data>
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white/80 backdrop-blur-sm shadow-sm sticky top-0 z-50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <a href="#beranda" class="flex items-center">
                        <img src="{{ asset('images/logodeliyana.png') }}" alt="Logo Deliyana Dental Care"
                            class="h-10 w-10 mr-2">
                        <span class="text-xl font-bold text-gray-800">Deliyana Dental Care</span>
                    </a>
                    <nav class="hidden md:flex items-center space-x-8">
                        <a href="#layanan"
                            class="nav-link-hover text-gray-600 hover:text-purple-accent transition duration-300">Layanan</a>
                        <a href="#tentang"
                            class="nav-link-hover text-gray-600 hover:text-purple-accent transition duration-300">Tentang
                            Kami</a>
                        <a href="#kontak"
                            class="nav-link-hover text-gray-600 hover:text-purple-accent transition duration-300">Kontak</a>
                    </nav>
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="px-5 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 transition-all duration-300 transform hover:scale-105">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="hidden sm:block text-sm font-medium text-gray-600 hover:text-purple-accent transition duration-300">Log
                                    in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="px-5 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 transition-all duration-300 transform hover:scale-105">Daftar</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main>
            <!-- Hero Section -->
            <section id="beranda" class="min-h-screen flex flex-col justify-center bg-white fade-in">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
                    <h1 class="text-4xl md:text-6xl font-bold text-gray-900 leading-tight">
                        Senyum Sehat & Percaya Diri <br class="hidden md:block"> Dimulai di <span
                            class="text-purple-accent">Sini</span>.
                    </h1>
                    <p class="mt-6 max-w-2xl mx-auto text-lg text-gray-600">
                        Deliyana Dental Care menyediakan layanan perawatan gigi terbaik dengan teknologi modern dan
                        dokter berpengalaman untuk Anda dan keluarga.
                    </p>
                    <div class="mt-8">
                        <a href="{{ route('register') }}"
                            class="cta-button-hover px-8 py-3 text-lg font-semibold text-white bg-gradient-purple rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105">
                            Buat Janji Temu Sekarang
                        </a>
                    </div>
                </div>
            </section>

            <!-- Layanan Section (Diperbarui) -->
            <section id="layanan" class="min-h-screen flex flex-col justify-center py-20 bg-slate-50 fade-in">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Layanan Holistik untuk Anda</h2>
                        <p class="mt-4 max-w-2xl mx-auto text-gray-600">Dari perawatan rutin hingga estetika, kami
                            memiliki solusi lengkap untuk memastikan senyum Anda selalu dalam kondisi terbaik.</p>
                    </div>
                    {{-- [MODIFIKASI] Grid diubah untuk 10 card --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

                        <div
                            class="bg-white p-6 rounded-xl shadow-lg hover:shadow-purple-200 hover:-translate-y-2 transition-all duration-300 flex flex-col">
                            <h3 class="text-xl font-bold mb-3 text-purple-accent">Gigi Palsu</h3>
                            <p class="text-gray-600 text-sm flex-grow">Gigi Palsu, Crown, atau Implan untuk
                                mengembalikan fungsi dan kenyamanan berbicara serta makan. Tersedia opsi lepasan hingga
                                permanen.</p>
                        </div>

                        <div
                            class="bg-white p-6 rounded-xl shadow-lg hover:shadow-purple-200 hover:-translate-y-2 transition-all duration-300 flex flex-col">
                            <h3 class="text-xl font-bold mb-3 text-purple-accent">Veneer Gigi</h3>
                            <p class="text-gray-600 text-sm flex-grow">Veneer atau Gigi Kelinci yang sedang tren untuk
                                tampil kece dengan senyum mempesona. Terdiri dari bahan Composite, Porcelain, dan
                                lainnya.</p>
                        </div>

                        <div
                            class="bg-white p-6 rounded-xl shadow-lg hover:shadow-purple-200 hover:-translate-y-2 transition-all duration-300 flex flex-col">
                            <h3 class="text-xl font-bold mb-3 text-purple-accent">Kawat Gigi</h3>
                            <p class="text-gray-600 text-sm flex-grow">Kawat Gigi atau Behel untuk meratakan gigi
                                menjadi lebih rapi. Tersedia berbagai jenis bahan seperti Metal, Ceramic, hingga Safir.
                            </p>
                        </div>

                        <div
                            class="bg-white p-6 rounded-xl shadow-lg hover:shadow-purple-200 hover:-translate-y-2 transition-all duration-300 flex flex-col">
                            <h3 class="text-xl font-bold mb-3 text-purple-accent">Scaling Gigi</h3>
                            <p class="text-gray-600 text-sm flex-grow">Scaling atau pembersihan karang gigi untuk
                                menghilangkan kalkulus dan memperbaiki permukaan gigi agar plak tidak mudah terbentuk.
                            </p>
                        </div>

                        <div
                            class="bg-white p-6 rounded-xl shadow-lg hover:shadow-purple-200 hover:-translate-y-2 transition-all duration-300 flex flex-col">
                            <h3 class="text-xl font-bold mb-3 text-purple-accent">Penambalan Gigi</h3>
                            <p class="text-gray-600 text-sm flex-grow">Memulihkan gigi berlubang dengan tambalan
                                komposit berwarna putih yang serasi dengan warna alami gigi Anda.</p>
                        </div>

                        <div
                            class="bg-white p-6 rounded-xl shadow-lg hover:shadow-purple-200 hover:-translate-y-2 transition-all duration-300 flex flex-col">
                            <h3 class="text-xl font-bold mb-3 text-purple-accent">Pemutihan Gigi</h3>
                            <p class="text-gray-600 text-sm flex-grow">Bleaching atau Whitening untuk membuat gigi
                                menjadi bersih, sehat, dan putih terbebas dari noda sisa makanan dan minuman.</p>
                        </div>

                        <div
                            class="bg-white p-6 rounded-xl shadow-lg hover:shadow-purple-200 hover:-translate-y-2 transition-all duration-300 flex flex-col">
                            <h3 class="text-xl font-bold mb-3 text-purple-accent">Perawatan Gigi Anak</h3>
                            <p class="text-gray-600 text-sm flex-grow">Pemeriksaan rutin dan pembersihan rongga mulut
                                anak untuk menghindari pertumbuhan bakteri dan kerusakan gigi di masa depan.</p>
                        </div>

                        <div
                            class="bg-white p-6 rounded-xl shadow-lg hover:shadow-purple-200 hover:-translate-y-2 transition-all duration-300 flex flex-col">
                            <h3 class="text-xl font-bold mb-3 text-purple-accent">Perawatan Ibu Hamil</h3>
                            <p class="text-gray-600 text-sm flex-grow">Pemeriksaan gigi selama kehamilan yang aman dan
                                penting untuk kesehatan mulut Anda yang dapat dipengaruhi perubahan hormon.</p>
                        </div>

                        <div
                            class="bg-white p-6 rounded-xl shadow-lg hover:shadow-purple-200 hover:-translate-y-2 transition-all duration-300 flex flex-col">
                            <h3 class="text-xl font-bold mb-3 text-purple-accent">Pencabutan Gigi</h3>
                            <p class="text-gray-600 text-sm flex-grow">Proses pengangkatan gigi yang sudah rusak atau
                                berlubang parah setelah upaya perbaikan lain tidak memungkinkan.</p>
                        </div>

                        <div
                            class="bg-white p-6 rounded-xl shadow-lg hover:shadow-purple-200 hover:-translate-y-2 transition-all duration-300 flex flex-col">
                            <h3 class="text-xl font-bold mb-3 text-purple-accent">Perawatan Akar Gigi</h3>
                            <p class="text-gray-600 text-sm flex-grow">Prosedur bedah untuk mengangkat pulpa yang
                                terinfeksi, membersihkan, dan menutup bagian dalam gigi dengan tambalan.</p>
                        </div>

                    </div>
                </div>
            </section>

            <!-- Tentang Kami Section (Diperbarui) -->
            <section id="tentang" class="min-h-screen flex items-center bg-white py-20 fade-in">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                        <!-- Gambar di kiri -->
                        <div class="order-1 md:order-1">
                            <img src="{{ asset('images/deli.jpeg') }}"
                                alt="Interior Klinik Deliyana Dental Care"
                                class="rounded-xl shadow-2xl w-full h-auto object-cover">
                        </div>

                        <!-- Teks di kanan -->
                        <div class="order-2 md:order-2">
                            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                                Tentang <span class="text-purple-accent">Deliyana Dental Care</span>
                            </h2>
                            <p class="text-gray-600 mb-6">
                                Klinik Deliyana Dental Care adalah klinik dokter gigi yang berada di Gorontalo.
                                Deliyana Dental Care berdiri di bawah naungan <strong>PT. IRWAN DELY FARMA</strong>
                                yang sudah terdaftar berdasarkan
                                <strong>SK MENTERI HUKUM DAN HAK ASASI MANUSIA REPUBLIK INDONESIA NOMOR:
                                    AHU-00802.AH.02.01.TAHUN 2020 TANGGAL 02 MARET 2020</strong>.
                            </p>

                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div
                                        class="flex-shrink-0 h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center mr-4">
                                        <span class="text-purple-accent font-bold">1</span>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">SK NOTARIS</h4>
                                        <p class="text-gray-600">
                                            SK MENTERI HUKUM DAN HAK ASASI MANUSIA REPUBLIK INDONESIA
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div
                                        class="flex-shrink-0 h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center mr-4">
                                        <span class="text-purple-accent font-bold">2</span>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">NOMOR</h4>
                                        <p class="text-gray-600">
                                            AHU-00802.AH.02.01.TAHUN 2020 TANGGAL 02 MARET 2020
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </main>

        <!-- Footer -->
        <footer id="kontak" class="bg-gray-800 text-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-lg font-bold">Deliyana Dental Care</h3>
                        <p class="mt-2 text-gray-400">Klinik Deliyana Dental Care adalah klinik doker gigi yang berada
                            di Gorontalo, Deliyana Dental Care berdiri di bawah naungan PT. IRWAN DELY FARMA yang sudah
                            terdaftar berdasarkan
                            SK Notaris : SK MENTERI HUKUM DAN HAK ASASI MANUSIA REPUBLIK INDONESIA NOMOR :
                            AHU-00802.AH.02.01.TAHUN 2020 TANGGAL 02 MARET 2020</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold">Kontak Kami</h3>
                        <ul class="mt-2 space-y-2 text-gray-400">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Jl. Sultan Botutihe No.25, Ipilo, Kec. Kota Tim., Kota Gorontalo, Gorontalo 96134
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                                +62 823-1951-4419
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold">Jam Buka</h3>
                        <ul class="mt-2 space-y-2 text-gray-400">
                            <li>Senin - Sabtu: 10:00 - 22:00</li>
                            <li>Minggu: Tutup</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-8 border-t border-gray-700 pt-6 text-center text-gray-500 text-sm">
                    &copy; {{ date('Y') }} Deliyana Dental Care. All Rights Reserved.
                </div>
            </div>
        </footer>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('.fade-in');

            // Initial fade-in for the first section
            setTimeout(() => {
                sections.forEach(section => {
                    // Check if the section is already in view on load
                    const rect = section.getBoundingClientRect();
                    if (rect.top < window.innerHeight && rect.bottom >= 0) {
                        section.classList.add('is-visible');
                    }
                });
            }, 100); // Small delay to ensure styles are applied

            // Fade-in on scroll
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            }, {
                threshold: 0.1
            });

            sections.forEach(section => {
                observer.observe(section);
            });
        });
    </script>
</body>

</html>

```


## Entry Points & Main Configs Content
```
===== public\index.php =====
<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());

===== artisan =====
#!/usr/bin/env php
<?php

use Illuminate\Foundation\Application;
use Symfony\Component\Console\Input\ArgvInput;

define('LARAVEL_START', microtime(true));

// Register the Composer autoloader...
require __DIR__.'/vendor/autoload.php';

// Bootstrap Laravel and handle the command...
/** @var Application $app */
$app = require_once __DIR__.'/bootstrap/app.php';

$status = $app->handleCommand(new ArgvInput);

exit($status);

===== resources\js\app.js =====
import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

===== vite.config.js =====
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});

===== config\app.php =====
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => 'Asia/Makassar',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];

===== config\database.php =====
<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for database operations. This is
    | the connection which will be utilized unless another connection
    | is explicitly specified when you execute a query / statement.
    |
    */

    'default' => env('DB_CONNECTION', 'sqlite'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Below are all of the database connections defined for your application.
    | An example configuration is provided for each database system which
    | is supported by Laravel. You're free to add / remove connections.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DB_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
            'busy_timeout' => null,
            'journal_mode' => null,
            'synchronous' => null,
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mariadb' => [
            'driver' => 'mariadb',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            // 'encrypt' => env('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run on the database.
    |
    */

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as Memcached. You may define your connection settings here.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
            'persistent' => env('REDIS_PERSISTENT', false),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];

```

== Selesai ==
