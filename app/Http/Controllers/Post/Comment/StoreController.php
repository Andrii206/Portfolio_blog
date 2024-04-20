<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\PostTag;


class StoreController extends Controller
{
    public function __invoke(Post $post, StoreRequest $request)
    {   
        $data = $request->validated();
        $data['post_id'] = $post->id;
        $data['user_id'] = auth()->user()->id;



        Comment::create($data);

        return redirect()->route('post.show', $post->id);
    }
}