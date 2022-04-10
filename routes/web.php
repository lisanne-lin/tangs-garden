<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Models\Menu;

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

Route::post('/menu', [MenuController::class, 'store'])->name('menu');

Route::get('/dashboard', function () {
    $menu_items = Menu::orderBy('number', 'ASC')
        ->orderBy('name', 'ASC')
        ->get();

    return view('dashboard', [
        'menu_items' => $menu_items
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
