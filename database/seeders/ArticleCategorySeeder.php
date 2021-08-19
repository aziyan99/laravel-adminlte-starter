<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleCategory::create([
            'name' => 'Kimia',
            'slug' => Str::slug('kimia')
        ]);

        ArticleCategory::create([
            'name' => 'Umum',
            'slug' => Str::slug('Umum')
        ]);

        ArticleCategory::create([
            'name' => 'Berita',
            'slug' => Str::slug('Berita')
        ]);
    }
}
