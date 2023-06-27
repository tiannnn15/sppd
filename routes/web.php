<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BendController;
use App\Http\Controllers\SppdController;
use App\Http\Controllers\BiayaController;
use App\Http\Controllers\KadinController;
use App\Http\Controllers\SekreController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KwitansiController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\VerifsppdController;
use App\Http\Controllers\PenginapanController;
use App\Http\Controllers\SuratmasukController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\TransportasiController;
use App\Http\Controllers\VeriflaporanController;
use App\Http\Controllers\VerifkwitansiController;
use App\Http\Controllers\VerifpengeluaranController;

//  jika user belum login
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);
});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2,3,4']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk sekre
Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    Route::get('/sekre', [SekreController::class, 'index']);
    Route::get('/pegawai', [PegawaiController::class, 'index']);
    Route::get('/biaya', [BiayaController::class, 'index']);
    Route::get('/penginapan', [PenginapanController::class, 'index']);
    Route::get('/tiket', [TiketController::class, 'index']);
    Route::get('/transportasi', [TransportasiController::class, 'index']);
    Route::get('/suratmasuk', [SuratmasukController::class, 'index']);
    Route::get('pegawai/create', [PegawaiController::class, 'create']);
    Route::get('pegawai/edit', [PegawaiController::class, 'edit']);
    Route::get('/biaya/create', [BiayaController::class, 'create']);
    Route::get('/biaya/edit', [BiayaController::class, 'edit']);
    Route::get('/penginapan/create', [PenginapanController::class, 'create']);
    Route::get('/penginapan/edit', [PenginapanController::class, 'edit']);
    Route::get('/tiket/create', [TiketController::class, 'create']);
    Route::get('/tiket/edit', [TiketController::class, 'edit']);
    Route::get('/transportasi/create', [TransportasiController::class, 'create']);
    Route::get('/transportasi/edit', [TransportasiController::class, 'edit']);
    Route::get('/suratmasuk/create', [SuratmasukController::class, 'create']);
    // Route::get('/suratmasuk/edit', [SuratmasukController::class, 'edit']);
    Route::resource('/pegawai', \App\Http\Controllers\PegawaiController::class);
    Route::resource('/biaya', \App\Http\Controllers\BiayaController::class);
    Route::resource('/penginapan', \App\Http\Controllers\PenginapanController::class);
    Route::resource('/tiket', \App\Http\Controllers\TiketController::class);
    Route::resource('/transportasi', \App\Http\Controllers\TransportasiController::class);
    Route::resource('/suratmasuk', \App\Http\Controllers\SuratmasukController::class);
});

// untuk kadin
Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
    Route::get('/kadin', [KadinController::class, 'index']);
    Route::get('/disposisi', [DisposisiController::class, 'index']);
    Route::get('/listsuratmasuk', [KadinController::class, 'listsuratmasuk']);
    Route::get('/app/{id}', [KadinController::class, 'app']);
    Route::get('/verifsppd', [VerifsppdController::class, 'index']);
    Route::get('/verifsppd/{id}', [VerifsppdController::class, 'show']);
    Route::get('/disposisi/show', [DisposisiController::class, 'show']);
    Route::get('/terima/{id}', [VerifsppdController::class, 'terima']);
    Route::get('/tolak/{id}', [VerifsppdController::class, 'tolak']);
    // Route::get('/verifsppd/show', [KadinController::class, 'show']);
    // Route::get('/pilihpegawai', [DisposisiController::class, 'formpegawai']);
    Route::get('/disposisi/edit', [DisposisiController::class, 'edit']);

    Route::resource('/disposisi', \App\Http\Controllers\DisposisiController::class);
    Route::resource('/verifsppd', \App\Http\Controllers\VerifsppdController::class);
    // Route::resource('/listsuratmasuk', \App\Http\Controllers\DisposisiController::class);

});

// untuk pegawai
Route::group(['middleware' => ['auth', 'checkrole:3']], function () {
    Route::get('/staff', [StaffController::class, 'index']);
    Route::get('/listdisposisi', [StaffController::class, 'listdisposisi']);
    // Route::get('/listdisposisi/show', [StaffController::class, 'show']);
    Route::get('/staff/show', [StaffController::class, 'show']);
    Route::get('/sppd', [SppdController::class, 'index']);
    Route::get('sppd/create', [SppdController::class, 'create']);
    Route::get('/sppd/show', [SppdController::class, 'show']);
    // Route::get('/kwitansi', [KwitansiController::class, 'index']);
    Route::get('sppd/pdf/{id}', [SppdController::class, 'pdf'])->name('sppd.pdf');
    // Route::get('pegawai/edit', [PegawaiController::class, 'edit']);
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::get('/laporan/{id}', [LaporanController::class, 'show'])->name('laporan.show');
    // Route::get('/laporan/edit', [LaporanController::class, 'edit']);
    Route::resource('/staff', \App\Http\Controllers\StaffController::class);
    Route::resource('/kwitansi', KwitansiController::class);
    Route::resource('/pengeluaran', PengeluaranController::class);
    Route::resource('/sppd', \App\Http\Controllers\SppdController::class);
    Route::resource('/laporan', \App\Http\Controllers\LaporanController::class);
});

// untuk pegawai
Route::group(['middleware' => ['auth', 'checkrole:4']], function () {
    Route::get('/bend', [BendController::class, 'index']);
    Route::get('/veriflaporan', [VeriflaporanController::class, 'index']);
    Route::get('/verifkwitansi', [VerifkwitansiController::class, 'index']);
    Route::get('/verifpengeluaran', [VerifpengeluaranController::class, 'index']);
    Route::get('/verifkwitansi/{id}', [VerifkwitansiController::class, 'show']);
    Route::get('/approve/{id}', [VerifkwitansiController::class, 'approve']);
    Route::get('/disapprove/{id}', [VerifkwitansiController::class, 'disapprove']);
    Route::get('/verifpengeluaran/{id}', [VerifpengeluaranController::class, 'show'])->name('verifpengeluaran.show');
    Route::get('/approv/{id}', [VerifpengeluaranController::class, 'approv']);
    Route::get('/cancel/{id}', [VerifpengeluaranController::class, 'cancel']);
    Route::get('/veriflaporan/{id}', [VeriflaporanController::class, 'show']);
    Route::get('/approved/{id}', [VeriflaporanController::class, 'approved']);
    Route::get('/canceled/{id}', [VeriflaporanController::class, 'canceled']);
    Route::resource('/bend', \App\Http\Controllers\BendController::class);
    Route::resource('/veriflaporan', \App\Http\Controllers\VeriflaporanController::class);
    Route::resource('/verifkwitansi', \App\Http\Controllers\VerifkwitansiController::class);
    Route::resource('/verifpangeluaran', \App\Http\Controllers\VerifpengeluaranController::class);
});
