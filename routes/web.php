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
    Route::resource('customer', App\Http\Controllers\CustomerController::class);
    Route::resource('person', App\Http\Controllers\PersonController::class);
    Route::resource('device', App\Http\Controllers\DeviceController::class);

    Route::group(['as' => 'string.', 'prefix' => 'string/'], function () {
        Route::resource('cell', App\Http\Controllers\String\CellController::class);
        Route::resource('anbar', App\Http\Controllers\String\AnbarController::class);
        Route::resource('color', App\Http\Controllers\String\ColorController::class);
        Route::resource('material', App\Http\Controllers\String\MaterialController::class);
        Route::resource('grade', App\Http\Controllers\String\GradeController::class);
        Route::resource('item', App\Http\Controllers\String\ItemController::class);
        Route::get('exports/{item}', [App\Http\Controllers\String\ItemController::class,'exports'])->name('item.exports');

        Route::get('export', [App\Http\Controllers\String\ExportController::class,'index'])->name('export.index');
        Route::get('search', [App\Http\Controllers\String\ExportController::class,'search'])->name('export.search');
        Route::post('export', [App\Http\Controllers\String\ExportController::class,'export'])->name('export.export');
    });

    Route::group(['as' => 'carpet.', 'prefix' => 'carpet/'], function () {
        Route::resource('cell', App\Http\Controllers\Carpet\CellController::class);
        Route::resource('anbar', App\Http\Controllers\Carpet\AnbarController::class);
    });
});

require __DIR__ . '/auth.php';
