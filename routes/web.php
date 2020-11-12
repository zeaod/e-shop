<?php

use App\product;
use App\category;
use App\brand;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () { 
    $products = Product::all();
    $cate = category::all();
    $brands = brand::all();
    return view('welcome')  
    ->with('products',$products)
    ->with('categories',$cate)
    ->with('brands',$brands);  
});


Auth::routes(['verify' => true]);  //ให้ Auth มีการตรวจสอบ verifi ก่อนถึงเข้าระบบได้ 

Route::get('/home', 'HomeController@index')->name('home');  

Route::get('/profile','HomeController@profile');
 


// GO TO PAGES 
Route::get('/', 'ProductController@index');  

Route::get('/shop', function () {
    return view('shop');
});


Route::get('/product/{id}', 'ProductController@show');  


Route::get('/blog', function () {
    return view('blog');
});

Route::get('/blog-post', function () {
    return view('blog_post');
});

Route::get('/regular', function () {
    return view('regular');
});

Route::get('/contact', function () {
    return view('contact');
});


//  Search sytem
// Form search
Route::any('/search', 'ProductController@search')->name('search');
//  Categories search
Route::get('/category/{id}', 'ProductController@search_more')->name('category');
//  Brands search
Route::get('/brand/{id}', 'ProductController@search_more')->name('brand');





//### Cart Sytem
Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart','CartController@add')->name('cart.add');
Route::post('/cart/conditions','CartController@addCondition')->name('cart.addCondition');
Route::delete('/cart/conditions','CartController@clearCartConditions')->name('cart.clearCartConditions');
Route::post('/cart/update','CartController@update')->name('cart.update');
Route::get('/cart/details','CartController@details')->name('cart.details');
Route::delete('/cart/{id}','CartController@delete')->name('cart.delete');
Route::get('/cart/clear','CartController@clear_all'); 

Route::group(['prefix' => 'wishlist'],function()
{
    Route::get('/wishlist','WishListController@index')->name('wishlist.index');
    Route::post('/wishlist','WishListController@add')->name('wishlist.add');
    Route::get('/wishlist/details','WishListController@details')->name('wishlist.details');
    Route::delete('/wishlist/{id}','WishListController@delete')->name('wishlist.delete');
});

 
 
