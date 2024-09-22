<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;


class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = Post::factory()->count(50)->create();

        // to seed the piviot table =>
        $tags = Tag::all();
        foreach ($posts as $post) {
            $post->tags()->attach($tags->random(rand(1, 3))->pluck('id')->toArray());
        }
    }
}
