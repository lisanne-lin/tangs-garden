<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\PageText;

class SettingsController extends Controller
{
    public function index() {
        // get all Menu items orderd
        $categories = Category::orderBy('order', 'ASC')
            ->get();
        
        $page_texts = PageText::get();    

        return view('/dashboard/settings', [
            'categories' => $categories,
            'page_texts' => $page_texts
        ]);
    }
}
