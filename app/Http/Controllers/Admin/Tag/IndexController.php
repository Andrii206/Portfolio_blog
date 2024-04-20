<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;

class IndexController extends Controller
{
    public function __invoke()
    {   
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }
}