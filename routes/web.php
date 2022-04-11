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


Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::post('/menu', [MenuController::class, 'store']);
Route::delete('/menu/{menu}/', [MenuController::class, 'destroy'])->name('menu/');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/menu/edit/{id}', [MenuController::class, 'editPage'])->middleware(['auth'])->name('dashboard/menu/edit/');
Route::put('/dashboard/menu/edit/{id}', [MenuController::class, 'update'])->name('dashboard/menu/edit/');

Route::get('/dashboard/settings', [SettingsController::class, 'index'])->middleware(['auth'])->name('dashboard/settings');
Route::post('/dashboard/settings/category', [CategoryController::class, 'store'])->name('dashboard/settings/category');
Route::delete('/dashboard/settings/category/{category}/', [CategoryController::class, 'destroy'])->name('dashboard/settings/category/');
Route::put('/dashboard/settings/text', [PageTextController::class, 'update'])->name('dashboard/settings/text');

require __DIR__.'/auth.php';
