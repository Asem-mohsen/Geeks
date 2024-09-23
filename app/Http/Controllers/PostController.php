<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;


class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    // Find posts with a specific tag. Return:
    public function getPostsByTag($tagName = "entertainment")
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $postsEloquent = Post::whereHas('tags', function ($query) use ($tagName) {
            $query->where('tag', $tagName);
        })->get();

        // Solution 2: Using select and join Without Relationships:
        $postsQueryBuilder = DB::table('posts')
            ->join('posttags', 'posts.id', '=', 'posttags.post_id')->join('tags', 'posttags.tag_id', '=', 'tags.id')
            ->where('tags.tag', $tagName)->select('posts.*')->get();

        return view('posts.posts', [ 'postsEloquent' => $postsEloquent,'postsQueryBuilder' => $postsQueryBuilder,'tagName' => $tagName]);

    }

    // Count the number of posts for each tag
    public function getNumberOfPostsTags()
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $tags = Tag::with('posts')->get(); // best practice to add withCount()
        $tagsERM = [];

        foreach ($tags as $tag) {

            $postCount = $tag->posts->count();

            $tagsERM[] = ['post_count' => $postCount];

        }

        // Solution 2: Using select and join Without Relationships:
        $tagsQueryBuilder = DB::table('tags')
                            ->leftJoin('posttags', 'tags.id', '=', 'posttags.tag_id')
                            ->select('tags.tag', DB::raw('COUNT(posttags.post_id) as post_count'))
                            ->groupBy('tags.id', 'tags.tag')
                            ->get();

        return view('posts.tagsWithPostNumber', ['tagsEloquent' => $tagsERM,'tagsQueryBuilder' => $tagsQueryBuilder , 'tags' =>$tags ]);
    }

    // Find posts with at least two specific tags
    public function getPostAtLeast2tags( $firstTag  = 'funny' , $secondTag = 'entertainment')
    {

        // Solution 1: Using Eloquent Relationships and Methods:
        // to add orWhere replaced with one of whereHas
        $postsERM = Post::whereHas('tags', function($query) use ($firstTag) {
                        $query->where('tag', $firstTag);
                    })->whereHas('tags', function($query) use ($secondTag) {
                        $query->where('tag', $secondTag);
                    })->get();

        // Solution 2: Using select and join Without Relationships:
        $postsQB = DB::table('posts')
                    ->join('posttags', 'posts.id', '=', 'posttags.post_id')
                    ->join('tags', 'posttags.tag_id', '=', 'tags.id')
                    ->where(function ($query) use ($firstTag, $secondTag) {
                        $query->where('tags.tag', $firstTag)
                            ->orWhere('tags.tag', $secondTag);
                    })
                    ->groupBy('posts.id', 'posts.body', 'posts.created_at', 'posts.updated_at', 'posts.user_id')
                    ->havingRaw('COUNT(DISTINCT tags.tag) = 2')
                    ->select('posts.*')
                    ->get();

        return view('posts.atLeastTwoTags', [ 'postsERM' => $postsERM ,'postsQB' => $postsQB]);

    }

    // Retrieve posts that have all specified tags
    public function getPostsByTags(Request $request)
    {
        $tagNames = $request->input('tags', []);

        // Solution 1: Using Eloquent Relationships and Methods
        $postsERM = Post::whereHas('tags', function ($query) use ($tagNames) {
            $query->whereIn('tags.tag', $tagNames);
        }, '=', count($tagNames))->get();

        // Solution 2: Using select and join Without Relationships:
        $postsQB = DB::table('posts')
                ->join('users', 'posts.user_id', '=', 'users.id')
                ->whereIn('posts.id', function ($query) use ($tagNames) {
                    $query->select('post_id')->from('posttags')->join('tags', 'posttags.tag_id', '=', 'tags.id')
                        ->whereIn('tags.tag', $tagNames)
                        ->groupBy('posttags.post_id')
                        ->havingRaw('COUNT(DISTINCT tags.tag) = ?', [count($tagNames)]);
                })
                ->select('posts.*', 'users.name as author_name')
                ->get();

        return view('posts.postsByTags', compact('postsERM', 'postsQB'));
    }

    // Find posts from the last month with multiple tags
    public function lastMonthPosts()
    {
        $startOfLastMonth = now()->subMonth()->startOfMonth();
        $endOfLastMonth = now()->subMonth()->endOfMonth();

        // Solution 1: Using Eloquent Relationships and Methods
        $postslastMonthERM = Post::whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])
                                    ->has('tags', '>', 1)
                                    ->with('tags')
                                    ->get();

        // Solution 2: Using select and join Without Relationships:
        $postslastMonthQB = DB::table('posts')
                                ->join('posttags', 'posts.id', '=', 'posttags.post_id')
                                ->join('tags', 'posttags.tag_id', '=', 'tags.id')
                                ->select('posts.id', 'posts.body', 'posts.created_at', DB::raw('COUNT(posttags.tag_id) as tag_count'))
                                ->whereBetween('posts.created_at', [$startOfLastMonth, $endOfLastMonth])
                                ->groupBy('posts.id', 'posts.body', 'posts.created_at')
                                ->having('tag_count', '>', 1)
                                ->get();

        foreach ($postslastMonthQB as $post) {
            $post->tags = DB::table('posttags')
                ->join('tags', 'posttags.tag_id', '=', 'tags.id')
                ->where('posttags.post_id', $post->id)
                ->select('tags.tag')
                ->pluck('tag');
        }
        return view('posts.lastMonthPosts', compact('postslastMonthERM', 'postslastMonthQB'));
    }

    // Find posts with the most comments and at least three tags
    public function mostCommentsand3tags()
    {
        // Solution 1: Using Eloquent Relationships and Methods
        $postsERM = Post::withCount('comments')->with('tags')->has('tags', '>=', 3)->orderByDesc('comments_count')->get();

        // Solution 2: Using select and join Without Relationships
        $postsQB = DB::table('posts')
                    ->join('posttags', 'posts.id', '=', 'posttags.post_id')
                    ->join('tags', 'posttags.tag_id', '=', 'tags.id')
                    ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
                    ->select('posts.id', 'posts.body', 'posts.created_at', DB::raw('COUNT(DISTINCT comments.id) as total_comments'), DB::raw('COUNT(DISTINCT posttags.tag_id) as total_tags'))
                    ->groupBy('posts.id', 'posts.body', 'posts.created_at')
                    ->having('total_tags', '>=', 3)
                    ->orderByDesc('total_comments')
                    ->get();

        return view('posts.mostCommentsand3tags', compact('postsERM', 'postsQB'));
    }
}
