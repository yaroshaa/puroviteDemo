<?php

namespace Database\Seeders;

use App\Models\PageInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page_info')->delete();

        PageInfo::create([
            'language_id' => 1,
            'page_id' => 1,
            'name' => 'About us',
            'tags' => 'about us, info',
            'meta_keys' => 'meta, keys, about us',
            'meta_description' => 'meta description about us'
        ]);

        PageInfo::create([
            'language_id' => 2,
            'page_id' => 1,
            'name' => 'About us 2',
            'tags' => 'about us, info 2',
            'meta_keys' => 'meta, keys, about us 2',
            'meta_description' => 'meta description about us 2'
        ]);

        PageInfo::create([
            'language_id' => 1,
            'page_id' => 2,
            'name' => 'Manufacturing',
            'tags' => 'manufacturing, info',
            'meta_keys' => 'meta, keys, manufacturing',
            'meta_description' => 'meta description manufacturing'
        ]);

        PageInfo::create([
            'language_id' => 2,
            'page_id' => 2,
            'name' => 'Manufacturing',
            'tags' => 'manufacturing, info 2',
            'meta_keys' => 'meta, keys, manufacturing 2',
            'meta_description' => 'meta description manufacturing 2'
        ]);

        PageInfo::create([
            'language_id' => 1,
            'page_id' => 3,
            'name' => 'Certificates',
            'tags' => 'certificates, info',
            'meta_keys' => 'meta, keys, certificates',
            'meta_description' => 'meta description certificates'
        ]);

        PageInfo::create([
            'language_id' => 2,
            'page_id' => 3,
            'name' => 'Certificates',
            'tags' => 'certificates, info 2',
            'meta_keys' => 'meta, keys, certificates 2',
            'meta_description' => 'meta description certificates 2'
        ]);

        PageInfo::create([
            'language_id' => 1,
            'page_id' => 4,
            'name' => 'Technologies',
            'tags' => 'technologies, info',
            'meta_keys' => 'meta, keys, technologies',
            'meta_description' => 'meta description technologies'
        ]);

        PageInfo::create([
            'language_id' => 2,
            'page_id' => 4,
            'name' => 'Technologies 2',
            'tags' => 'technologies, info 2',
            'meta_keys' => 'meta, keys, technologies 2',
            'meta_description' => 'meta description technologies 2'
        ]);


        PageInfo::create([
            'language_id' => 1,
            'page_id' => 5,
            'name' => 'Facility',
            'tags' => 'facility, info',
            'meta_keys' => 'meta, keys, facility',
            'meta_description' => 'meta description facility'
        ]);

        PageInfo::create([
            'language_id' => 2,
            'page_id' => 5,
            'name' => 'Facility 2',
            'tags' => 'facility, info 2',
            'meta_keys' => 'meta, keys, facility 2',
            'meta_description' => 'meta description facility 2'
        ]);


        PageInfo::create([
            'language_id' => 1,
            'page_id' => 6,
            'name' => 'Services',
            'tags' => 'services, info',
            'meta_keys' => 'meta, keys, services',
            'meta_description' => 'meta description services'
        ]);

        PageInfo::create([
            'language_id' => 2,
            'page_id' => 6,
            'name' => 'Services 2',
            'tags' => 'services, info 2',
            'meta_keys' => 'meta, keys, services 2',
            'meta_description' => 'meta description services 2'
        ]);
    }
}
