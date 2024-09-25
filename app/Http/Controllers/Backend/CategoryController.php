<?php

namespace App\Http\Controllers\Backend;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function index(){
        $categorys=Category::orderBy('id','ASC')->get();
        pagetitle('Category');
        $breadCrumb=['Dashboard'=>route('app.dashboard'),'Category'=>''];
        return view('backend.prodcut-category.index',compact('breadCrumb','categorys'));
    }
    public function create(){
        pagetitle('Create');
        $breadCrumb=['Dashboard'=>route('app.dashboard'),'Category'=>route('category.index'),'Create'=>''];
        return view('backend.prodcut-category.create',compact('breadCrumb'));
    }
    public function store(Request $request){
            if ($request->hasFile('image')) {
                $image=$this->file_upload($request->file('image'),'images/category/');
            }
            $request->validate([
                'category_name' => ['required','string'],
                'status'        => ['required','string'],
            ]);
            Category::create([
                'category_name' => $request->category_name,
                'image'         => $image,
                'status'        => $request->status
            ]);
        
            return redirect()->back()->with('success', 'Category has been created');
        
    }
    public function edit(Request $request,$id){
        $category=Category::find($id);
        pagetitle('Edit');
        $breadCrumb=['Dashboard'=>route('app.dashboard'),'Category'=>route('category.index'),'Edit'=>''];
        return view('backend.prodcut-category.edit',compact('breadCrumb','category'));
    }
    public function update(Request $request,$id){
            $category=Category::find($id);
            if ($request->hasFile('image')) {
                $image=$this->file_update($request->file('image'),'images/category/',$category->image);
            }else{
                $image=$category->image;
            }
            $request->validate([
                'category_name' => ['required','string'],
                'status'        => ['required','string'],
            ]);
            $category->update([
                'category_name' => $request->category_name,
                'image'         => $image,
                'status'        => $request->status
            ]);
            return redirect()->back()->with('success','category has been update');
        
        
    }
    public function delete($id){
        $category=Category::find($id);
        $this->file_remove('images/category/',$category->image);
        $category->delete();
        return redirect()->back()->with('info','date delete successfully');
    }
}
