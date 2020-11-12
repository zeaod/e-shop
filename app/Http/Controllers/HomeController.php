<?php

namespace App\Http\Controllers;

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
        return view('home');
    }

    

    /* ชำระเงิน */ 
    public function Profile() 
    {
        return view('Profile');
    }
} 
