<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Comment::truncate();
        // Post::truncate();
        // User::truncate();
        // Tag::truncate();

        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call([
            UserSeeder::class,
            TagSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
