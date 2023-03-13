<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->delete();

        Page::create([
            'id' => 1,
            'key' => 'about_us',
            'nav' => true,
            'status' => true
        ]);

        Page::create([
            'id' => 2,
            'key' => 'manufacturing',
            'nav' => true,
            'status' => true
        ]);

        Page::create([
            'id' => 3,
            'key' => 'certificates',
            'nav' => true,
            'status' => true
        ]);

        Page::create([
            'id' => 4,
            'key' => 'technologies',
            'nav' => true,
            'status' => true
        ]);

        Page::create([
            'id' => 5,
            'key' => 'facility',
            'nav' => true,
            'status' => true
        ]);

        Page::create([
            'id' => 6,
            'key' => 'services',
            'nav' => true,
            'status' => true
        ]);
    }
}
