<?php

namespace Database\Seeders;

use App\Models\CategoryBlog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories_blog')->delete();
        CategoryBlog::create([
            'key' => 'test'
        ]);
    }
}
