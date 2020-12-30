<?php

namespace App\Http\Controllers;

use App\Product;
use App\category;
use App\brand;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth','verified']);  //ให้ Auth มีการตรวจสอบ verifi ก่อนถึงเข้าระบบได้
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $cate = category::all();
        $brands = brand::all();
        return view('home')  
            ->with('products',$products)
            ->with('categories',$cate)
            ->with('brands',$brands);   
    }

    

    /* ชำระเงิน */ 
    public function Profile() 
    {
        return view('Profile');
    }
} 
