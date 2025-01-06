<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('backend.layouts.blog.index');
    }

    public function create()
    {
        return view('backend.layouts.blog.create');
    }

    public function store(Request $request)
    {
        // Store the blog post
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Store the blog post

        Blog::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('blog.index')->with('success', 'Blog post created successfully');
    }
}
