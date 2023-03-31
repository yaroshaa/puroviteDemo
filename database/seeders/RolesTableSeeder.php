<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_metas')->insert([
            'user_id' => 1,
            'meta_key' => 'IsAdmin',
            'meta_value' => 1
        ]);
    }
}
