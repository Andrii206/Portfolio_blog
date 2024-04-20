<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;


class IndexController extends Controller
{
    public function __invoke()
    {   
        return redirect()->route('post.index');
    }
}