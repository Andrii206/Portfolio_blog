<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

use App\Models\User;



class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {   
        $posts = auth()->user()->likePosts()->detach($post->id);
        
        return redirect()->route('personal.liked.index');
    }
}