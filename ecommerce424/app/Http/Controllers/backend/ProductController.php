<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use Session;

class ProductController extends Controller
{
    public function vendorProductAdd()
    {
        $categories = Category::get();
        return view('backend.vendor.vendor-product-add',compact('categories'));
    }

    
    public function vendorProductStore(Request $request)
    {
        if($request->file('image')){
            $imageName = time().'.'.$request->image->extension();
            // $request->image->move(public_path('/content/',$imageName));
            move_uploaded_file($request['image'] ,public_path('product/').$imageName );
        }

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->vendor_id = session()->get('vendorId');
        $product->color = $request->color;
        $product->size= $request->size;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->type = $request->type;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->image = $imageName; 
        $product->status= 0;
        $product->save();
        return redirect()->back()->with('success','Product has been created');

    }

    public function vendorProductShow()
    {
        $products = Product::with('category')->get();
        $categories=Category::get();
        return view('backend.vendor.vendor-product-show',compact('products','categories'));
    }

    public function vendorProductView($id)
    {
        $product = Product::with('category')->find($id);
        $category=Category::get();
        return view('backend.vendor.vendor-product-view',compact('product','category'));
    }

    public function vendorProductEdit($id)
    {
        $product = Product::find($id);
        $categories=Category::get();
        return view('backend.vendor.vendor-product-edit',compact('product','categories'));
    }

    public function vendorProductUpdate(Request $request, $id)
    {
        $product = Product::find($id);
        if(isset($request->image)){
            if($product->image && file_exists('product/'.$product->image)){
                unlink('product/'.$product->image);
            }
            $updateImage = time().'.'.$request->image->extension();
            $request->image->move(public_path('/product/'),$updateImage );
            $product->image= $updateImage;

        }

        
        $product->category_id = $request->category_id;
        $product->vendor_id = session()->get('vendorId');
        $product->color = $request->color;
        $product->size= $request->size;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->type = $request->type;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        // $product->image = $imageName; 
        $product->status= 0;
        $product->save();
        return redirect()->back()->with('success','Product has been Updated');
    }

    
    public function vendorProductDelete($id)
    {
        // dd($id);
        $product = Product::find($id);
        $product->delete();
        return redirect('/category/manage')->with('success','Product has been deleted.');
    }

    public function adminProductList()
    {
        $products=Product::with('category','vendor')->get();
        return view('backend.product.admin-product-list',compact('products'));
    }

    public function adminProductApprove($id)
    {
        $product = Product::find($id);
        $product->status = 1;
        $product->save();
        return redirect()->back()->with('success','Product has been approved');
    }

    public function adminProductDelete($id)
    {
        // dd($id);
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/product/manage')->with('success','Product has been deleted.');
    }

    // public function adminProductPending($id)
    // {
    //     $product = Product::find($id);
    //     $product->status = 0;
    //     $$product->save();
    //     return redirect()->back()->with('success','Product has been pending');
    // }
}
