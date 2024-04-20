<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Faker\Provider\Base;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {   
        $category = Category::where('id', $post->category_id)->first();
        return view('admin.posts.show', compact('post', 'category'));
    }
}