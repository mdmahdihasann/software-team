<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product;

class FrontendController extends Controller
{
    public function productCategory(){
        $category=DB::table('categories')->get();
        $product=Product::with('category')->get();
        return view('frontend.page.home',compact('category','product'));
    }
    
}

