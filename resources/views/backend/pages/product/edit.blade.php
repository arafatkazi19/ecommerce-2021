@extends('backend.layout.template')
@section('body-content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Edit Product</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">Edit Product</h6>
            <hr>
            <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="title">Product Title</label>
                            <input value="{{ $product->title }}" name="title" type="text" class="form-control" required="required" placeholder="Enter Product Name">
                        </div>

                        <div class="form-group">
                            <label for="brand_id">Brand Name</label>
                            <select class="form-control" name="brand_id">
                                <option>Please Choose Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" {{ $brand->id==$product->brand_id ? 'selected' : ''}}>{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category Name</label>
                            <select class="form-control" name="category_id">
                                <option>Please Choose Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{ $category->id==$product->category_id ? 'selected' : ''}} >{{$category->title}}</option>
                                    @foreach(App\Models\Category::orderBy('title','asc')->where('is_parent',$category->id)->get() as $subcat)
                                        <option value="{{$subcat->id}}" {{ $subcat->id==$product->category_id ? 'selected' : ''}}>--{{$subcat->title}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="regular_price">Regular Price</label>
                            <input value="{{ $product->regular_price }}"  name="regular_price" type="number" class="form-control" required="required" placeholder="Enter Regular Price">
                        </div>

                        <div class="form-group">
                            <label for="offer_price">Offer Price</label>
                            <input value="{{ $product->offer_price ? $product->offer_price : '' }}" name="offer_price" type="number" class="form-control" placeholder="Enter Offer Price">
                        </div>


                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="is_featured" class="form-control">
                                <option value="0">Please choose status</option>
                                <option {{$product->is_featured==1 ? 'selected' : ''}} value="1">Featured</option>
                                <option {{$product->is_featured==0 ? 'selected' : ''}} value="0">Regular Product</option>
                            </select>
                        </div>


                    </div>

                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input value="{{ $product->quantity ? $product->quantity : '' }}" name="quantity" type="number" class="form-control" placeholder="Enter Quantity">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="0">Please choose status</option>
                                <option {{$product->status==1 ? 'selected' : ''}} value="1">Active</option>
                                <option {{$product->status==0 ? 'selected' : ''}} value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tags">Product Tags [Separated with comma (,)]</label>
                            <input value="{{$product->tags}}" name="tags" type="text" class="form-control">
                        </div>

                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="image">Image</label>--}}
                        {{--                            <input name="image" type="file" class="form-control-file">--}}
                        {{--                        </div>--}}

                        <div class="form-group">
                            <input class="btn btn-success btn-block" type="submit" name="addProduct" value="Submit">
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>

@endsection
