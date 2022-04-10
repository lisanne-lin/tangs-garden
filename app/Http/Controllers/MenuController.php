<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;

class MenuController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, [
            'number' => 'required',
            'name' => ['required'],
            'price' => 'required|numeric',
            'description' => 'required',
            'category' => 'required'
        ]);

        Menu::create([
            'number' => $request->number,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => 1,
        ]);

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

    public function destroy(Menu $menu) {
        $menu->delete();

        return back();
    }
}
