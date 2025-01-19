<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class BlogController extends Controller
{
    use ApiResponse;
    /**
     * return jsonresponse
     * @return \Illuminate\Http\JsonResponse
     */
    public function allBlogs() : JsonResponse
    {
        $blogs = Blog::all();
        return $this->success(
            $blogs,
            'All Blogs',
            200
        );
    }

    public function blogDetails() {
        $blodId = request('id');
        
        $blog = Blog::find($blodId);
        return $this->success(
            $blog,
            'Blog Details',
            200
        );
    }
}
