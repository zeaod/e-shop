<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect,Response;

use App\Product;
use App\category;
use App\brand;

class ProductController extends Controller
{ 
     
        public function cart()
        {
            return view('cart');
        }
        public function addToCart($id)
        {
            $product = Product::find($id);

            if(!$product) {
                abort(404);
            }
     
            $cart = session()->get('cart');
     
            // if cart is empty then this the first product
            if(!$cart) {
                $cart = [
                        $id => [
                            "name" => $product->name,
                            "quantity" => 1,
                            "price" => $product->ragular_price,
                            "photo" => $product->image
                        ]
                ];
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Product added to cart successfully!');
            }
     
            // if cart not empty then check if this product exist then increment quantity
            if(isset($cart[$id])) {
     
                $cart[$id]['quantity']++;
     
                session()->put('cart', $cart);
     
                return redirect()->back()->with('success', 'Product added to cart successfully!');
     
            }
     
            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->ragular_price,
                "photo" => $product->image
            ];
     
            session()->put('cart', $cart);
     
            return redirect()->back()->with('success', 'Product added to cart successfully!');
     
        }

        public function update(Request $request)
        {
            if($request->id and $request->quantity)
            {
                $cart = session()->get('cart');
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                session()->flash('success', 'Cart updated successfully');
            }
        }
  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
    
    public function search()
    {
        $q = request('q');
        if( !empty($q)){
                $data = Product::where('name','LIKE','%'. $q .'%')
                ->paginate(30)
                ->setPath (''); 
        }
        $data->appends(array(
        'q' => request('q'),
        ) );
        if(count($data) > 0){
            return view('home')
            ->withCategories(category::all())
            ->withBrands(brand::all())
            ->withProducts($data);
        }
        return view('home')
        ->withCategories(category::all())
        ->withBrands(brand::all())
        ->withMessage('ไม่พบรายการสินค้า !');
    }


    // Search By Category link
    public function search_more(Request $request, $id){
        $id = decrypt($id);
        if ($request->route()->named('category')){ 
            $data = Product::where('category',$id)
            ->paginate(30)
            ->setPath ('');
        }elseif ($request->route()->named('brand')) {
            $data = Product::where('brand',$id)
            ->paginate(30)
            ->setPath ('');
        } 
        $data->appends(array(
        'q' => request('q'),
        ) );
        if(count($data) > 0){
            return view('home')
            ->withCategories(category::all())
            ->withBrands(brand::all())
            ->withProducts($data);
        }
        return view('home')
        ->withCategories(category::all())
        ->withBrands(brand::all())
        ->withMessage('ไม่พบรายการสินค้า !');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $id = decrypt($id);
        $item =  Product::where('id', $id)->firstOrFail();
            return view('product' )  
                ->with('item', $item);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
