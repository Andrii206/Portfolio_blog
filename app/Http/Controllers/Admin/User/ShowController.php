<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {   
    
        return view('admin.users.show', compact('user'));
    }
}