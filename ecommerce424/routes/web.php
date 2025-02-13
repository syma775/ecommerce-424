<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\BuyerController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\SellerController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\ContentController;

// Route::get('/', function () {
//     return view('welcome');
// });

//frontend Routes

Route::get('/',[FrontendController::class,'index'])->name('home');

//Admin Routes
Route::get('admin/dashboard',[AdminController::class,'adminDashboard']);
Route::get('admin/login',[AdminController::class,'adminLogin']);
Route::post('/admin/login/form',[AdminController::class,'adminLoginForm']);
Route::get('/admin/logout',[AdminController::class,'adminLogout']);

//Category Routes
Route::get('/category/create',[ContentController::class,'categoryCreate']);
Route::post('/category/store',[ContentController::class,'categoryStore']);
Route::get('/category/manage',[ContentController::class,'categoryManage']);
Route::get('/category/view/{id}',[ContentController::class,'categoryView']);
Route::get('/category/delete/{id}',[ContentController::class,'categoryDelete']);
Route::get('/category/edit/{id}',[ContentController::class,'categoryEdit']);
Route::post('/category/update/{id}',[ContentController::class,'categoryUpdate']);

//vendor Routes

Route::get('/vendor/login',[SellerController::class,'vendorLogin']);
Route::get('/vendor/register',[SellerController::class,'vendorRegister']);
Route::post('/vendor/store',[SellerController::class,'vendorStore']);
Route::get('/vendor/manage',[SellerController::class,'vendorManage']);
Route::get('/vendor/view/{id}',[SellerController::class,'vendorView']);
Route::get('/vendor/approve/{id}',[SellerController::class,'vendorApprove']);
Route::get('/vendor/pending/{id}',[SellerController::class,'vendorPending']);
Route::get('/vendor/delete/{id}',[SellerController::class,'vendorDelete']);
Route::post('/vendor/login/form',[SellerController::class,'vendorLoginForm']);
Route::get('/vendor/dashboard',[SellerController::class,'vendorDashboard']);
Route::get('/vendor/logout',[SellerController::class,'vendorLogout']);

//product controller routes
Route::get('/vendor/product/add',[ProductController::class,'vendorProductAdd']);
Route::post('/vendor/product/store',[ProductController::class,'vendorProductStore']);
Route::get('/vendor/product/list',[ProductController::class,'vendorProductShow']);
Route::get('/vendor/products/view/{id}',[ProductController::class,'vendorProductView']);
Route::get('/vendor/products/edit/{id}',[ProductController::class,'vendorProductEdit']);
Route::post('/vendor/product/update/{id}',[ProductController::class,'vendorProductUpdate']);
Route::get('/vendor/product/delete/{id}',[ProductController::class,'vendorProductDelete']);
Route::get('/admin/product/manage',[ProductController::class,'adminProductList']);
Route::get('/admin/product/approve/{id}',[ProductController::class,'adminProductApprove']);
Route::get('/admin/product/delete/{id}',[ProductController::class,'adminProductDelete']);

//user controller routes

Route::get('/buyer/customer/login',[BuyerController::class,'buyerLogin']);
Route::get('/buyer/custmer/register',[BuyerController::class,'buyerRegister']);
Route::post('buyer/customer/store',[BuyerController::class,'buyerStore']);
Route::post('/buyer/customer/login',[BuyerController::class,'BuyerLoginForm']);
Route::get('/buyer/logout',[BuyerController::class,'buyerLogout']);
Route::get('admin/buyer/manage',[BuyerController::class,'buyerManage']);
Route::get('admin/buyer/view/{id}',[BuyerController::class,'buyerView']);
Route::get('/admin/buyer/delete/{id}',[BuyerController::class,'buyerDelete']);

//cart controller routes

Route::post('/add/to/cart',[ProductController::class,'addToCart']);
Route::get('/cart/user/show',[ProductController::class,'cartShow']);
Route::get('/cart/view/{id}',[ProductController::class,'cartSingleView']);
Route::get('/cart/delete/{id}',[ProductController::class,'cartItemDelete']);
Route::post('/cart/product/update/{id}',[ProductController::class,'cartProductUpdate']);
Route::get('/cart/check/{id}',[ProductController::class,'cartProductCheck']);

//order controller routes
Route::post('/order/complete',[ProductController::class,'orderComplete']);
Route::get('order/admin/manage',[ProductController::class,'orderManage']);
Route::get('order/payment/details',[ProductController::class,'payment']);
Route::get('/order/complete/{id}',[ProductController::class,'orderDelete']);
Route::get('/pay/complete/{id}',[ProductController::class,'paymentComplete']);
