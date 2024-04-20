<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Faker\Provider\Base;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {   
        $data = $request->validated();
        $this->service->store($data);
       
        return redirect()->route('admin.post.index');
    }
}