<?php

namespace App\Http\Controllers\Admin\Main;

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
        $data = [];
        $data['postsCount'] = Post::all()->count();
        $data['categoriesCount'] = Category::all()->count();
        $data['tagsCount'] = Tag::all()->count();
        $data['usersCount'] = User::all()->count();

        return view('admin.main.index', compact('data'));
    }
}