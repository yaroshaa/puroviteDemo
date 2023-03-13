<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(1)->create();
        $this->call(LanguagesSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(CategoriesBlogSeeder::class);
        $this->call(CategoryBlogInfoSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(CategoriesPhotoSeeder::class);
        $this->call(CategoryPhotoInfoSeeder::class);
        $this->call(PhotosSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(PageInfoSeeder::class);
        $this->call(PageContentSeeder::class);
    }
}
