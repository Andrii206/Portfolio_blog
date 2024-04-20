<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;


class CategoryController extends Controller
{
    public function __invoke(Category $category)
    {   

        $posts = Post::where('category_id', $category->id)->paginate(12);
     
        return view('post.category', compact('posts'));
    }
}