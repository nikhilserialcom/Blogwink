<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Wink\WinkPost;
use Wink\WinkTag;

class ViewAllController extends Controller
{
    public function viewAll($status)
    {
        if($status == "recentArtical")
        {
            $title = "Recent Articals";
            $allrecent = WinkPost::with('author','tags')->orderBy('publish_date','desc')->get();
            $tagNames = WinkTag::limit(5)->get();
            $data = [
                'title' => $title,
                'posts' => $allrecent,
                'tagNames' => $tagNames,
            ];
            return response(view('viewall')->with($data));
        }
        elseif($status == "popularArtical")
        {
            $title = "Popular Articals";
            $popular = WinkPost::with('author','tags')->orderBy('count','desc')->get();
            $tagNames = WinkTag::limit(5)->get();
            $data = [
                'title' => $title,
                'posts' => $popular,
                'tagNames' => $tagNames,
            ];
            return response(view('viewall')->with($data));
        }
        elseif($status == "allArtical")
        {
            $title = "All Articals";
            $all = WinkPost::with('author','tags')->get();
            $tagNames = WinkTag::limit(5)->get();
            $data = [
                'title' => $title,
                'posts' => $all,
                'tagNames' => $tagNames,
            ];
            return response(view('viewall')->with($data));
        }
    }

    public function filterData(Request $request)
    {
        $json = $request->json()->all();
        $status = $json['status'];
        $category = $json['categoryname'];
        if($status == "Recent Articals")
        {
            $postdata = WinkPost::with('author','tags')->orderBy('publish_date','desc');
            if($category !== "all")
            {
                $postdata->whereHas('tags',function($query) use ($category){
                    $query->where('name',$category);
                });
            }
            $post = $postdata->get();
        }
        elseif ($status == "Popular Articals") 
        {
            $postdata = WinkPost::with('author','tags')->orderBy('count','desc')->limit(3);
            if ($category !== "all") {
                $postdata->whereHas('tags',function($query) use ($category){
                    $query->where('name',$category);
                });
            }
            $post = $postdata->get();
        }
        elseif ($status == "All Articals") 
        {
            $postdata = WinkPost::with('author','tags');
            if($category !== "all")
            {
                $postdata->whereHas('tags',function($query) use ($category){
                    $query->where('name',$category);
                });
            }
            $post = $postdata->get();

        }
        return response($post);
    }
}
