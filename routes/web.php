<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');

Route::middleware('auth')->group(function () {
    //Route::resource('anbar',);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('seller', App\Http\Controllers\SellerController::class);

    Route::group(['as' => 'string.', 'prefix'=>'string/'], function() {
        Route::resource('cell', App\Http\Controllers\String\CellController::class);
        Route::resource('anbar', App\Http\Controllers\String\AnbarController::class);
        Route::resource('color', App\Http\Controllers\String\ColorController::class);
        Route::resource('material', App\Http\Controllers\String\MaterialController::class);
        Route::resource('grade', App\Http\Controllers\String\GradeController::class);
        Route::resource('item', App\Http\Controllers\String\ItemController::class);
        Route::get('get_qr_code/{item}', [App\Http\Controllers\String\ItemController::class,'get_qr_code'])->name('get_qr_code');
    });
});

require __DIR__ . '/auth.php';
