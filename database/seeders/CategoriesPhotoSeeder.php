<?php

namespace Database\Seeders;

use App\Models\CategoryPhoto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories_photos')->delete();
        CategoryPhoto::create([
            'key' => 'test photo category',
            'status' => 1
        ]);
    }
}
