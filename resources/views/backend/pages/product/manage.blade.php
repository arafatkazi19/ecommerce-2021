@extends('backend.layout.template')
@section('body-content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Manage Products</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">Products</h6>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-base bd-0 overflow-hidden">
                        <table class="table table-bordered table-striped mg-b-0">
                            <thead class="thead-colored thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Reguler Price</th>
                                <th scope="col">Offer Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Featured</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>

                                        @foreach ($product->product_images as $p)
                                            <img src ="{{asset('backend/img/products/'.$p->product_image)}}" width="50">
                                            @break
                                        @endforeach

                                    </td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->category->title}}</td>
                                    <td>{{$product->brand->name}}</td>
                                    <td>৳ {{ number_format($product->regular_price, 2) }}</td>
                                    <td>{{ !empty($product->offer_price) ? '৳ '.number_format($product->offer_price, 2) : 'N/A'}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>
                                        @if($product->is_featured == 0)
                                            <span class="badge badge-dark">Regular</span>
                                        @elseif($product->is_featured == 1)
                                            <span class="badge badge-info">Featured</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->status)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('product.edit',$product->id)}}">
                                            <i class="fa fa-edit" style="color: #FFCC00"></i></a>
                                        <a href="" data-toggle="modal" data-target="#delete{{$product->id}}">
                                            <i class="fa fa-trash" style="color: red"></i></a>
                                    </td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="delete{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <form action="{{route('product.destroy',$product->id)}}" method="post">
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
                            @if($products->count() == 0)
                                <div class="alert alert-info">
                                    No Products found!!!
                                </div>
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
