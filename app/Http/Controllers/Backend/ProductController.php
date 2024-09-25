<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        pagetitle('product');
        $product=Product::with('category')->orderBy('id','ASC')->get();
        $breadCrumb=['Dashboard'=>route('app.dashboard'),'Product'=>''];
        return view('backend.product.index',compact('breadCrumb','product'));
    }
    public function create(){
        $category=Category::all();
        pagetitle('create');
        $breadCrumb=['Dashboard'=>route('app.dashboard'),'Product'=>route('product.index'),'Create'=>''];
        return view('backend.product.create',compact('breadCrumb','category'));
    }
    public function store(ProductRequest $request){
        if($request->hasFile('image')){
            $image=$this->file_upload($request->file('image'),'images/product/');
        }
        Product::create([
            'category_id'         => $request->category,
            'product_title'       => $request->title,
            'product_description' => $request->description,
            'product_quantity'    => $request->quantity,
            'discount_price'      => $request->discount_price,
            'price'               => $request->price,
            'product_tag'         => $request->product_tag,
            'image'               => $image,
            'status'              => $request->status
        ]);
        return redirect()->back()->with('success','Product hasbeen Created succesfully!!');
    }
    public function edit($id){
        $category=Category::all();
        $product=Product::find($id);
        pagetitle('Edit');
        $breadCrumb=['Dashboard'=>route('app.dashboard'),'product'=>route('product.index'),'Edit'=>''];
        return view('backend.product.edit',compact('breadCrumb','product','category'));
    }
    public function update(Request $request,$id){
        $product=Product::find($id);
        if($request->hasFile('image')){
            $image=$this->file_update($request->file('image'),'images/product/',$product->image);
        }else{
            $image=$product->image;
        }
        $product->update([
            'category_id'         => $request->category,
            'product_title'       => $request->title,
            'product_description' => $request->description,
            'product_quantity'    => $request->quantity,
            'discount_price'      => $request->discount_price,
            'price'               => $request->price,
            'product_tag'         => $request->product_tag,
            'image'               => $image,
            'status'              => $request->status
        ]);
        return redirect()->back()->with('success','Product Hasbeen Update succesfully!!');
    }
    public function delete($id){
        $product=Product::find($id);
        $this->file_remove('images/product/',$product->image);
        $product->delete();
        return redirect()->back()->with('success','Product Delete Successfully');
    }
}
