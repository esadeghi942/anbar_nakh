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


Route::middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::group(['middleware' => 'role_string'], function () {
        Route::resource('seller', App\Http\Controllers\SellerController::class);
        Route::resource('customer', App\Http\Controllers\CustomerController::class);
        Route::resource('person', App\Http\Controllers\PersonController::class);
        Route::resource('device', App\Http\Controllers\DeviceController::class);
    });
    Route::group(['as' => 'string.', 'prefix' => 'string/','middleware' => 'role_string'], function () {
        Route::resource('cell', App\Http\Controllers\String\CellController::class);
        Route::resource('anbar', App\Http\Controllers\String\AnbarController::class);
        Route::resource('color', App\Http\Controllers\String\ColorController::class);
        Route::resource('material', App\Http\Controllers\String\MaterialController::class);
        Route::resource('grade', App\Http\Controllers\String\GradeController::class);
        Route::resource('layer', App\Http\Controllers\String\LayerController::class);
        Route::resource('enter', App\Http\Controllers\String\EnterController::class);
        Route::resource('string_group',\App\Http\Controllers\String\StringGroupController::class);
        Route::get('cell/{cell}/export', [App\Http\Controllers\String\CellController::class,'exports'])->name('cell.exports');
        Route::get('cell/{cell}/qr_code', [App\Http\Controllers\String\CellController::class,'qr_code'])->name('cell.qr_code');

        Route::get('export', [App\Http\Controllers\String\ExportController::class,'index'])->name('export.index');
        Route::get('search', [App\Http\Controllers\String\ExportController::class,'search'])->name('export.search');
        Route::get('struct_cell', [App\Http\Controllers\String\ReportController::class,'struct_cell'])->name('report.struct_cell');
        Route::post('export', [App\Http\Controllers\String\ExportController::class,'export'])->name('export.export');
    });

    Route::group(['as' => 'carpet.', 'prefix' => 'carpet/','middleware' => 'role_carpet'], function () {
        Route::resource('cell', App\Http\Controllers\Carpet\CellController::class);
        Route::resource('anbar', App\Http\Controllers\Carpet\AnbarController::class);
        Route::group(['as' => 'qr_code.', 'prefix' => 'qr_code/'], function () {
            Route::get('one', [\App\Http\Controllers\Carpet\QrCodeController::class, 'one'])->name('one');
            Route::post('get_cell', [\App\Http\Controllers\Carpet\QrCodeController::class, 'get_cell'])->name('get_cell');
            Route::get('multi', [\App\Http\Controllers\Carpet\QrCodeController::class, 'multi'])->name('multi');
        });
    });
});

require __DIR__ . '/auth.php';
