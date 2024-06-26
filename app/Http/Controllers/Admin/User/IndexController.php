<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {   
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
}