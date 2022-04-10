<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, [
            'number' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category' => 'required'
        ]);

        Menu::create([
            'number' => $request->order_number,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => 1,
        ]);

        $menu_items = Menu::orderBy('number', 'ASC')
            ->orderBy('name', 'ASC')
            ->get();

        return view('dashboard', [
            'menu_items' => $menu_items
        ]);
    }
}
