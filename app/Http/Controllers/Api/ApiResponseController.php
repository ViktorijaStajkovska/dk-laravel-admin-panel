<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use App\Models\Video;
use App\Models\Partner;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiResponseController extends Controller
{

    
      
    

    public function blogs(){
        $blogs = Blog::with('category')->paginate(6);
        return response()->json([ 'blogs' => $blogs]);
    }

    public function videos(){
        $videos = Video::paginate(6);
        return response()->json([ 'videos' => $videos]);
    }

    public function partners(){
        $partners = Partner::paginate(10);
        return response()->json([ 'partners' => $partners]);
    }
}
