<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function getIndex()
    {
        $blogs = Blog::orderBy('id', 'DESC')->simplePaginate(10);
        return view('blog', compact('blogs'));
    }
    public function getOne(Blog $blog)
    {
        return view('blog_one', compact('blog'));
    }
}
