@extends('backend.layout.template')
@section('body-content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Edit Brand</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">Create New Brand</h6>
            <hr>
            <form action="{{route('brand.update',$brand->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="container">
                        <div class="col-lg-6" style="margin-left: 190px">
                            <div class="form-group">
                                <label for="name">Brand Name</label>
                                <input value="{{$brand->name}}" name="name" type="text" class="form-control" required="required" placeholder="Enter Brand Name">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="0">Please choose status</option>
                                    <option {{$brand->status==1 ? 'selected' : ''}} value="1">Active</option>
                                    <option {{$brand->status==0 ? 'selected' : ''}} value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input name="image" type="file" class="form-control-file">
                            </div>
                            @if($brand->image)
                                <img src="{{asset('backend/img/brands/'.$brand->image)}}" alt="" width="100px">
                            @endif
                            <div class="form-group">
                                <input class="btn btn-success btn-block" type="submit" name="updateBrand" value="Submit">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
