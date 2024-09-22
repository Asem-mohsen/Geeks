<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;


class TagsController extends Controller
{
    public function index()
    {
        return view('tags.index');
    }

    public function tagsUsedMore10()
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $tagsERM = Tag::has('posts', '>', 10)->get();


        // Solution 2: Using select and join Without Relationships:
        $tagsQB = DB::table('tags')->leftJoin('posttags', 'tags.id', '=', 'posttags.tag_id')
                ->select('tags.tag', DB::raw('COUNT(posttags.post_id) as post_count'))
                ->groupBy('tags.id', 'tags.tag')
                ->having('post_count', '>', 10)
                ->get();

        return view('tags.tagsUsedMore10' , ['tagsERM' => $tagsERM , 'tagsQB' => $tagsQB]);
    }

    public function MostFrequentTag()
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $frequentERM =  Tag::withCount('posts')->orderBy('posts_count', 'DESC')->first();

        // Solution 2: Using select and join Without Relationships:
        $frequentQB = DB::table('tags')
                        ->join('posttags', 'tags.id', '=', 'posttags.tag_id')
                        ->select('tags.tag', DB::raw('COUNT(posttags.post_id) as post_count'))
                        ->groupBy('tags.id', 'tags.tag')
                        ->orderBy('post_count', 'DESC')
                        ->first();

        return view('tags.mostFrequentTag', compact('frequentQB' , 'frequentERM'));
    }

    public function getNotUsedTags()
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $unassociatedTagERM = Tag::doesntHave('posts')->get();

        // Solution 2: Using select and join Without Relationships:
        $unassociatedTagQB = DB::table('tags')
                            ->leftJoin('posttags', 'tags.id', '=', 'posttags.tag_id')
                            ->whereNull('posttags.post_id')
                            ->select('tags.tag')
                            ->get();

        return view('tags.notUsedTags', compact('unassociatedTagERM' , 'unassociatedTagQB'));
    }
}

