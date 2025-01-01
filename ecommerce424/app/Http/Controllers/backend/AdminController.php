<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AdminLogin;
use session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        $admin = AdminLogin::get();
        return view('backend.dashboard.index',compact('admin'));
    }

    public function adminLogin()
    {
        return view('backend.admin.login');
    }

    public function adminLoginForm(Request $request)
    {
        // return $admin=AdminLogin::where('email',$request->email)->first();
        $admin = AdminLogin::where('email',$request->email)->first();
        if(!$admin){
            return redirect()->back()->with('error','Email or password not match.');
        }else{
            return redirect('/admin/dashboard');
        }

    }

    public function adminLogout()
    {
        session()->flush();
        return redirect('/');
    }
}
