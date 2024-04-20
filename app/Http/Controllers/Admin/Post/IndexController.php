<?php

namespace App\Http\Controllers\Admin\Post;

// use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Faker\Provider\Base;

class IndexController extends BaseController
{
    public function __invoke()
    {   
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }
}