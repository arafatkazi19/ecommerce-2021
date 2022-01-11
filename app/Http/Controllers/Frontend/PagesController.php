<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('frontend.pages.homepage');
    }

        /**
     * Display a listing of the all products.
     *
     * @return \Illuminate\Http\Response
     */
    public function allProducts()
    {
        //
        return view('frontend.pages.all-products');
    }

            /**
     * Display a listing of the all products.
     *
     * @return \Illuminate\Http\Response
     */
    public function productDetails()
    {
        //
        return view('frontend.pages.details');
    }

                /**
     * Display a listing of the searched products.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        //
        return view('frontend.pages.search');
    }

    /**
     * Display a listing of the cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        //
        return view('frontend.pages.cart');
    }

    /**
     * Display a listing of the checkout.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        //
        return view('frontend.pages.checkout');
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
