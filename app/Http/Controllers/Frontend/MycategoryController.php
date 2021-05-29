<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class MycategoryController extends Controller
{
    public function getfrontsiteActivecategory()
    {
        $categories=Category::where('status',1)->get();
        return response()->json([
            'category'=>$categories
        ],200);
    }
}
