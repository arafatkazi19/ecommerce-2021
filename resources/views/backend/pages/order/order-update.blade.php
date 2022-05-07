@extends('backend.layout.template')
@section('body-content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Update Order</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>

<div class="br-pagebody">
<div class="br-section-wrapper">
    <h6 class="br-section-label">Update {{ $orderUpdate->user->name }}'s Order</h6>
    <p class="br-section-text">Using the most basic table markup.</p>

    <form method="post" action="{{ route('order.update',$orderUpdate->id) }}"> 
        @csrf
            <div class="row">
             
                <div class="col-lg-4">
                   
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" value="{{ $orderUpdate->cus_name }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="first_name">Last Name</label>
                        <input type="text" name="last_name" value="{{ $orderUpdate->last_name }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="first_name">email</label>
                        <input type="text" name="email" value="{{ $orderUpdate->email }}" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label for="first_name">Phone</label>
                        <input type="text" name="phone" value="{{ $orderUpdate->phone }}" class="form-control">
                    </div>
                </div>

                <div class="col-lg-4">
                   
                    <div class="form-group">
                        <label for="shipping_address">Shipping Address</label>
                        <input type="text" name="address" value="{{ $orderUpdate->address }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold text-dark text-2">District</label>
                        <select class="form-control" name="district_id">
                            <option value="">Please select your District</option>
                            @foreach($districts as $district)
                            <option value="{{ $district->id }}"  {{ $orderUpdate->district_id == $district->id ? 'selected' : '' }}>{{ $district->district_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold text-dark text-2">Division</label>
                        <select class="form-control" name="division_id">
                            <option value="">Please select your District</option>
                            @foreach($divisions as $division)
                            <option value="{{ $division->id }}" {{ $orderUpdate->division_id == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div class="form-group">
                        <label for="country">Counrty</label>
                        <input type="text" name="country" value="{{ $orderUpdate->country }}" class="form-control">
                    </div> --}}

                    <div class="form-group">
                        <label for="zip_code">Zip Code</label>
                        <input type="text" name="post_code" value="{{ $orderUpdate->post_code }}" class="form-control">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="admin_note">Admin Note</label>
                        <textarea name="admin_note" class="form-control" rows="4">{{ $orderUpdate->admin_note }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold text-dark text-2">Update Order Status</label>
                        <select class="form-control" name="status">
                            <option value="">Please select Order Status</option>
                            <option value="0" {{ $orderUpdate->status == 0 ? 'selected' : ''}}>In Processing</option>
                            <option value="1" {{ $orderUpdate->status == 1 ? 'selected' : ''}}>On Hold</option>
                            <option value="2" {{ $orderUpdate->status == 2 ? 'selected' : ''}}>Success</option>
                            <option value="3" {{ $orderUpdate->status == 3 ? 'selected' : ''}}>Cancelled</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-warning btn-block" type="submit" name="updateOrder" value="Update">

                    </div>

                </div>
                
                </form>
            </div>
            </div>
      
   
</div><!-- bd -->
    @endsection