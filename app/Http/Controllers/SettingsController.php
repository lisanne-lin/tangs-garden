<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class SettingsController extends Controller
{
    public function index() {
        // get all Menu items orderd
        $categories = Category::orderBy('order', 'ASC')
            ->get();

        return view('/dashboard/settings', [
            'categories' => $categories
        ]);
    }
}
