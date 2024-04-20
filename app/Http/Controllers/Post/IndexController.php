<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;


class IndexController extends Controller
{
    public function __invoke()
    {   

        $posts = Post::paginate(12);
     
        return view('post.index', compact('posts'));
    }
}