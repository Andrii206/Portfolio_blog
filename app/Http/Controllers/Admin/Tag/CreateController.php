<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;


class CreateController extends Controller
{
    public function __invoke()
    {   
        return view('admin.tags.create');
    }
}