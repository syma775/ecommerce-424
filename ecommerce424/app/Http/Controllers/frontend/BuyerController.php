<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class BuyerController extends Controller
{
    public function buyerLogin()
    {
        return view('frontend.user.user-login');
    }

    public function buyerRegister()
    {
        return view('frontend.user.user-register');
    }

    public function buyerStore(Request $request)
    {
        $buyer = new Buyer();
        $buyer->email = $request->email;
        $buyer->password = bcrypt('$request->password');
        $buyer->address = $request->address;
        $buyer->phone = $request->phone;
        $buyer->name = $request->name;
        $buyer->save();
        return redirect()->back()->with('success','Customer has been created.');
    }

    public function BuyerLoginForm(Request $request)
    {
         $buyer = Buyer::where('email',$request->email)->first();
         session::put('buyerId',$buyer->id);
         session::put('buyerName',$buyer->name);
         if(!$buyer){
            return redirect()->back()->with('error','you are not valid User,please register.');
         }
         elseif($buyer->password != $request->password){
            return redirect()->back()->with('error','your password is wrong.');
         }

        //  if($vendor->status == 0){
        //         return redirect()->back()->with('error','you are not approved vendor.');
        //     }
            if(!$buyer){
                    return redirect()->back()->with('error','you are not valid vendor,please register.');
                }else{
                    if(password_verify($request->password,$buyer->password)){
                        session::put('buyerId',$buyer->id);
                        session::put('buyerName',$buyer->name);
                        $products = Product::with('category','vendor')->where('status',1)->get();
                        return view('frontend.user.user-dashboard',compact('products','buyer'));
                    }else{
                        // return redirect()->back()->with('error','password not match.');
                        $products = Product::with('category','vendor')->where('status',1)->get();
                        return view('frontend.user.user-dashboard',compact('products','buyer'));
                    }
       
         }

    }

    public function buyerManage()
    {
        $buyers=Buyer::get();
        return view('frontend.user.user-manage',compact('buyers'));
    }

    public function buyerView($id)
    {
        $buyer= Buyer::find($id);
        return view('frontend.user.user-view',compact('buyer'));
    }

    public function buyerDelete($id)
    {
        // dd($id);
        $buyerDelete = Buyer::find($id);
        $buyerDelete->delete();
        return redirect('admin/buyer/manage')->with('success','User has been deleted.');
    }

    public function buyerLogout()
    {
        session()->flush();
        return redirect('/');
    }
}
