<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Wink\WinkPost;

class HomeController extends Controller
{
    public function allrecentArtical()
    {
        $allrecent = WinkPost::with('author','tags')->orderBy('publish_date','desc')->limit(3)->get();

        return response($allrecent);
    }

    public function recentArtical(Request $request)
    {
        $json = $request->json()->all();
        $categoryName = $json['category'];
        
        $postdata = WinkPost::with('author','tags')->orderBy('publish_date','desc')->limit(3);
        if($categoryName !== "all")
        {
            $postdata->whereHas('tags',function($query) use ($categoryName){
                $query->where('name',$categoryName);
            });
        }
        $post = $postdata->get();

        return  response($post);

    }

    public function allpopularArtical()
    {
        $popularArtical = WinkPost::with('author','tags')->orderBy('count','desc')->limit(3)->get();

        return response($popularArtical);
    }

    public function showpopularPost(Request $request)
    {
        $json = $request->json()->all();
        $categoryName = $json['category'];

        $postdata = WinkPost::with('author','tags')->orderBy('count','desc')->limit(3);
        if ($categoryName !== "all") {
            $postdata->whereHas('tags',function($query) use ($categoryName){
                $query->where('name',$categoryName);
            });
        }
        $post = $postdata->get();

        return response($post);
    }

    public function allArtical()
    {
        $allArtical = WinkPost::with('author','tags')->get();

        return response($allArtical);
    }

    public function showAllPost(Request $request)
    {
        $json = $request->json()->all();
        $categoryName = $json['category'];

        $postdata = WinkPost::with('author','tags');
        if($categoryName !== "all")
        {
            $postdata->whereHas('tags',function($query) use ($categoryName){
                $query->where('name',$categoryName);
            });
        }
        $post = $postdata->get();

        return response($post);
    }

    public function showpost($tagName,$slug)
    {
        $posts = WinkPost::with('author','tags')->where('slug', $slug)->firstOrFail();
        $updateCount = ['count' => $posts->count + 1];
        WinkPost::where('slug', $posts->slug)->update($updateCount);
        $recentPosts = WinkPost::with('author','tags')
                                ->whereHas('tags', function($query) use ($tagName){
                                    $query->where('name',$tagName);})
                                ->orderBy('publish_date','desc')
                                ->limit(5)
                                ->get();
        $data = compact('posts','recentPosts');
        return response(view('blog')->with($data));
    }

    public function search(Request $request)
    {
        $json = $request->json()->all();
        $post = $json['search'];

        if($post != '')
        {
            $data = WinkPost::with('tags')
                            ->where('title','like','%' . $post . '%')
                            ->orwhereHas('tags', function($query) use ($post){
                                $query->where('name','like','%' . $post . '%');
                            })
                            ->get();

            return response($data);
        }
        return response([]);
    }

    public function searchResult($search)
    {
        $searchResult =  WinkPost::with('tags')
                                ->where('title','like','%' . $search . '%')
                                ->orwhereHas('tags', function($query) use ($search){
                                    $query->where('name','like','%' . $search . '%');
                                })
                                ->get();
        if ($searchResult->isEmpty()) {
            $data = ['title' => $search,'message' =>  'No data found'];
            return view('search-result')->with($data);
        }
        $data = ['title' => $search,'posts' => $searchResult,'message' => ''];

        return view('search-result')->with($data);
    }
}
