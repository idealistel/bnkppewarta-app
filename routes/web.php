<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoutePathController;
use App\Http\Controllers\PengurusSektorController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PendetaController;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::controller(SectorController::class)->group(function () {
        Route::get('/admin/sektor', 'index')->name('mgmt.sektor.index');
        Route::get('/admin/sektor/baru', 'create')->name('mgmt.sektor.create');
        Route::get('/admin/sektor/{nama}', 'show')->name('mgmt.sektor.show');
        Route::get('/admin/sektor/{sektor}/edit', 'edit')->name('mgmt.sektor.edit');
        Route::post('/admin/sektor', 'store')->name('mgmt.sektor.store');
        Route::put('/admin/sektor/{nama}', 'update')->name('mgmt.sektor.update');
        Route::delete('/admin/sektor/{nama}', 'destroy')->name('mgmt.sektor.destroy');
    });

    Route::controller(PengurusSektorController::class)->group(function () {
        Route::get('/admin/sektor/pengurus-baru/{sector:nama}', 'create')->name('mgmt.sektor.bph.create');
        Route::get('/admin/sektor/pengurus-{sector:nama}/{id}/edit', 'edit')->name('mgmt.sektor.bph.edit');
        Route::post('/admin/sektor/pengurus', 'store')->name('mgmt.sektor.bph.store');
        Route::put('/admin/sektor/pengurus/{id}', 'update')->name('mgmt.sektor.bph.update');
        Route::delete('/admin/sektor/pengurus/{id}', 'destroy')->name('mgmt.sektor.bph.destroy');
    });

    Route::controller(KeluargaController::class)->group(function () {
        Route::get('/admin/kepala-keluarga', 'index')->name('mgmt.keluarga.index');
        Route::get('/admin/kepala-keluarga/tambah-baru', 'create')->name('mgmt.keluarga.create');
        Route::get('/admin/kepala-keluarga/{keluarga}', 'show')->name('mgmt.keluarga.show');
        Route::post('/admin/kepala-keluarga', 'store')->name('mgmt.keluarga.store');
        Route::get('/admin/kepala-keluarga/{keluarga}/edit', 'edit')->name('mgmt.keluarga.edit');
        Route::put('/admin/kepala-keluarga/{keluarga}', 'update')->name('mgmt.keluarga.update');
        Route::delete('/admin/kepala-keluarga/{keluarga}', 'destroy')->name('mgmt.keluarga.destroy');
    });

    Route::controller(JemaatController::class)->group(function () {
        Route::get('/admin/jemaat', 'index')->name('mgmt.jemaat.index');
        Route::get('/admin/jemaat/baru', 'create')->name('mgmt.jemaat.create');
        Route::post('/admin/jemaat', 'store')->name('mgmt.jemaat.store');
        Route::get('/admin/jemaat/{stambuk}/edit', 'edit')->name('mgmt.jemaat.edit');
        Route::get('/admin/jemaat/{stambuk}', 'show')->name('mgmt.jemaat.show');
        Route::put('/admin/jemaat/{stambuk}', 'update')->name('mgmt.jemaat.update');
        Route::get('/admin/jemaat-pindah', 'indexPindah')->name('mgmt.jemaatpindah.index');
        Route::get('/admin/jemaat-pindah/{stambuk}/edit', 'editPindah')->name('mgmt.jemaatpindah.edit');
        Route::put('/admin/jemaat-pindah/{stambuk}', 'updatePindah')->name('mgmt.jemaatpindah.update');
        Route::get('/admin/jemaat-meninggal', 'indexMeninggal')->name('mgmt.jemaatmeninggal.index');
        Route::get('/admin/jemaat-meninggal/{stambuk}/edit', 'editMeninggal')->name('mgmt.jemaatmeninggal.edit');
        Route::put('/admin/jemaat-meninggal/{stambuk}', 'updateMeninggal')->name('mgmt.jemaatmeninggal.update');
        Route::delete('/admin/jemaat/{stambuk}', 'destroy')->name('mgmt.jemaat.destroy');
    });

    Route::controller(PendetaController::class)->group(function () {
        Route::get('/admin/pendeta', 'index')->name('majelis.pendeta.index');
        Route::get('/admin/pendeta/baru', 'create')->name('majelis.pendeta.create');
        Route::post('/admin/pendeta', 'store')->name('majelis.pendeta.store');
        Route::get('/admin/pendeta/{id}/edit', 'edit')->name('majelis.pendeta.edit');
        Route::put('/admin/pendeta/{id}', 'update')->name('majelis.pendeta.update');
        Route::delete('/admin/pendeta/{id}', 'destroy')->name('majelis.pendeta.destroy');
    });

    Route::resource('/admin/pengguna', UserController::class);

    // fetch Wilayah Alamat
    Route::get('/kabupaten/{provinsiId}', [AlamatController::class, 'getKabupatenByProvinsi']);
    Route::get('/kecamatan/{kabupatenId}', [AlamatController::class, 'getKecamatanByKabupaten']);
    Route::get('/kelurahan/{kecamatanId}', [AlamatController::class, 'getKelurahanByKecamatan']);

    // fetch Daftar Keluarga
    Route::get('/keluarga/{sectorId}', [KeluargaController::class, 'getKeluargaBySectorId']);

    // nomor stambuk jemaat
    Route::get('/stambuk/{keluargaId}', [JemaatController::class, 'nomorStambukJemaat']);
});

Route::get('/kembali', function () {
    return redirect()->back();
})->name('kembali');

Route::middleware(['auth'])->group(function () {
    Route::resource('/admin/postingan', PostController::class);
});




Route::get('/', function () {
    return view('index');
});

// route Admin end

// route website start
// route website end
