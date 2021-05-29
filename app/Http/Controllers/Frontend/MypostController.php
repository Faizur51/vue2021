<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class MypostController extends Controller
{
    public function index()
    {
        $posts=Post::with('user','category')->select('id','user_id','category_id','title','slug','content','image','status','created_at')->get();
        return response()->json([
            'post'=>$posts
        ]);
    }

    public function edit($slug)
    {
        $post=Post::where('slug',$slug)->first();

        return response()->json([
            'post'=>$post
        ]);
    }


    public function getpostbycategory($slug)
    {
      $category=Category::where('slug',$slug)->first();

      $post=Post::where('category_id',$category->id)->orderBy('id','desc')->get();

        return response()->json([
            'post'=>$post
        ]);
    }

}
