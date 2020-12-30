<?php

namespace App\View\Components;

use Illuminate\View\Component;


use App\Product;
use App\category;
use App\brand;


class header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
 

    public function __construct()
    { 
        //
    }
 
 


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $cate = category::all(); 
        return view('components.header') ->with('categories',$cate);   
    }
}
