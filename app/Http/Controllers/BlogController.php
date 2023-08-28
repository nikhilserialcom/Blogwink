<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wink\WinkPost;
use Wink\WinkTag;

class BlogController extends Controller
{
   
    public function index()
    {
        $sliders = WinkPost::with('tags')->orderBy('publish_date','desc')->limit(5)->get();
        $tagNames = WinkTag::limit(5)->get();
        $data = compact('sliders','tagNames');
        return view('welcome')->with($data);
    }

    public function showblog()
    {
        return view('blog');
    }

    public function category()
    {
        return view('category');
    }

    public function viewAll()
    {
        return view('viewall');
    }
}
