<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\District;
use App\Models\Division;
use App\Models\Order;
use App\Models\Porduct;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    /**
     * Display a listing of the homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function homepage()
    {
        //
        $latestProducts = Product::orderBy('id','asc')->take(6)->where('status',1)->get();
        $featuredProducts = Product::orderBy('id','desc')->where('status',1)->where('is_featured',1)->get();
        return view('frontend.pages.homepage',[
            'latestProducts'=>$latestProducts,
            'featuredProducts'=>$featuredProducts
        ]);
    }

        /**
     * Display a listing of the all products.
     *
     * @return \Illuminate\Http\Response
     */
    public function allProducts()
    {
        //
        $products = Product::orderBy('id','desc')->where('status',1)->get();
        return view('frontend.pages.all-products',['products'=>$products]);
    }

            /**
     * Display a listing of the all products.
     *
     * @return \Illuminate\Http\Response
     */
    public function productDetails($slug)
    {
        //
        $productDetail = Product::where('slug',$slug)->first();

        if(!is_null($productDetail)){
            return view('frontend.pages.details',['productDetail'=>$productDetail]);
        } else {
            return redirect()->back();
        }
        
    }

                /**
     * Display a listing of the searched products.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
        $search = $request->search;
      //  dd($search);
        $prodSearchRes = Product::orWhere('title', 'like' , '%' . $search . '%')->
                            orWhere('short_description',  'like' , '%'. $search .'%')->
                            orWhere('tags', 'like' , '%'. $search .'%')
                            ->orderBy('title','desc')->get();

        return view('frontend.pages.search',[
            'search' => $search,
            'prodSearchRes' => $prodSearchRes
        ]);
    }

           /**
     * Display the primary category products.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function primaryCategory($id)
    {
        //
        $primaryCategory = Category::find($id);


        //dd($catProducts); 
       // dd($primaryCategory);
        if(!is_null($primaryCategory)){
            return view('frontend.pages.primary-category',['primaryCategory'=>$primaryCategory]);
        } else{
            return redirect()->back();
        }
        // dd($categories);
        
    }


       /**
     * Display the child category products.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function category($slug)
    {
        //
        $category = Category::with(['products' => function($query) { $query->where('status','=', 1); }])->where('slug', $slug)->first();
        //dd($category);
        if(!is_null($category)){
            return view('frontend.pages.category',['category'=>$category]);
        } else{
            return redirect()->back();
        }
        // dd($categories);
        
    }

    /**
     * Display a listing of the cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        //
        // $cartItems = Cart::orderBy('id','desc')->where('order_id',null)->get();
        // return view('frontend.pages.cart');
    }

    /**
     * Display a listing of the checkout.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        //
        $cartItems = Cart::orderBy('id','desc')->where('order_id',null)->get();
        $districts = District::orderBy('district_name','asc')->where('status',1)->get();
        $divisions = Division::orderBy('name','asc')->where('status',1)->get();
        return view('frontend.pages.checkout',[
            'cartItems'=>$cartItems,
            'districts'=>$districts,
            'divisions'=>$divisions
        ]);
    }

    /**
     * Display a listing of the customer login and register.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        //
        return view('frontend.pages.login');
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

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
