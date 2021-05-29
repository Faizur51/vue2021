<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Image;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::with('user','category')->select('id','user_id','category_id','title','slug','content','image','status','created_at')->get();
        return response()->json([
            'post'=>$posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:posts',
            'content'=>'required',
            'status'=>'required'
        ]);

        $file=$request->image;
        $fileNew=explode(';',$file);
        $file_ex=explode('/',$fileNew[0]);
        $file_ex= end($file_ex);
        $fileName=slugify($request->title).'.'.$file_ex;

        $posts=Post::create([
            'user_id'=>auth()->user()->id,
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'content'=>$request->content,
            'image'=>$fileName,
            'slug'=>slugify($request->title),
            'status'=>$request->status
        ]);

     if($posts){
         Image::make($request->image)->resize(300, 200)->save(public_path('assets/images/posts/'.$fileName));

     }

        return response()->json([
            'post'=>$posts
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post=Post::where('slug',$slug)->first();

        return response()->json([
            'post'=>$post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title'=>'required|unique:posts,id,'.$request->id,
            'content'=>'required',
            'status'=>'required'
        ]);

        $posts=Post::where('slug',$slug)->first();

            $posts->category_id=$request->category_id;
            $posts->title=$request->title;
            $posts->content=$request->content;
            //$posts->image=$fileName;
            $posts->slug=slugify($request->title);
            $posts->status=$request->status;


        if($request->image !== $posts->image)  {
            $file=$request->image;
            $fileNew=explode(';',$file);
            $file_ex=explode('/',$fileNew[0]);
            $file_ex= end($file_ex);
            $fileName=slugify($request->title).'.'.$file_ex;
            $posts->image=$fileName;
            Image::make($request->image)->resize(300,200)->save(public_path('assets/images/posts/'.$fileName));
        }

            $posts->save();

        return response()->json([
            'post'=>$posts
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=Post::find($id);
        $fileName= $posts->image;
        if( $posts->delete()){
           if(file_exists(public_path('assets/images/posts/'.$fileName))) {
               unlink(public_path('assets/images/posts/'.$fileName));
           }
        }

        return response()->json([
            'post'=>$posts
        ],200);
    }
}
