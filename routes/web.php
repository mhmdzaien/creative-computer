<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\ServiceRequestController;
use App\Http\Controllers\Api\ServiceProgressController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\UserController;
use App\Models\Status;

Route::get('/', function () {
    return view('home');
});

Route::get('/produk', function () {
    return view('produk');
});
Route::get('/cek-service', function () {
    return view('cek-service',['status'=>Status::all()]);
});

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'verified'])->name('admin');

Route::get('/service-status/{id}',[ServiceRequestController::class,'check'])->name('service-status');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/servis/cetak/{id}', [ServiceRequestController::class, 'print'])->name('service.print');
    Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
        Route::resource('status', StatusController::class);
        Route::resource('settings',SettingController::class)->only(['show','store']);
        Route::resource('service-request', ServiceRequestController::class);
        Route::resource('service-progress', ServiceProgressController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('brand', BrandController::class);
        Route::resource('product', ProductController::class);
        Route::resource('users', UserController::class);
    });
});

require __DIR__ . '/auth.php';
