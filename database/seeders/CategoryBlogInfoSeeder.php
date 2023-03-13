<?php

namespace Database\Seeders;

use App\Models\CategoryBlogInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryBlogInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_blog_info')->delete();

        CategoryBlogInfo::create([
            'categories_blog_id' => 1,
            'language_id' => 1,
            'name' => 'Name',
            'description' => 'Description',
            'meta_keys' => 'meta, keys',
            'meta_description' => 'meta description'
        ]);

        CategoryBlogInfo::create([
            'categories_blog_id' => 1,
            'language_id' => 2,
            'name' => 'Name 2',
            'description' => 'Description 2',
            'meta_keys' => 'meta, keys 2',
            'meta_description' => 'meta description 2'
        ]);
    }
}
