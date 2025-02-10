<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Basket;
use App\Models\Buyer;
use App\Models\order;
use App\Models\Complete;
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

    public function addToCart(Request $request)
    {
        
        $addToCart = new Basket();
        $addToCart->user_id = session()->get('buyerId');
        $addToCart->vendor_id = $request->vendor_id;
        $addToCart->product_id = $request->product_id;
        $addToCart->price = $request->price;
        // $addToCart->qty = $request->qty;
        $addToCart->qty = $request->qty ? $request->qty : 1;
        $addToCart->total_price = 1*$request->price;
        $addToCart->save();
        return redirect('/cart/user/show')->with('success','product added to cart.');
        
    }

    public function cartShow()
    {
        $baskets = Basket::with('product','vendor')->get();
        return view('frontend.cart.cart-manage',compact('baskets'));
    }

    public function cartSingleView($id)
    {
        $basket= Basket::find($id);
        return view('frontend.cart.cart-product-view',compact('basket'));
    }

    public function cartItemDelete($id)
    {
        $basket = Basket::find($id);
        $basket->delete();
        return redirect('/cart/user/show')->with('success','Item has been deleted.');
    }

    public function cartProductUpdate(Request $request,$id)
    {
        $basket = Basket::find($id);
        $basket->qty = $request->qty;
        $basket->save();
        return redirect()->back()->with('success','product updated to cart.');
    }

    public function cartProductCheck()
    {
        $order = Basket::with('product','vendor','order')->get();

        foreach ($order as $row) {
            Order::create([
              'user_id' => $row->user_id,
              'vendor_id' => $row->vendor_id,
              'product_id' => $row->product_id,
              'price' => $row->price,
              'qty' => $row->qty,
              'total_price' => $row->total_price,
              
              
          ]);

          
          
        }
         return view('frontend.cart.order-manage',compact('order'));
        
    }

    public function orderComplete(Request $request)
    {
        $orderComplete= new Complete();
        $orderComplete->user_id=session()->get('buyerId');
        $orderComplete->user_name=session()->get('buyerName');
        $orderComplete->pay=$request->pay;
        $orderComplete->save();
        return redirect()->back()->with('success','order Complete');
    }
  
    public function orderManage()
    {
        $orders = Order::get();
        return view('frontend.cart.order-admin-manage',compact('orders'));
    }

    public function payment()
    {
        $payment = Complete::get();
        return view('frontend.cart.payment-admin-manage',compact('payment'));
    }

    public function orderDelete($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect('order/admin/manage')->with('success','Order has been deliveried.');
    }

    public function paymentComplete($id)
    {
        $payment = Complete::find($id);
        $payment->delete();
        return redirect('order/payment/details')->with('success','Order has been deliveried.');
    }

}
