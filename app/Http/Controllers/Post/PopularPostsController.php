<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;


class PopularPostsController extends Controller
{
    public function __invoke()
    {   
        
        $posts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->paginate(12);
   
        return view('post.popular-posts', compact('posts'));
    }
}