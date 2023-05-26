<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $blogs = Blog::with('category')->paginate(6);
        return view('blogs.blogs', compact('blogs'));
    }

    
    public function create()
    {
        $categories = Category::get();

        return view('blogs.create-blogs', compact( 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        
        $blogs= new Blog;
        $blogs->title = $request->title;
        $blogs->category_id = $request->input('category_id');
        $blogs->text = $request->input('text');

        if ($request->hasFile('image')) {

            $blogs->image = $request->file('image')->store('blogs-img', 'public');
            
        }
        $blogs->save();

        return to_route('blogs.create')->with('success', 'Blog successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::get();

        return view('blogs.edit-blogs', compact( 'categories', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->title = $request->title;
        $blog->category_id = $request->input('category_id');
        $blog->text = $request->input('text');

        if ($request->hasFile('image')) {

            $blog->image = $request->file('image')->store('blogs-img', 'public');
            
        }
        $blog->save();

        return to_route('blogs.index')->with('success', 'Blog successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $blog = Blog::findOrFail($id);

        if(Storage::disk('public')->delete($blog->image)) {
        $blog->delete();
        }
        return redirect()->back()->with('success', 'Blog deleted!!');
    }
}
