<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\PostTag;


class EditController extends Controller
{
    public function __invoke(Comment $comment)
    {   
        $comments = auth()->user()->comments;

        return view('personal.comment.edit', compact('comment'));
    }
}