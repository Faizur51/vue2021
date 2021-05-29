<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::with('user')->select('id','user_id','name','slug','status','created_at')->get();
        return response()->json([
            'category'=>$categories
        ],200);
    }

    public function getActivecategory()
    {
        $categories=Category::where('status',1)->get();
        return response()->json([
            'category'=>$categories
        ],200);
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
            'name'=>'required|unique:categories',
            'status'=>'required'
        ]);

        Category::create([
            'user_id'=>auth()->user()->id,
            'name'=>$request->name,
            'slug'=>slugify($request->name),
            'status'=>$request->status
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category=Category::where('slug',$slug)->first();

        return response()->json([
            'category'=>$category
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
            'name'=>'required|unique:categories,id,'.$request->id,
            'status'=>'required'
        ]);

        $category=Category::where('slug',$slug)->first();

       $category->user_id=auth()->user()->id;
       $category->name=$request->name;
       $category->slug=slugify($request->name);
       $category->status=$request->status;
       $category->save();

        return response()->json([
            'category'=>$category
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
        $categories=Category::find($id);

        $categories->delete();
        return response()->json([
            'category'=>$categories
        ],200);
    }
}
