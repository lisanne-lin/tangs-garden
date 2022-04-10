<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index() {
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
    }
}
