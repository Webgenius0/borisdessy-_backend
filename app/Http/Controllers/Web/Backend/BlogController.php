<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Blog::all();
            return DataTables::of($data)
            ->addColumn('created_at', function ($row) {
                return \Carbon\Carbon::parse($row->created_at)->format('Y-m-d'); 
            })
            
            ->addColumn('content', function ($row) {
                $plainText = strip_tags($row->content); 
                $words = explode(' ', $plainText);
                return implode(' ', array_slice($words, 0, 5)) . '...'; 
            })
            
            ->addColumn('image', function ($row) {
                return '<img src="' . asset($row->image) . '" height="50"/>';

            })
            ->addColumn('action', function($row){
                $button = '<a href=" '.route('blog.edit',$row->id).' "class="edit btn btn-primary btn-sm">Edit</a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a href=" '. route('blog.destroy',$row->id) .' " class="DeleteCard btn btn-danger btn-sm">Delete</a>';
                return $button;
            })
            ->rawColumns(['created','image', 'action'])
            ->make(true);

        }
        return view('backend.layouts.blog.index');
    }

    public function create()
    {
        return view('backend.layouts.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if($request->hasfile('image')){
            $newImage = $request->file('image');
            $newImagePath = uploadImage($newImage, 'blog/images');

        }

        Blog::create([ 
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $newImagePath,
        ]);

        return redirect()->route('blog.index')->with('success', 'Blog post created successfully');
    }

    public function edit($id)  {
        $data = Blog::findOrFail($id);
        // return $data;
        return view('backend.layouts.blog.edit',compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $blog_id = $request->id;
    
        $blog = Blog::findOrFail($blog_id);
    
        $newImagePath = $blog->image;
    
        if ($request->hasFile('image')) {
            $newImage = $request->file('image');
    
            if ($newImage->isValid()) {
                if ($blog->image) {
                    $previousImagePath = public_path($blog->image);
                    if (file_exists($previousImagePath)) {
                        unlink($previousImagePath);
                    }
                }
                $newImagePath = uploadImage($newImage, 'blog/images');
            } else {
                return back()->withErrors('The uploaded image is invalid.');
            }
        }
    
        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $newImagePath, 
        ]);
    
        return redirect()->route('blog.index')->with('success', 'Blog post updated successfully!');
    }
    
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
    
        if ($blog->image) {
            $imagePath = public_path($blog->image);
    
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $blog->delete();
    
        return redirect()->route('blog.index')->with('success', 'Blog post deleted successfully!');
    }
    


}
