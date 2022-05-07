<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\District;
use App\Models\Division;
use Auth;
use Illuminate\Support\Str;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::orderBy('id','desc')->get();
        return view('backend.pages.order.manage-order',['orders'=>$orders]);
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
        $orderDetails = Order::with(['user','district','division'])->find($id);
        $orderItems = Cart::with('product')->orderBy('id','asc')->where('order_id',$orderDetails->id)->get();
        //dd($orderItems);
        
        return view('backend.pages.order.order-details',[
            'orderDetails'=>$orderDetails,
            'orderItems'=>$orderItems
        ]);
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
        $orderUpdate = Order::find($id);
        $divisions = Division::orderBy('priority','asc')->get();
        $districts = District::orderBy('district_name','asc')->get();
        return view('backend.pages.order.order-update',[
            'orderUpdate'=>$orderUpdate,
            'divisions'=>$divisions,
            'districts'=>$districts 
        ]);
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
        $orderDetailsUpdate = Order::find($id);

        $orderDetailsUpdate->cus_name = $request->first_name;
        $orderDetailsUpdate->last_name = $request->last_name;
        $orderDetailsUpdate->phone = $request->phone;
        $orderDetailsUpdate->address = $request->address;
        $orderDetailsUpdate->district_id = $request->district_id;
        $orderDetailsUpdate->division_id = $request->division_id;
        $orderDetailsUpdate->post_code = $request->post_code;
        $orderDetailsUpdate->admin_note = $request->admin_note;
        $orderDetailsUpdate->status = $request->status;

       // dd($orderDetailsUpdate);
       $orderDetailsUpdate->save();

       return redirect()->route('order.details',$orderDetailsUpdate->id);

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
