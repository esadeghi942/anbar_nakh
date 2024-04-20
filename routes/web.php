<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/migrate', [\App\Http\Controllers\HomeController::class, 'migrate']);
Route::get('/seed/{path}', [\App\Http\Controllers\HomeController::class, 'seed']);
Route::get('/create-symlink', function () {
    Artisan::call('storage:link');
    //exec('composer dump-autoload');
});
Route::middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');
    Route::get('/add_up_cells', [\App\Http\Controllers\HomeController::class, 'add_up_cells']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::group(['middleware' => 'role_admin'], function () {
        Route::resource('company', \App\Http\Controllers\CompanyControlle::class);
    });
    Route::group(['middleware' => 'role_string'], function () {
        Route::resource('seller', App\Http\Controllers\SellerController::class);
        Route::resource('person', App\Http\Controllers\PersonController::class);
        Route::resource('device', App\Http\Controllers\DeviceController::class);
    });
    Route::group(['as' => 'string.', 'prefix' => 'string/', 'middleware' => 'role_string'], function () {
        Route::resource('cell', App\Http\Controllers\String\CellController::class);
        Route::resource('anbar', App\Http\Controllers\String\AnbarController::class);
        Route::resource('color', App\Http\Controllers\String\ColorController::class);
        Route::resource('material', App\Http\Controllers\String\MaterialController::class);
        Route::resource('grade', App\Http\Controllers\String\GradeController::class);
        Route::resource('layer', App\Http\Controllers\String\LayerController::class);
        Route::resource('enter', App\Http\Controllers\String\EnterController::class);
        Route::resource('string_group', \App\Http\Controllers\String\StringGroupController::class);
        Route::get('cell/{cell}/qr_code', [App\Http\Controllers\String\CellController::class, 'qr_code'])->name('cell.qr_code');
        Route::post('cell/{cell}/weight', [App\Http\Controllers\String\CellController::class, 'save_weight'])->name('cell.save_weight');

        /*  Route::get('cell/{cell}/export', [App\Http\Controllers\String\CellController::class, 'exports'])->name('cell.exports');
        Route::get('cell/{cell}/enters', [App\Http\Controllers\String\CellController::class, 'enters'])->name('cell.enters');*/

        Route::get('free_total', [App\Http\Controllers\String\FreeController::class, 'free_total'])->name('cell.free_total');
        Route::post('free_total', [App\Http\Controllers\String\FreeController::class, 'free_total_save'])->name('cell.free_total.save');
        Route::post('free_weight', [App\Http\Controllers\String\FreeController::class, 'free_weight'])->name('cell.free.weight');
        Route::get('free_one', [App\Http\Controllers\String\FreeController::class, 'free_one'])->name('cell.free_one');
        Route::post('free_one', [App\Http\Controllers\String\FreeController::class, 'free_one_save'])->name('cell.free_one.save');
        Route::post('free_one_search', [App\Http\Controllers\String\FreeController::class, 'free_one_search'])->name('cell.free_one.search');

        Route::get('transfer', [App\Http\Controllers\String\TransferController::class, 'index'])->name('transfer.index');
        Route::post('transfer', [App\Http\Controllers\String\TransferController::class, 'save'])->name('transfer.save');

        Route::get('export', [App\Http\Controllers\String\ExportController::class, 'index'])->name('export.index');
        Route::get('search', [App\Http\Controllers\String\ExportController::class, 'search'])->name('export.search');

        Route::group(['as' => 'report.', 'prefix' => 'report/'], function () {
            Route::get('struct_cell', [App\Http\Controllers\String\ReportController::class, 'struct_cell'])->name('struct_cell');
            Route::get('anbar/{anbar}', [App\Http\Controllers\String\ReportController::class, 'anbar'])->name('anbar');
            Route::get('index', [App\Http\Controllers\String\ReportController::class, 'index'])->name('index');
            Route::get('search', [App\Http\Controllers\String\ReportController::class, 'search'])->name('search');
            Route::get('total', [App\Http\Controllers\String\ReportController::class, 'total'])->name('total');

            Route::get('search_in_cell', [App\Http\Controllers\String\ReportController::class, 'search_in_cell'])->name('search_in_cell');
            Route::post('result_search_in_cell', [App\Http\Controllers\String\ReportController::class, 'result_search_in_cell'])->name('result_search_in_cell');

        });

        Route::post('export', [App\Http\Controllers\String\ExportController::class, 'export'])->name('export.export');

        Route::resource('group_qr_code', App\Http\Controllers\String\GroupQrCodeController::class);
        Route::get('enter_group_qr_code', [App\Http\Controllers\String\GroupQrCodeController::class, 'enter'])->name('group_qr_code.enter');
        Route::get('group_qr_code/{type}/list', [App\Http\Controllers\String\GroupQrCodeController::class, 'listt'])->name('group_qr_code.list');
        Route::get('group_qr_code/{groupQrCode}/exports', [App\Http\Controllers\String\GroupQrCodeController::class, 'exports'])->name('group_qr_code.exports');

        Route::get('group_qr_code_search', [App\Http\Controllers\String\GroupQrCodeController::class, 'search'])->name('group_qr_code.search');
        Route::post('group_qr_code/enter_cells', [App\Http\Controllers\String\GroupQrCodeController::class, 'enter_cells'])->name('group_qr_code.enter_cells');
        Route::post('group_qr_code/edit_string_type', [App\Http\Controllers\String\GroupQrCodeController::class, 'edit_string_type'])->name('group_qr_code.edit_string_type');

        Route::get('export_qr_code', [App\Http\Controllers\String\ExportController::class, 'export_multi_qr_codes'])->name('export_multi_qr_codes');
        Route::post('export_qr_code', [App\Http\Controllers\String\ExportController::class, 'export_multi_qr_codes_save'])->name('export_multi_qr_codes.save');
        Route::post('search_multi_qr_codes', [App\Http\Controllers\String\ExportController::class, 'search_multi_qr_codes'])->name('search_multi_qr_codes');

        Route::get('search_qr_code', [App\Http\Controllers\String\QrCodeController::class, 'index'])->name('qr_code.index');
        Route::post('qr_code_search', [App\Http\Controllers\String\QrCodeController::class, 'search'])->name('qr_code.search');

        Route::post('qr_code/enter_weight', [App\Http\Controllers\String\QrCodeController::class, 'enter_weight'])->name('qr_code.enter_weight');
        Route::post('qr_code/enter_cells', [App\Http\Controllers\String\QrCodeController::class, 'enter_cells'])->name('qr_code.enter_cells');
        Route::post('qr_code/export_cells', [App\Http\Controllers\String\QrCodeController::class, 'export_cells'])->name('qr_code.export_cells');

        Route::get('group_qr_code/{group_qr_code}/weight', [App\Http\Controllers\String\GroupQrCodeController::class, 'weight'])->name('group_qr_code.weight');
        Route::post('group_qr_code/{group_qr_code}/weight', [App\Http\Controllers\String\GroupQrCodeController::class, 'save_weight'])->name('group_qr_code.save_weight');

    });

    Route::group(['middleware' => 'role_carpet'], function () {
        Route::resource('customer', App\Http\Controllers\CustomerController::class);
        Route::resource('weaver', App\Http\Controllers\Carpet\WeaverController::class);

    });
    Route::group(['as' => 'roll.', 'prefix' => 'roll/', 'middleware' => 'role_roll'], function () {
        Route::resource('size', App\Http\Controllers\Roll\SizeController::class);
        Route::resource('factor', \App\Http\Controllers\Roll\FactorController::class);
        Route::resource('color', App\Http\Controllers\Roll\ColorController::class);
    });
    Route::group(['as' => 'carpet.', 'prefix' => 'carpet/', 'middleware' => 'role_carpet'], function () {
        Route::resource('cell', App\Http\Controllers\Carpet\CellController::class);
        Route::resource('anbar', App\Http\Controllers\Carpet\AnbarController::class);
        Route::resource('map', App\Http\Controllers\Carpet\MapController::class);
        Route::get('map/{id}/get_path', [\App\Http\Controllers\Carpet\MapController::class, 'get_path'])->name('get_path');

        Route::resource('color', App\Http\Controllers\Carpet\ColorController::class);
        Route::resource('device', \App\Http\Controllers\Carpet\DeviceControlle::class);
        Route::resource('order', App\Http\Controllers\Carpet\OrderController::class);

        Route::group(['as' => 'qr_code.', 'prefix' => 'qr_code/'], function () {
            Route::get('one', [\App\Http\Controllers\Carpet\QrCodeController::class, 'one'])->name('one');
            Route::post('get_cell', [\App\Http\Controllers\Carpet\QrCodeController::class, 'get_cell'])->name('get_cell');
            Route::get('multi', [\App\Http\Controllers\Carpet\QrCodeController::class, 'multi'])->name('multi');
        });
    });
});

require __DIR__ . '/auth.php';
