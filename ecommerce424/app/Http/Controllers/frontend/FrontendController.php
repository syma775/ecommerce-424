<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::with('category','vendor')->where('status',1)->get();
        return view('frontend.index',compact('products'));
    }
}
