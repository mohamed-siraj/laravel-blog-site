<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|file|image|mimes:jpeg,jpg,png,gif',
        ]);

        if ($validator->fails()) {
            return redirect('home')
                ->withErrors($validator)
                ->withInput();
        }

        $path = $request->file('image')->store(
            'blogs', 'public'
        );

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->image_url = $path;
        $blog->save();

        return redirect('home')->with('success', 'Successfully created');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
