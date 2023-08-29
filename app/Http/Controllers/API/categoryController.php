<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Wink\WinkPost;
use Wink\WinkTag;

class categoryController extends Controller
{
    public function category()
    {
       $tags = WinkTag::orderBY('name','asc')->get();
       return response($tags);
    }

    // public function footer_category()
    // {
    //     $footer_tags = WinkTag::limit(5)->get();
    //     return response($footer_tags);
    // }

    public function categoryPost($tagName)
    {
        $post = WinkPost::with('author','tags')->whereHas('tags',function($query) use ($tagName) {
            $query->Where('name',$tagName);
        })->get(); 
        if ($post->isEmpty()) {
            $data = [
                'title' => $tagName,
                'message' => 'No Data Found',
            ];
            return response(view('categorypost')->with($data));
        }
        $data = ['title' => $tagName, 'posts' => $post,'message' => ''];
        return response(view('categorypost')->with($data));
    }
}
