<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PageTextController;
use App\Http\Controllers\DashboardController;
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
    return view('welcome');
})->name('home');

Route::get('/maandaanbieding', [PageTextController::class, 'maandaanbieding'])->name('maandaanbieding');
Route::get('/contact', [PageTextController::class, 'contact'])->name('contact');


Route::group(['prefix' => 'menu'], function() {
    Route::get('/', [MenuController::class, 'index'])->name('menu');
    Route::post('/', [MenuController::class, 'store']);
    Route::delete('/{menu}/', [MenuController::class, 'destroy'])->name('menu/');
});

Route::group(['prefix' => 'dashboard'], function() {
    Route::get('/', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
    Route::get('/menu/edit/{id}', [MenuController::class, 'editPage'])->middleware(['auth'])->name('dashboard/menu/edit/');
    Route::put('/menu/edit/{id}', [MenuController::class, 'update'])->name('dashboard/menu/edit/');

    Route::get('/settings', [SettingsController::class, 'index'])->middleware(['auth'])->name('dashboard/settings');
    Route::post('/settings/category', [CategoryController::class, 'store'])->name('dashboard/settings/category');
    Route::delete('/settings/category/{category}', [CategoryController::class, 'destroy'])->name('dashboard/settings/category/');
    Route::put('/settings/text', [PageTextController::class, 'update'])->name('dashboard/settings/text');
});

require __DIR__.'/auth.php';
