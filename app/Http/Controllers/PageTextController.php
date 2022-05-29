<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageText;

class PageTextController extends Controller
{   
    /**
     * Get the slugs information form the database and return a pagetext view with it.
     * 
     * @param string $slug the slug of the page you want to load.
     * @return mixed returns the view with the page text.
     */
    private function pageText(string $slug) {
        $page_text = PageText::where('slug', $slug)
            ->first();

        return view('/pagetext', [
            'page_text' => $page_text,
        ]);
    }

    public function maandaanbieding() {
        return $this->pageText('maandaanbieding');
    }

    public function contact() {
        return $this->pageText('contact');
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
