<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();
        Setting::create([
            'school_name' => 'SMAN 4 Timun',
            'logo' => 'logo/default.png',
            'email' => 'sman4timun@example.com',
            'phone_number' => '+(62)821 7766 2211',
            'address' => 'Jalan Mekar Mawar Desa Maju Jaya, Bersih, 2998877',
            'visi' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis quasi architecto beatae vitae dicta sunt explicabo.',
            'misi' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis quasi architecto beatae vitae dicta sunt explicabo.',
            'front_image' => 'front_image/default.jpg',
            'facebook' => 'https://facebook.com',
            'youtube' => 'https://youtube.com',
            'instagram' => 'https://instagram.com',
            // 'twitter ' => 'https://twitter.com'
        ]);
    }
}
