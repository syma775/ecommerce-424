<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class SellerController extends Controller
{
    public function vendorLogin()
    {
        return view('backend.vendor.vendor-login');
    }

    public function vendorLoginForm(Request $request)
    {
         $vendor = Vendor::where('email',$request->email)->first();
         session::put('vendorId',$vendor->id);
        //  session::put('vendorName',$vendor->name);
         if(!$vendor){
            return redirect()->back()->with('error','you are not valid vendor,please register.');
         }
         elseif($vendor->password != $request->password){
            return redirect()->back()->with('error','your password is wrong.');
         }

         if($vendor->status == 0){
                return redirect()->back()->with('error','you are not approved vendor.');
            }
            if(!$vendor){
                    return redirect()->back()->with('error','you are not valid vendor,please register.');
                }else{
                    if(password_verify($request->password,$vendor->password)){
                        session::put('vendorId',$vendor->id);
                        session::put('vendorName',$vendor->name);
                        return view('backend.vendor.vendor-dashboard');
                    }else{
                        // return redirect()->back()->with('error','password not match.');
                        return view('backend.vendor.vendor-dashboard');
                    }
       
         }

    }


    public function vendorDashboard()
    {
        return view('backend.vendor.vendor-dashboard');
    }


    public function vendorRegister()
    {
        return view('backend.vendor.vendor-register');
    }

    public function vendorStore(Request $request)
    {
        if($request->file('image')){
            $imageName = time().'.'.$request->image->extension();
            // $request->image->move(public_path('/content/',$imageName));
            move_uploaded_file($request['image'] ,public_path('vendor/').$imageName );
        }

        $vendor = new Vendor();
        $vendor->email = $request->email;
        $vendor->password = bcrypt('$request->password');
        $vendor->address = $request->address;
        $vendor->phone = $request->phone;
        $vendor->image=$imageName;
        $vendor->fname = $request->fname;
        $vendor->lname = $request->lname;
        $vendor->status = 0;
        $vendor->save();
        return redirect()->back()->with('success','Vendor has been created.');
    }

    public function vendorManage()
    {
        $vendors=Vendor::get();
        return view('backend.vendor.vendor-manage',compact('vendors'));
    }

    public function vendorView($id)
    {
        $vendor= Vendor::find($id);
        return view('backend.vendor.vendor-view',compact('vendor'));
    }

    public function vendorApprove($id)
    {
        $vendor = Vendor::find($id);
        $vendor->status = 1;
        $vendor->save();
        return redirect()->back()->with('success','Vendor has been approved');
    }

    public function vendorPending($id)
    {
        $vendor = Vendor::find($id);
        $vendor->status = 0;
        $vendor->save();
        return redirect()->back()->with('success','Vendor has been pending');
    }

    public function vendorDelete($id)
    {
        // dd($id);
        $vendorDelete = Vendor::find($id);
        $vendorDelete->delete();
        return redirect('/vendor/manage')->with('success','vendor has been deleted.');
    }

    public function vendorLogout()
    {
        session()->flush();
        return redirect('/');
    }
}
