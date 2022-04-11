<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, [
            'name' => ['required'],
        ]);

        $category_count = Category::count();

        Category::create([
            'name' => $request->name,
            'order' => $category_count,
        ]);

        $categories = Category::orderBy('order', 'ASC')
            ->get();

        return view('dashboard/settings', [
            'categories' => $categories
        ]);
    }

    public function destroy(Category $category) {
        $category->delete();

        return back();
    }
}
