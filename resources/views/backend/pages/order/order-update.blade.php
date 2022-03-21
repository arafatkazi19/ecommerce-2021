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

    <div class="bd bd-gray-300 rounded table-responsive">

      
    </div>
</div><!-- bd -->
    @endsection