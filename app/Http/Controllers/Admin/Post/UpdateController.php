<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Faker\Provider\Base;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {   
        $data = $request->validated();
        $category = Category::where('id', $post->category_id)->first();

        $this->service->updata($data, $post);
       
        return view('admin.posts.show', compact('post', 'category'));
    }
}