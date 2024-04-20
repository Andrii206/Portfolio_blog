<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Faker\Provider\Base; 

class DeleteController extends BaseController
{
    public function __invoke(Post $post)
    {   
        
        $post->delete();
       
        return redirect()->route('admin.post.index');
    }
}