<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\PostTag;


class IndexController extends Controller
{
    public function __invoke()
    {   
        $posts = auth()->user()->likePosts;
        
        return view('personal.liked.index', compact('posts'));
    }
}