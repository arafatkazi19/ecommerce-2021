<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Porduct;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cartItems = Cart::orderBy('id','desc')->get();
        return view('frontend.pages.cart',['cartItems'=>$cartItems]);
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
        if(Auth::check()){
            $cart = Cart::where('user_id',Auth::id())->where('product_id',$request->product_id)->first();
        } else{
            $cart = Cart::where('ip_address',request()->ip())->where('product_id',$request->product_id)->first();

        }


        if (!is_null($cart)) {
            $cart->increment('quantity');
            $notification = array(
                'message' => 'Cart updated successfully!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } else {
            $cart = new Cart();
            if (Auth::check()) {
                $cart->user_id = Auth::id();
            }

            $cart->ip_address = request()->ip();
            $cart->product_id = $request->product_id;
            $cart->save();

            
        $notification = array(
            'message' => 'Item added successfully!',
            'alert-type' => 'success'
        );

            return redirect()->back()->with($notification);
        }
        
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
        $cartUpdate = Cart::find($id);
        //dd($cartUpdate);

        $cartUpdate->quantity = $request->quantity;
        $cartUpdate->save();
        $notification = array(
            'message' => 'Cart updated successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
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
        $cartItemDestroy = Cart::find($id);

        if (!empty($cartItemDestroy)) {
            $cartItemDestroy->delete();
        } else {
            return redirect()->back();
        }
        $notification = array(
            'message' => 'Item deleted successfully!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);


    }
}
