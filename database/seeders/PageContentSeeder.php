<?php

namespace Database\Seeders;

use App\Models\PageContent;
use App\Models\PageInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page_content')->delete();

        PageContent::create([
            'language_id' => 1,
            'page_id' => 1,
            'title' => 'About us',
            'content' => 'about us content',
            'image' => 'default.jpg',
            'status' => 1
        ]);

        PageContent::create([
            'language_id' => 2,
            'page_id' => 1,
            'title' => 'About us 2',
            'content' => 'about us content 2',
            'image' => 'default.jpg',
            'status' => 1
        ]);

        PageContent::create([
            'language_id' => 1,
            'page_id' => 2,
            'title' => 'Manufacturing',
            'content' => 'manufacturing content',
            'image' => 'default.jpg',
            'status' => 1
        ]);

        PageContent::create([
            'language_id' => 2,
            'page_id' => 2,
            'title' => 'Manufacturing',
            'content' => 'manufacturing content 2',
            'image' => 'default.jpg',
            'status' => 1
        ]);

        PageContent::create([
            'language_id' => 1,
            'page_id' => 3,
            'title' => 'Certificates',
            'content' => 'certificates content',
            'image' => 'default.jpg',
            'status' => 1
        ]);

        PageContent::create([
            'language_id' => 2,
            'page_id' => 3,
            'title' => 'Certificates',
            'content' => 'certificates content',
            'image' => 'default.jpg',
            'status' => 1
        ]);

        PageContent::create([
            'language_id' => 1,
            'page_id' => 4,
            'title' => 'Technologies',
            'content' => 'technologies content',
            'image' => 'default.jpg',
            'status' => 1
        ]);

        PageContent::create([
            'language_id' => 2,
            'page_id' => 4,
            'title' => 'Technologies 2',
            'content' => 'technologies content',
            'image' => 'default.jpg',
            'status' => 1
        ]);

        PageContent::create([
            'language_id' => 1,
            'page_id' => 4,
            'title' => 'Technologies',
            'content' => 'technologies content',
            'image' => 'default.jpg',
            'status' => 1
        ]);

        PageContent::create([
            'language_id' => 2,
            'page_id' => 4,
            'title' => 'Technologies 2',
            'content' => 'technologies content',
            'image' => 'default.jpg',
            'status' => 1
        ]);
    }
}
