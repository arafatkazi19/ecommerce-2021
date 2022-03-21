@extends('backend.layout.template')
@section('body-content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Manage Orders</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>

<div class="br-pagebody">
<div class="br-section-wrapper">
    <h6 class="br-section-label">Manage Orders</h6>
    <p class="br-section-text">Using the most basic table markup.</p>

    <div class="bd bd-gray-300 rounded table-responsive">

        @if($orders->count() == 0)
        <div class="col-lg-12">
            <span class="alert alert-info">Sorry!!!! No Orders found</span>
        </div>
            
        @else
        <table class="table table-bordered table-striped mg-b-0">
            <thead class="thead-colored thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date & Time</th>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Order Details</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @php($i=1)
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    {{-- <td>{{ DateTime('d-m-Y', strtotime($order->created_at)); }}</td> --}}
                    <td>{{ $order->created_at; }}</td>
                    <td>{{ $order->cus_name}} {{ $order->last_name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td><a href="{{ route('order.details',$order->id) }}" class="btn btn-info btn-sm">Order Details</a></td>

                    <td>
                        <a href="{{route('order.edit',$order->id)}}">
                            <i class="fa fa-edit" style="color: #FFCC00"></i></a>
                        <a href="" data-toggle="modal" data-target="#delete{{$order->id}}">
                            <i class="fa fa-trash" style="color: red"></i></a>
                    </td>

                    <!-- Modal -->
                    <div class="modal fade" id="delete{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Do you really want to delete?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="action_btn">
                                        <ul style="list-style: none;">
                                            <li style="display: inline">
                                                <form action="{{route('order.destroy',$order->id)}}" method="post">
                                                    @csrf
                                                    <input type="submit" name="delete" value="confirm" class="btn btn-danger">
                                                </form>
                                            </li>
                                            <li style="display: inline"><button type="button" class="btn btn-success" data-dismiss="modal">Close</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </tr>
            @endforeach
            </tbody>
        </table>
        @endif

      
    </div>
</div><!-- bd -->
    @endsection