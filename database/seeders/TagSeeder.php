<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{

    public function run(): void
    {
        $tags = ['entertainment', 'funny', 'technology', 'health', 'sports', 'travel', 'food', 'lifestyle'];

        Tag::factory()->count(count($tags))->create();
    }
}
