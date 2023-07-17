<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\EkspresiController;
use App\Http\Controllers\PojokHimsiController;
use App\Http\Controllers\IMabaController;


use App\Http\Controllers\Admin\AdminAkademikController;
use App\Http\Controllers\Admin\AdminPojokHimsiController;
use App\Http\Controllers\Admin\AdminStaffController;
use App\Http\Controllers\Admin\AdminEkspresiController;
use App\Http\Controllers\Admin\AdminAuthController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// HOME //
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [HomeController::class, 'storeContact'])->name('storeContact');

// ABOUT //
Route::get('/about/logo', [AboutController::class, 'logo'])->name('about-logo');
Route::get('/about/visi-misi', [AboutController::class, 'visiMisi'])->name('about-visiMisi');
Route::get('/about/proker', [AboutController::class, 'proker'])->name('about-proker');

// PROFILE //
Route::get('/profile/{dinasID}', [ProfileController::class, 'index'])->name('profile');

// POJOK HIMSI //
Route::get('/pojok-himsi', [PojokHimsiController::class, 'index'])->name('pojokHimsi');

// AKADEMIK //
Route::get('/akademik', [AkademikController::class, 'index'])->name('akademik');

// EKSPRESI //
Route::get('/ekspresi', [EkspresiController::class, 'index'])->name('ekspresi');

// IMABA //
Route::get('/imaba', [IMabaController::class, 'index'])->name('imaba');


Route::middleware('guest:admin')->group(function () {
    Route::get('/bph/admin', [AdminAuthController::class, 'index'])->name('admin-login');
    Route::post('/bph/admin', [AdminAuthController::class, 'login']);
});

Route::middleware('auth:admin')->group(function () {
    Route::post('/bph/admin/logout', [AdminAuthController::class, 'logout'])->name('admin-logout');

    Route::get('/bph/admin/dashboard/staff', [AdminStaffController::class, 'staff'])->name('admin-staff');
    Route::post('/bph/admin/dashboard/staff/insert', [AdminStaffController::class, 'insertStaff'])->name('insert-staff');
    Route::post('/bph/admin/dashboard/staff', [AdminStaffController::class, 'updateStaff'])->name('update-staff');
    Route::delete('/bph/admin/dashboard/staff', [AdminStaffController::class, 'deleteStaff'])->name('delete-staff');

    Route::get('/bph/admin/dashboard/pojok-himsi', [AdminPojokHimsiController::class, 'pojokHimsi'])->name('admin-pojokHimsi');
    Route::get('/bph/admin/dashboard/pojok-himsi/insert', [AdminPojokHimsiController::class, 'formInsertPojokHimsi'])->name('insert-pojokHimsi');
    Route::post('/bph/admin/dashboard/pojok-himsi/insert', [AdminPojokHimsiController::class, 'insertPojokHimsi']);
    Route::get('/bph/admin/dashboard/pojok-himsi/update/{postID}', [AdminPojokHimsiController::class, 'formUpdatePojokHimsi'])->name('update-pojokHimsi');
    Route::post('/bph/admin/dashboard/pojok-himsi/update/{postID}', [AdminPojokHimsiController::class, 'updatePojokHimsi']);
    Route::delete('/bph/admin/dashboard/pojok-himsi', [AdminPojokHimsiController::class, 'deletePojokHimsi'])->name('delete-pojokHimsi');

    Route::get('/bph/admin/dashboard/akademik', [AdminAkademikController::class, 'akademik'])->name('admin-akademik');
    Route::get('/bph/admin/dashboard/akademik/insert', [AdminAkademikController::class, 'formInsertAkademik'])->name('insert-akademik');
    Route::post('/bph/admin/dashboard/akademik/insert', [AdminAkademikController::class, 'insertAkademik']);
    Route::get('/bph/admin/dashboard/akademik/update/{postID}', [AdminAkademikController::class, 'formUpdateAkademik'])->name('update-akademik');
    Route::post('/bph/admin/dashboard/akademik/update/{postID}', [AdminAkademikController::class, 'updateAkademik']);
    Route::delete('/bph/admin/dashboard/akademik', [AdminAkademikController::class, 'deleteAkademik'])->name('delete-akademik');

    Route::get('/bph/admin/dashboard/ekspresi', [AdminEkspresiController::class, 'ekspresi'])->name('admin-ekspresi');
    Route::post('/bph/admin/dashboard/ekspresi/insert', [AdminEkspresiController::class, 'insertEkspresi'])->name('insert-ekspresi');
    Route::post('/bph/admin/dashboard/ekspresi', [AdminEkspresiController::class, 'updateEkspresi'])->name('update-ekspresi');
    Route::delete('/bph/admin/dashboard/ekspresi', [AdminEkspresiController::class, 'deleteEkspresi'])->name('delete-ekspresi');
});
