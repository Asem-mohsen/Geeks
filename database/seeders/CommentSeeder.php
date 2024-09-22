<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;

class CommentSeeder extends Seeder
{

    public function run(): void
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            Comment::factory()->count(rand(1, 5))->create(['post_id' => $post->id,]);
        }

    }
}
