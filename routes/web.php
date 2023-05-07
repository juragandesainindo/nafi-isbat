<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JamaahController;
use App\Http\Controllers\Koordinator\KoordinatorPaketNafiIsbatController;
use App\Http\Controllers\Koordinator\KoordinatorTenderNafiIsbatController;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\NafiIsbatController;
use App\Http\Controllers\Pemimpin\PemimpinHomeController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\WilayahController;
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
    return view('auth.login');
});

Auth::routes();

// Route::get('register', function () {
//     return abort(404);
// });

Route::get('home', [HomeController::class, 'index'])->name('home');

// ======================= ADMIN =======================
Route::group(['admin' => 'Admin'], function () {
});

// ======================= PEMIMPIN =======================
Route::group(['pemimpin' => 'Pemimpin'], function () {
});

// ======================= KOORDINATOR =======================
Route::group(['koordinator' => 'Koordinator'], function () {
    Route::get('koordinator/paket-nafi-isbat', [KoordinatorPaketNafiIsbatController::class, 'index'])->name('paket.index');
    Route::get('koordinator/paket-nafi-isbat/create', [KoordinatorPaketNafiIsbatController::class, 'create'])->name('paket.create');
    Route::post('koordinator/paket-nafi-isbat', [KoordinatorPaketNafiIsbatController::class, 'store'])->name('paket.store');
    Route::get('koordinator/paket-nafi-isbat/{id}/{paket}/edit', [KoordinatorPaketNafiIsbatController::class, 'edit'])->name('paket.edit');
    Route::put('koordinator/paket-nafi-isbat/{id}/{paket}', [KoordinatorPaketNafiIsbatController::class, 'update'])->name('paket.update');

    Route::get('koordinator/tender-nafi-isbat', [KoordinatorTenderNafiIsbatController::class, 'index'])->name('tender.index');
    Route::get('koordinator/tender-nafi-isbat/{id}/{jamaahId}', [KoordinatorTenderNafiIsbatController::class, 'show'])->name('tender.show');
    Route::post('koordinator/tender-nafi-isbat', [KoordinatorTenderNafiIsbatController::class, 'store'])->name('tender.store');
    Route::put('koordinator/tender-nafi-isbat/{id}', [KoordinatorTenderNafiIsbatController::class, 'update'])->name('tender.update');
    Route::delete('koordinator/tender-nafi-isbat/{id}', [KoordinatorTenderNafiIsbatController::class, 'destroy'])->name('tender.destroy');
});







Route::get('log-activity', [LogActivityController::class, 'logActivity']);

Route::resource('user-management', UserManagementController::class);
Route::get('user-management/{id}/edit-password', [UserManagementController::class, 'editPassword'])->name('user-management.edit-password');
Route::post('user-management/{id}', [UserManagementController::class, 'updatePassword'])->name('user-management.update-password');

// ======================= WILAYAH =======================
Route::get('wilayah', [WilayahController::class, 'index'])->name('wilayah.index');
Route::get('wilayah/create', [WilayahController::class, 'create'])->name('wilayah.create');
Route::post('wilayah', [WilayahController::class, 'store'])->name('wilayah.store');
Route::get('wilayah/{id}/{slug}/edit', [WilayahController::class, 'edit'])->name('wilayah.edit');
Route::put('wilayah/{id}/{slug}', [WilayahController::class, 'update'])->name('wilayah.update');
Route::delete('wilayah/{id}', [WilayahController::class, 'destroy'])->name('wilayah.destroy');

Route::get('get-wilayah', [JamaahController::class, 'getWilayah'])->name('getWilayah');

// ======================= JAMAAH =======================
Route::get('jamaah', [JamaahController::class, 'index'])->name('jamaah.index');
Route::get('jamaah/create', [JamaahController::class, 'create'])->name('jamaah.create');
Route::post('jamaah', [JamaahController::class, 'store'])->name('jamaah.store');

Route::get('jamaah/create/{id}/{slug}', [JamaahController::class, 'createPemimpin'])->name('jamaah.createPemimpin');
Route::post('jamaah/{id}/{slug}', [JamaahController::class, 'storePemimpin'])->name('jamaah.storePemimpin');

Route::get('jamaah/{id}/{slug}', [JamaahController::class, 'show'])->name('jamaah.show');
Route::get('jamaah/detail/{id}/{slug}', [JamaahController::class, 'detail'])->name('jamaah.detail');
Route::get('jamaah/{id}/{slug}/edit', [JamaahController::class, 'edit'])->name('jamaah.edit');
Route::put('jamaah/{id}/{slug}', [JamaahController::class, 'update'])->name('jamaah.update');
Route::put('jamaah/{id}/{slug}', [JamaahController::class, 'updatePemimpin'])->name('jamaah.updatePemimpin');
Route::delete('jamaah/{id}/{slug}', [JamaahController::class, 'destroy'])->name('jamaah.destroy');

// ======================= NAFI ISBAT =======================
// PAKET
Route::get('paket-nafi-isbat', [NafiIsbatController::class, 'paketIndex'])->name('paket-nafi-isbat.paketIndex');
Route::post('paket-nafi-isbat', [NafiIsbatController::class, 'paketStore'])->name('paket-nafi-isbat.paketStore');
Route::put('paket-nafi-isbat/{id}', [NafiIsbatController::class, 'paketUpdate'])->name('paket-nafi-isbat.paketUpdate');
Route::delete('paket-nafi-isbat/{id}', [NafiIsbatController::class, 'paketDestroy'])->name('paket-nafi-isbat.paketDestroy');

// TENDER
Route::get('tender-nafi-isbat', [NafiIsbatController::class, 'tenderIndex'])->name('tender-nafi-isbat.tenderIndex');
Route::get('tender-nafi-isbat/create', [NafiIsbatController::class, 'tenderCreate'])->name('tender-nafi-isbat.tenderCreate');
Route::post('tender-nafi-isbat', [NafiIsbatController::class, 'tenderStore'])->name('tender-nafi-isbat.tenderStore');
Route::get('tender-nafi-isbat/{id}/{jamaah_id}/edit', [NafiIsbatController::class, 'tenderEdit'])->name('tender-nafi-isbat.tenderEdit');
Route::put('tender-nafi-isbat/{id}/{jamaah_id}', [NafiIsbatController::class, 'tenderUpdate'])->name('tender-nafi-isbat.tenderUpdate');
Route::delete('tender-nafi-isbat/{id}', [NafiIsbatController::class, 'tenderDestroy'])->name('tender-nafi-isbat.tenderDestroy');

// BAYAR
Route::get('bayar-nafi-isbat/{id}/{jamaah_id}', [NafiIsbatController::class, 'bayarTender'])->name('bayar-nafi-isbat.bayarTender');
Route::post('bayar-nafi-isbat', [NafiIsbatController::class, 'bayarStore'])->name('bayar-nafi-isbat.bayarStore');
Route::put('bayar-nafi-isbat/{id}', [NafiIsbatController::class, 'bayarUpdate'])->name('bayar-nafi-isbat.bayarUpdate');
Route::delete('bayar-nafi-isbat/{id}', [NafiIsbatController::class, 'bayarDestroy'])->name('bayar-nafi-isbat.bayarDestroy');