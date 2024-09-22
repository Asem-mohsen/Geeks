<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('user' , 'tags' , 'comments')->get();

        return view('home' , compact('posts'));
    }
}
