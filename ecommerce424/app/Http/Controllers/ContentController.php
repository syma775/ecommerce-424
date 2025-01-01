<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ContentController extends Controller
{

    public function categoryCreate()
    {
        return view('backend.category.create');
    }

    public function categoryStore(Request $request)
    {
        if($request->file('image')){
            $imageName = time().'.'.$request->image->extension();
            // $request->image->move(public_path('/content/',$imageName));
            move_uploaded_file($request['image'] ,public_path('uploads/').$imageName );
        }

        $category = new Category();
        $category->name = $request->name;
        $category->image=$imageName;
        $category->slug=str_replace(' ','_',strtolower($request->name));
        $category->save();
        return redirect()->back()->with('success','category has been created.');
    }

    public function categoryManage()
    {
        $categories = Category::get();
        //return $categories;
        return view ('backend.category.list',compact('categories'));
    }

    public function categoryView($id)
    {
        $category= Category::find($id);
        return view('backend.category.view',compact('category'));
    }

    public function categoryDelete($id)
    {
        // dd($id);
        $categoryDelete = Category::find($id);
        $categoryDelete->delete();
        return redirect('/category/manage')->with('success','category has been deleted.');
    }

    public function categoryEdit($id)
    {
        $categoryEdit = Category::find($id);
        return view('backend.category.edit',compact('categoryEdit'));
    }

    public function categoryUpdate(Request $request,$id)
    {
        $category = Category::find($id);
        if(isset($request->image)){
            if($category->image && file_exists('category/'.$category->image)){
                unlink('category/'.$category->image);
            }
            $updateImage = time().'.'.$request->image->extension();
            $request->image->move(public_path('/category/'),$updateImage );
            $category->image= $updateImage;

        }
        $category->name = $request->name;
        $category->slug = str_replace(' ','_',strtolower($request->name));
        $category->save();
        return redirect('/category/manage')->with('success','category has been Updated.');
    }
}
