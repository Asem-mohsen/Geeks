<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    // Find total posts and comments for each user
    public function totalPostsandComments()
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $usersERM = User::withCount(['comments','posts'])->get();

        // Solution 2: Using select and join Without Relationships
        $usersQB = DB::table('users')
                    ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
                    ->leftJoin('comments', 'users.id', '=', 'comments.user_id')
                    ->select('users.id', 'users.name',
                            DB::raw('COUNT(DISTINCT posts.id) as total_posts'),
                            DB::raw('COUNT(DISTINCT comments.id) as total_comments'))
                    ->groupBy('users.id', 'users.name')
                    ->get();

        return view('users.totalPostsandComments', compact('usersQB' , 'usersERM'));
    }

    // Get the user with the most published posts
    public function mostPublishedPosts()
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $userERM = User::withCount(['posts' => function ($query){
                        $query->where('status' , 'published');
                    }])->orderByDesc('posts_count')->first();

        // Solution 2: Using select and join Without Relationships
        $userQB = DB::table('users')->join('posts', 'users.id', '=', 'posts.user_id')
                    ->select('users.id' ,'users.name' ,DB::raw('COUNT(DISTINCT posts.id) as total_posts') )
                    ->where('status' , 'published')
                    ->groupBy('users.id','users.name')
                    ->orderByDesc('total_posts')
                    ->first();

        return view('users.mostPublishedPosts', compact('userQB' , 'userERM'));
    }

    // Find posts with comments from at least two different users
    public function postsWithcomments2differentUsers()
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $postsERM = Post::with('comments')->whereHas('comments', function ($query) {
                    $query->select('post_id')->groupBy('post_id')
                    ->havingRaw('COUNT(DISTINCT user_id) >= 2');
                    })->get();

        // Solution 2: Using select and join Without Relationships
        $postsQB = DB::table('posts')
                    ->join('comments', 'posts.id', '=', 'comments.post_id')
                    ->select('posts.*', DB::raw('COUNT(DISTINCT comments.user_id) as unique_commenters'))
                    ->groupBy('posts.id', 'posts.body', 'posts.created_at', 'posts.updated_at', 'posts.user_id')
                    ->having('unique_commenters', '>=', 2)
                    ->get();

        return view('users.postsWithcomments2differentUsers', compact('postsQB' , 'postsERM'));

    }

    // Find users who have never posted but have commented
    public function usersNeverPosted()
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $usersERM = User::whereHas('comments')->whereDoesntHave('posts')->get();   // new helper learned

        // Solution 2: Using select and join Without Relationships
        $usersQB = DB::table('users')
            ->join('comments', 'users.id', '=', 'comments.user_id')
            ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
            ->select('users.name' , 'users.id')
            ->whereNull('posts.id')
            ->groupBy('users.id', 'users.name')
            ->get();

        return view('users.usersNeverPosted', compact('usersERM' , 'usersQB'));
    }

    // Retrieve tags on posts created by multiple users **review
    public function tagsMultiUsers()
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $tagsERM = Tag::whereHas('posts', function ($query) {
                        $query->select('posts.id')
                            ->groupBy('posts.id')
                            ->havingRaw('COUNT(DISTINCT posts.user_id) > 1');
                    })->get();

        // Solution 2: Using select and join Without Relationships
        $tagsQB = DB::table('tags')
                ->join('posttags', 'tags.id', '=', 'posttags.tag_id')
                ->join('posts', 'posttags.post_id', '=', 'posts.id')
                ->select('tags.id', 'tags.tag')
                ->groupBy('tags.id', 'tags.tag')
                ->havingRaw('COUNT(DISTINCT posts.user_id) > 1')
                ->get();

        return view('users.tagsMultiUsers', compact('tagsERM' , 'tagsQB'));
    }

    // Get the user with the most tags across their posts =>to be reviewd
    public function userWithMostTags()
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        // $userERM = User::withCount(['posts' => function ($query) {
        //                 $query->withCount(['tags' => function($tagQuery){
        //                     $tagQuery->select(DB::raw('COUNT(DISTINCT tags.id) as distinct_tags_count'));
        //                 }]);
        //             }])
        //             ->orderByDesc('posts_count')
        //             ->first();
                    $userERM = User::withCount([
                        'posts as unique_tags_count' => function ($query) {
                            $query->join('posttags', 'posts.id', '=', 'posttags.post_id')
                                  ->select(DB::raw('COUNT(DISTINCT posttags.tag_id)'));
                        }
                    ])
                    ->orderByDesc('unique_tags_count')
                    ->first();
        // Solution 2: Using select and join Without Relationships
        $userQB = DB::table('users')
                    ->join('posts', 'users.id', '=', 'posts.user_id')
                    ->join('posttags', 'posts.id', '=', 'posttags.post_id')
                    ->join('tags', 'posttags.tag_id', '=', 'tags.id')
                    ->select('users.id', 'users.name', DB::raw('COUNT(DISTINCT tags.id) as unique_tag_count'))
                    ->groupBy('users.id', 'users.name')
                    ->orderByDesc('unique_tag_count')
                    ->first();


        return view('users.userWithMostTags', compact('userERM' , 'userQB'));
    }

    // Count posts by status (draft, published) for each user
    public function countPostsByStatus()
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $userERM = User::withCount(['posts as draft_posts_count' => function ($query) {$query->where('status', 'draft');},
                                    'posts as published_posts_count' => function ($query) {$query->where('status', 'published'); }
                                    ])->get();

        // Solution 2: Using select and join Without Relationships
        $userQB = DB::table('users')->join('posts', 'users.id', '=', 'posts.user_id')
                    ->select(
                        'users.id',
                        'users.name',
                        DB::raw('SUM(CASE WHEN posts.status = "draft" THEN 1 ELSE 0 END) as draft_posts_count'),
                        DB::raw('SUM(CASE WHEN posts.status = "published" THEN 1 ELSE 0 END) as published_posts_count')
                    )
                    ->groupBy('users.id', 'users.name')
                    ->get();


        return view('users.countPostsByStatus', compact('userERM' , 'userQB'));
    }

    // Identify top 3 users with the highest average post length
    public function usersHighestAvgPosts()
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $usersERM = Post::with('user')
                    ->select('user_id', DB::raw('AVG(CHAR_LENGTH(body)) as avg_post_length'))
                    ->groupBy('user_id')
                    ->orderBy('avg_post_length', 'desc')
                    ->limit(3)
                    ->get();

        // Solution 2: Using select and join Without Relationships
        $usersQB = DB::table('posts')
                    ->join('users', 'posts.user_id', '=', 'users.id')  // Join with users table
                    ->select('users.name', DB::raw('AVG(CHAR_LENGTH(body)) as avg_post_length'))
                    ->groupBy('users.id', 'users.name')
                    ->orderBy('avg_post_length', 'desc')
                    ->limit(3)
                    ->get();


        return view('users.usersHighestAvgPosts', compact('usersERM' , 'usersQB'));
    }

    // Get users who authored posts each month of the current year
    public function usersPostsEachMonth()
    {
        $currentYear = Carbon::now()->year;

        // Solution 1: Using Eloquent Relationships and Methods:
        $usersERM =  User::withCount(['posts as month_count' => function ($query) use ($currentYear) {
                        $query->whereYear('created_at', $currentYear);
                    }])
                    ->having('month_count', '=', 12)
                    ->get();

        // Solution 2: Using select and join Without Relationships
        $usersQB =  DB::table('users')
                    ->join('posts', 'users.id', '=', 'posts.user_id')
                    ->select('users.id', 'users.name', DB::raw('COUNT(DISTINCT MONTH(posts.created_at)) as month_count'))
                    ->whereYear('posts.created_at', $currentYear)
                    ->groupBy('users.id', 'users.name')
                    ->havingRaw('month_count = 12')
                    ->get();


        return view('users.usersPostsEachMonth', compact('usersERM' , 'usersQB'));
    }

    // Retrieve posts tagged with at least one tag used by the most active user
    public function postsLeastTagActiveUser()
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $mostActiveUserERM = User::withCount('posts')->orderBy('posts_count', 'desc')->first();

        if (!$mostActiveUserERM) { return []; }

        $tagsERM = Tag::whereIn('id', function ($query) use ($mostActiveUserERM) {
                        $query->select('tag_id')
                            ->from('posttags')
                            ->whereIn('post_id', function ($subQuery) use ($mostActiveUserERM) {
                                $subQuery->select('id')
                                    ->from('posts')
                                    ->where('user_id', $mostActiveUserERM->id);
                            });
                    })->pluck('id');

        $postsERM = Post::whereIn('id', function ($query) use ($tagsERM) {
                    $query->select('post_id')
                        ->from('posttags')
                        ->whereIn('tag_id', $tagsERM);
                })->get();


        // Solution 2: Using select and join Without Relationships
        $mostActiveUser = DB::table('users')->join('posts', 'users.id', '=', 'posts.user_id')
                        ->select('users.id', 'users.name', DB::raw('COUNT(posts.id) as posts_count'))
                        ->groupBy('users.id','users.name')
                        ->orderBy('posts_count', 'desc')
                        ->first();

        $tags = DB::table('posttags')
            ->whereIn('post_id', function ($query) use ($mostActiveUser) {
                $query->select('id')
                    ->from('posts')
                    ->where('user_id', $mostActiveUser->id);
            })
            ->pluck('tag_id');

        $postsQB = DB::table('posts')
                    ->join('posttags', 'posts.id', '=', 'posttags.post_id')
                    ->whereIn('posttags.tag_id', $tags)
                    ->select('posts.*')
                    ->distinct()
                    ->get();


        return view('users.postsLeastTagActiveUser', compact('postsERM' , 'postsQB'));
    }

    // Retrieve posts tagged with at least one tag used by the most active user
    public function authoredAndCommented($tagName)
    {
        $tag = Tag::where('tag', $tagName)->first();

        // Solution 1: Using Eloquent Relationships and Methods
        $usersERM = User::whereHas('posts.tags', function ($query) use ($tag) {

                        $query->where('tags.id', $tag->id);

                    })->whereIn('id', function ($query) use ($tag) {
                        $query->select('comments.user_id')->from('comments')
                            ->whereIn('post_id', function ($subQuery) use ($tag) {
                                $subQuery->select('posts.id')
                                    ->from('posts')
                                    ->join('posttags', 'posts.id', '=', 'posttags.post_id')
                                    ->where('posttags.tag_id', $tag->id);
                            });
                    })->get();


        // Solution 2: Using select and join Without Relationships
        $usersQB = DB::table('users')
            ->whereIn('users.id', function ($query) use ($tag) {
                $query->select('comments.user_id')
                    ->from('comments')
                    ->whereIn('post_id', function ($subQuery) use ($tag) {
                        $subQuery->select('posts.id')
                            ->from('posts')
                            ->join('posttags', 'posts.id', '=', 'posttags.post_id')
                            ->where('posttags.tag_id', $tag->id);
                    });
            })
            ->whereIn('users.id', function ($query) use ($tag) {
                $query->select('posts.user_id')
                    ->from('posts')
                    ->join('posttags', 'posts.id', '=', 'posttags.post_id')
                    ->where('posttags.tag_id', $tag->id);
            })
            ->get();

        return view('users.authoredAndCommented', compact('usersERM', 'usersQB'));
    }

    // Find all users who have commented on posts authored by other users
    public function allUsersCommentedOthers()
    {
        // Solution 1: Using Eloquent Relationships and Methods:
        $usersERM = User::whereHas('comments', function ($query) {
            $query->whereHas('post', function ($postQuery) {
                $postQuery->where('user_id', '!=', DB::raw('comments.user_id'));
            });
        })->get();

        // Solution 2: Using select and join Without Relationships
        $usersQB = DB::table('users')
            ->join('comments', 'users.id', '=', 'comments.user_id')
            ->join('posts', 'comments.post_id', '=', 'posts.id')
            ->select('users.id', 'users.name')
            ->where('posts.user_id', '!=', DB::raw('users.id'))
            ->distinct()
            ->get();

        return view('users.allUsersCommentedOthers', compact('usersERM', 'usersQB'));
    }
}

