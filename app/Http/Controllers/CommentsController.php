<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;

class CommentsController extends Controller
{
    public function index()
    {
        return view('comments.index');
    }

    // Find top 5 users with the most comments
    public function topUsersComments()
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $topUsersERM= User::withCount('comments')->orderBy('comments_count', 'desc')->limit(5)->get();

        // Solution 2: Using select and join Without Relationships:
        $topUsersDQ = DB::table('users')
                        ->join('comments', 'users.id', '=', 'comments.user_id')
                        ->select('users.id', 'users.name', DB::raw('COUNT(comments.id) as comment_count'))
                        ->groupBy('users.id', 'users.name')
                        ->orderByDesc('comment_count')
                        ->limit(5)
                        ->get();

        $maxCount = max(count($topUsersERM), count($topUsersDQ));

        return view('comments.topUsersComments', compact('topUsersERM' , 'topUsersDQ' , 'maxCount'));
    }

    // Get posts with no comments
    public function noCommentsPosts()
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $noCommentsPostsERM = Post::doesntHave('comments')->get();

        // Solution 2: Using select and join Without Relationships:
        $noCommentsPostsQB = DB::table('posts')
                        ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
                        ->whereNull('comments.post_id')
                        ->select('posts.*')
                        ->get();


        return view('comments.noCommentsPosts', compact('noCommentsPostsERM' , 'noCommentsPostsQB'));
    }

    // Find average comments per post for each user
    public function avgCommentsUser()
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $avgCommentsUserERM = User::withCount(['posts', 'comments as total_comments'])
                            ->get()
                            ->map(function ($user) {
                                $user->average_comments_per_post = $user->posts_count ? $user->total_comments / $user->posts_count : 0;
                                return $user;
                            });

        // Solution 2: Using select and join Without Relationships:
        $avgCommentsUserQB = DB::table('users')
                            ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
                            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
                            ->select('users.id', 'users.name', DB::raw('COUNT(comments.id) / NULLIF(COUNT(DISTINCT posts.id), 0) as avg_comments_per_post'))
                            ->groupBy('users.id', 'users.name')
                            ->get();

        return view('comments.avgCommentsUser', compact('avgCommentsUserERM', 'avgCommentsUserQB'));
    }

    // Retrieve tags associated with the most unique users
    public function tagsUniqueUsers()
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $tagsWithUniqueUsersERM = Tag::with(['posts' => function ($query) {
                                    $query->select('posts.id', 'posts.user_id', 'posttags.tag_id');
                                }])
                                ->get()
                                ->map(function ($tag) {
                                    $uniqueUsers = $tag->posts->pluck('user_id')->unique()->count();
                                    $tag->unique_user_count = $uniqueUsers;
                                    return $tag;
                                });

        // Solution 2: Using select and join Without Relationships
        $tagsWithUniqueUsersQB = DB::table('tags')
                                ->join('posttags', 'tags.id', '=', 'posttags.tag_id')
                                ->join('posts', 'posttags.post_id', '=', 'posts.id')
                                ->select('tags.id', 'tags.tag', DB::raw('COUNT(DISTINCT posts.user_id) as unique_user_count'))
                                ->groupBy('tags.id', 'tags.tag')
                                ->orderByDesc('unique_user_count')
                                ->get();


        return view('comments.tagsUniqueUsers', compact('tagsWithUniqueUsersERM', 'tagsWithUniqueUsersQB'));
    }

    // Get users who commented on their own posts
    public function selfCommented()
    {
        // Solution 1: Using Eloquent Relationships and Methods
        $selfCommentedERM = User::whereHas('comments', function ($query) {
                                $query->whereIn('comments.post_id', function($subquery) {
                                    $subquery->select('id')->from('posts')->whereColumn('posts.user_id', 'comments.user_id');
                                });
                            })
                            ->with('comments')
                            ->get();

        // Solution 2: Using select and join Without Relationships
        $selfCommentedQB = DB::table('users')
                            ->join('comments', 'users.id', '=', 'comments.user_id')
                            ->join('posts', 'comments.post_id', '=', 'posts.id')
                            ->whereColumn('users.id', 'posts.user_id')
                            ->select('users.id', 'users.name')
                            ->distinct()
                            ->get();

        return view('comments.selfCommented', compact('selfCommentedERM', 'selfCommentedQB'));
    }

    // Count comments made by users on posts authored by others
    public function countCommentsOthers()
    {

        // Solution 1: Using Eloquent Relationships and Methods:
        $commentsERM = User::withCount(['comments as comments_count' => function ($query) {
                            $query->whereHas('post', function ($postQuery) {
                                $postQuery->where('user_id', '!=', \DB::raw('comments.user_id'));
                            });
                        }])->get();

        // Solution 2: Using select and join Without Relationships
        $commentsQB = DB::table('users')
                        ->leftJoin('comments', 'users.id', '=', 'comments.user_id')
                        ->leftJoin('posts', 'comments.post_id', '=', 'posts.id')
                        ->select('users.id', 'users.name', DB::raw('COUNT(comments.id) as comments_count'))
                        ->where('posts.user_id', '!=', \DB::raw('users.id'))
                        ->groupBy('users.id', 'users.name')
                        ->get();

        return view('comments.countCommentsOthers', compact('commentsERM' , 'commentsQB'));
    }
}
