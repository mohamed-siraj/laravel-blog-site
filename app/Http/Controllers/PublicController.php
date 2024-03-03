<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class PublicController extends Controller
{

    public function index()
    {

        $blogs = Blog::all();

        return view('public.welcome', ['blogs' => $blogs]);
    }

}
