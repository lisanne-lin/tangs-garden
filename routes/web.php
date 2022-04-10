<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Models\Menu;
use App\Models\Category;

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

/**
 * render menu page
 */
Route::get('/menu', function () {
    // get all Menu items orderd
    $menu_items = Menu::orderBy('number', 'ASC')
        ->orderBy('name', 'ASC')
        ->get();

    return view('menu', [
        'menu_items' => $menu_items
    ]);
})->name('menu');

/**
 * On menu post do store
 */
Route::post('/menu', [MenuController::class, 'store']);
Route::delete('/menu/{menu}/', [MenuController::class, 'destroy'])->name('menu/');

Route::get('/dashboard/settings', function () {
    // get all Menu items orderd
    $categories = Category::orderBy('order', 'ASC')
        ->get();

    return view('/dashboard/settings', [
        'categories' => $categories
    ]);
})->middleware(['auth'])->name('dashboard/settings');

Route::post('/dashboard/settings/category', [CategoryController::class, 'store'])->name('/dashboard/settings/category');

Route::get('/dashboard', function () {
    $categories = Category::orderBy('order', 'ASC')
        ->get();

    $menu_items = Menu::with('category')
        ->orderBy('number', 'ASC')
        ->orderBy('name', 'ASC')
        ->get();

    return view('/dashboard/index', [
        'menu_items' => $menu_items,
        'categories' => $categories,
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
