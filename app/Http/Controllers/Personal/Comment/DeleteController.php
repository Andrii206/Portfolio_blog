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


class DeleteController extends Controller
{
    public function __invoke(Comment $comment)
    {   
        $comment->delete();

        return view('personal.comment.delete', compact('comment'));
    }
}