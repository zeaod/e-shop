<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\category;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */ 

    // public $categories;

    public function categories(){
        $categories = category::all();
        return $categories;
    }


    public function __construct()
    { 
    }
 
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.header');
    }
}
