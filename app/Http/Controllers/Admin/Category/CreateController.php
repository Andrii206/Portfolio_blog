<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;

class CreateController extends Controller
{
    public function __invoke()
    {   
       
        return view('admin.categories.create');
    }
}