<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;


class ShowController extends Controller
{
    public function __invoke(Category $category)
    {   
        $posts = Post::where('category_id', $category -> id);
        return view('admin.categories.show', compact('category', 'posts'));
    }
}