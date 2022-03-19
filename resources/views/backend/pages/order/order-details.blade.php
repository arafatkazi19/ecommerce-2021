@extends('backend.layout.template')
@section('body-content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Customer Order Details</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>

<div class="br-pagebody">
<div class="br-section-wrapper">
    <h6 class="br-section-label">Order Details</h6>
    <p class="br-section-text">Order details of <strong>{{ $orderDetails->user->name }}</strong></p>
    <div class="row">
        <div class="col-lg-4">
            <div class="order-summery">
                <h4 class="br-section-label">Customer Information</h4>
                <p><span>Name :</span> {{ $orderDetails->cus_name }} {{ $orderDetails->last_name }}</p>
                <p><span>Email :</span> {{ $orderDetails->email }}</p>
                <p><span>Phone :</span> {{ $orderDetails->phone }}</p>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="order-summery">
                <h4 class="br-section-label">Transaction Details</h4>
                <p><span>Order Amount :</span> {{ $orderDetails->amount }} {{ $orderDetails->currency }}</p>
                <p><span>Transaction ID :</span> {{ $orderDetails->transaction_id }}</p>
                <p><span>Order Status :</span>
                    @if ($orderDetails->status == 0)
                        <span class="badge badge-info">In Processing</span>
                    @elseif($orderDetails->status == 1 )
                        <span class="badge badge-warning">On Hold</span>
                    @elseif($orderDetails->status == 2 )
                        <span class="badge badge-success">Succesfull</span>
                    @elseif($orderDetails->status == 3 )
                        <span class="badge badge-success">Cancelled</span>
                    @endif
                </p>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="order-summery">
                <h4 class="br-section-label">Shipping Address</h4>
                <p><span>Address :</span> {{ $orderDetails->address }}</p>
                <p><span>District :</span> {{ $orderDetails->district->district_name }}</p>
                <p><span>Division :</span> {{ $orderDetails->division->name }}</p>
                <p><span>Country :</span> {{ $orderDetails->country }}</p>
                <p><span>Zip Code :</span> {{ $orderDetails->post_code }}</p>
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="order-items-box">
                <h4 class="br-section-label">Order Items</h4>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product Title</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                         $i=1;   
                        @endphp
                        @foreach ($orderItems as $item)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>
                                @foreach ($item->product->product_images as $p)
                                <img src ="{{asset('backend/img/products/'.$p->product_image)}}" width="50">
                                @break
                            @endforeach
                            </td>
                            <td>{{ $item->product->title }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ !empty($item->product->offer_price) ? '৳ '.number_format($item->product->offer_price, 2) : '৳ '.number_format($item->product->regular_price, 2)}}</td>
                          </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div><!-- bd -->
    @endsection