<?php

namespace Database\Seeders;

use App\Models\AnnouncementCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AnnouncementCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AnnouncementCategory::create([
            'name' => 'Sekolah',
            'slug' => Str::slug('sekolah')
        ]);

        AnnouncementCategory::create([
            'name' => 'Umum',
            'slug' => Str::slug('umum')
        ]);
    }
}
