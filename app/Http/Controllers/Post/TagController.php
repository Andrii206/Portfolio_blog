<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;

class TagController extends Controller
{
    public function __invoke(Tag $tag)
    {   

        $postsToTag = PostTag::where('tag_id', $tag->id)->get();
        $postIds = $postsToTag->pluck('post_id')->toArray();
        $posts = Post::whereIn('id', $postIds)->paginate(12);

     
        return view('post.tag', compact('posts', 'tag'));
    }
}