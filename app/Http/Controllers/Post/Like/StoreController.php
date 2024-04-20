<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\PostTag;


class StoreController extends Controller
{
    public function __invoke(Post $post)
    {   
        $user = auth()->user();

    
    if ($user->likePosts->contains($post->id)) {
     
        $user->likePosts()->detach($post->id);
    } else {
       
        $user->likePosts()->attach($post->id);
    }




        return redirect()->back();
    }
}