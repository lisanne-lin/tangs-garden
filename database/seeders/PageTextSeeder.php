<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PageText;
use Illuminate\Database\Seeder;

class PageTextSeeder extends Seeder
{
    /**
     * Create all the empty pagetexts.
     *
     * @return void
     */
    public function run()
    {
        PageText::create([
            'slug' => 'menukaart',
            'title' => 'Menukaart',
        ]);

        PageText::create([
            'slug' => 'maandaanbieding',
            'title' => 'Maandaanbieding',
        ]);

        PageText::create([
            'slug' => 'contact',
            'title' => 'Contact',
        ]);
    }
}
