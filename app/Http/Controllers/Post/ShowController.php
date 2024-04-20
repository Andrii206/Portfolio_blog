<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {   

        // $categories = Category::where('')
        $prevPost = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        $nextPost = Post::where('id', '>', $post->id)->orderBy('id', 'asc')->first();

        $data = [
            'post' => $post,
            'prevPost' => $prevPost,
            'nextPost' => $nextPost,
        ];


        $categories = Category::all();
        $tags = Tag::all();
        $randomPosts = Post::get()->random(2);


        return view('post.show', $data, compact('post', 'tags', 'categories', 'randomPosts'));
    }
}