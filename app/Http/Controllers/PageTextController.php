<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageText;

class PageTextController extends Controller
{
    public function maandaanbieding() {
        $page_text = PageText::where('slug', 'maandaanbieding')
            ->first();

        return view('/maandaanbieding', [
            'page_text' => $page_text,
        ]);
    }

    public function contact() {
        $page_text = PageText::where('slug', 'contact')
            ->first();

        return view('/contact', [
            'page_text' => $page_text,
        ]);
    }

    public function update(Request $request) {
        $keys = $request->all();
        unset($keys['_token']);
        unset($keys['_method']);

        foreach($keys as $slug => $value) {
            PageText::where('slug', $slug)
                ->first()
                ->update(['body' => $value]);
        }

        return back();
    }
}
