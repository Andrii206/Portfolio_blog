<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;


class DeleteController extends Controller
{
    public function __invoke(Category $category)
    {   
        
        $category->delete();
       
        return redirect()->route('admin.category.index');
    }
}