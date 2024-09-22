<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;

class UserContoller extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    // Get users who have authored posts with a specific tag.
    public function UsersByTag($tag)
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $usersERM = User::whereHas('posts.tags', function ($query) use ($tag) {
            $query->where('tag', $tag);
        })->orderBy('name')->get();
    
        // Solution 2: Using select and join Without Relationships
        $usersQB = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->join('posttags', 'posts.id', '=', 'posttags.post_id')
            ->join('tags', 'posttags.tag_id', '=', 'tags.id')
            ->where('tags.tag', $tag)
            ->select('users.id', 'users.name')
            ->distinct()
            ->orderBy('users.name')
            ->get();

        return view('users.usersWithTag', compact('usersQB' , 'usersERM'));
    }

    // Retrieve top 3 tags used by the most active user
    public function usedbyMostActive()
    {
        $top3TagsERM = [];

        $mostActiveUserERM = User::withCount('posts')->orderBy('posts_count', 'DESC')->first();
       
        if ($mostActiveUserERM) {
            $top3TagsERM = Tag::join('posttags', 'tags.id', '=', 'posttags.tag_id')->join('posts', 'posttags.post_id', '=', 'posts.id')
                        ->where('posts.user_id', $mostActiveUserERM->id)
                        ->select('tags.tag', DB::raw('COUNT(tags.id) as tag_count'))
                        ->groupBy('tags.id', 'tags.tag')
                        ->orderBy('tag_count', 'DESC')
                        ->limit(3)
                        ->get();
        }
    

        $top3TagsQB = [];
        $mostActiveUserQB = DB::table('users')
                            ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
                            ->select('users.id', DB::raw('COUNT(posts.id) as posts_count'))
                            ->groupBy('users.id')
                            ->orderBy('posts_count', 'DESC')
                            ->first();

        
        if ($mostActiveUserQB) {
            $top3TagsQB = DB::table('tags')
                        ->join('posttags', 'tags.id', '=', 'posttags.tag_id')
                        ->join('posts', 'posttags.post_id', '=', 'posts.id')
                        ->where('posts.user_id', $mostActiveUserQB->id)
                        ->select('tags.tag', DB::raw('COUNT(tags.id) as tag_count'))
                        ->groupBy('tags.id', 'tags.tag')
                        ->orderBy('tag_count', 'DESC')
                        ->limit(3)
                        ->get();
        }

        return view('users.topTagsByMostActiveUser', compact('mostActiveUserERM', 'top3TagsERM', 'mostActiveUserQB', 'top3TagsQB'));
    }
}
