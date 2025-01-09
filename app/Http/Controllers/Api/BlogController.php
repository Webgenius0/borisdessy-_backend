<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * return jsonresponse
     * @return \Illuminate\Http\JsonResponse
     */
    public function allBlogs() : JsonResponse
    {
        $blogs = Blog::all();
        return response()->json([
            'status' => 'success',
            'message' => 'All Blogs',
            'data' => $blogs
        ]);
    }
}
