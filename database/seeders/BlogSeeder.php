<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog')->delete();

        Blog::create([
            'categories_blog_id' => 1,
            'language_id' => 1,
            'name' => 'Post Name',
            'content' => 'Post Content',
            'meta_keys' => 'post, meta, keys ',
            'meta_description' => 'post meta description'
        ]);

        Blog::create([
            'categories_blog_id' => 1,
            'language_id' => 2,
            'name' => 'Post Name 2',
            'content' => 'Post Content 2',
            'meta_keys' => 'post, meta, keys 2',
            'meta_description' => 'post meta description 2'
        ]);
    }
}
