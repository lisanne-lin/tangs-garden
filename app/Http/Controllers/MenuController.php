<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\PageText;
use App\Http\Controllers\DashboardController;
use App\Models\Category;

class MenuController extends Controller
{
    public function index() {
        $categories = Category::orderBy('order', 'ASC')
            ->get();

        $menu_items = Menu::with('category')
            ->orderBy('number', 'ASC')
            ->orderBy('letter', 'ASC')
            ->get();

        $page_text = PageText::where('slug', 'menukaart')
            ->first();

        $sorted_menu_items = array();
        
        // put menu items all under the right category
        foreach ($menu_items as $menu_item) {
            if (!array_key_exists($menu_item->category->name, $sorted_menu_items)) {
                $sorted_menu_items[$menu_item->category->name] = array();
            }
            $sorted_menu_items[$menu_item->category->name] = array_merge($sorted_menu_items[$menu_item->category->name], [$menu_item]);
        }

        return view('/menu', [
            'categories' => $categories,
            'page_text' => $page_text,
            'sorted_menu_items' => $sorted_menu_items,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'number' => 'required|numeric',
            'letter' => 'nullable|size:1',
            'name' => 'required',
            'price' => 'required|numeric',
            'category' => 'required'
        ]);

        // create menu item
        Menu::create([
            'number' => $request->number,
            'letter' => $request->letter,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category,
        ]);
    
        return back();
    }

    public function update(Int $id, Request $request) {
        $this->validate($request, [
            'number' => 'required|numeric',
            'letter' => 'nullable|size:1',
            'name' => 'required',
            'price' => 'required|numeric',
            'category' => 'required'
        ]);

        $dashboard = new DashboardController;

        // create menu item
        Menu::find($id)->update([
            'number' => $request->number,
            'letter' => $request->letter,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category,
        ]);

        return $dashboard->index();
    }

    public function destroy(Menu $menu) {
        // delete row
        $menu->delete();

        return back();
    }

    public function editPage(int $id) {
        $categories = Category::orderBy('order', 'ASC')
            ->get();

        $menu_item = Menu::find($id);

        return view('/dashboard/edit', [
            'menu_item' => $menu_item,
            'categories' => $categories,
        ]);
    }
}
