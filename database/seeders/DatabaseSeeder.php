<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (DB::table('languages')->count() == 0) {
            DB::table('languages')->insert([
                ['locale' => 'uk',
                    'prefix' => 'uk_UA',
                ],
                ['locale' => 'en',
                    'prefix' => 'en_GB',
                ],
                ['locale' => 'ru',
                    'prefix' => 'ru_RU',
                ],
            ]);
        }
    }
}
