<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingsController;
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
Route::get('/dashboard/settings', [SettingsController::class, 'index'])->middleware(['auth'])->name('dashboard/settings');
Route::post('/dashboard/settings/category', [CategoryController::class, 'store'])->name('/dashboard/settings/category');

require __DIR__.'/auth.php';
