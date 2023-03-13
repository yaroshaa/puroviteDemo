<?php

namespace Database\Seeders;

use App\Models\CategoryBlogInfo;
use App\Models\CategoryPhotoInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryPhotoInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_photo_info')->delete();

        CategoryPhotoInfo::create([
            'categories_photos_id' => 1,
            'language_id' => 1,
            'name' => 'Name',
            'description' => 'Description Photo Category',
            'meta_keys' => 'meta, keys, Photo Category',
            'meta_description' => 'meta description'
        ]);

        CategoryPhotoInfo::create([
            'categories_photos_id' => 1,
            'language_id' => 2,
            'name' => 'Name 2',
            'description' => 'Description Photo Category 2',
            'meta_keys' => 'meta, keys, Photo Category, 2',
            'meta_description' => 'meta description Photo Category 2'
        ]);
    }
}
