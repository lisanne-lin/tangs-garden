<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
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

        return view('/menu', [
            'menu_items' => $menu_items,
            'categories' => $categories,
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

        // create if it has a letter or new number is bigger than last
        if ($request->letter || (Menu::latest()->limit(1)->first() !== null && intval($request->number) > Menu::latest()->limit(1)->first()->number)) {

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

        // if not than find all numbers above and increment with 1
        Menu::where('number', '>=', $request->number)
            ->update([
                'number'=> DB::raw('number+1')
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

    public function destroy(Menu $menu) {
        // delete row
        $menu->delete();

        // check if more with that number exsist if not than decrement all rows above
        if (Menu::where('number', $menu->number)->get()->count() === 0) {
            Menu::where('number', '>', $menu->number)
                ->update([
                    'number'=> DB::raw('number-1')
            ]);
        }

        return back();
    }
}
