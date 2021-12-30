@extends('backend.layout.template')
@section('body-content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Create New Product</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">Create New Product</h6>
            <hr>
            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="title">Product Title</label>
                            <input name="title" type="text" class="form-control" required="required" placeholder="Enter Product Name">
                        </div>

                        <div class="form-group">
                            <label for="brand_id">Brand Name</label>
                                <select class="form-control" name="brand_id">
                                    <option>Please Choose Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category Name</label>
                                <select class="form-control" name="category_id">
                                    <option>Please Choose Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                        @foreach(App\Models\Category::orderBy('title','asc')->where('is_parent',$category->id)->get() as $subcat)
                                            <option value="{{$subcat->id}}">--{{$subcat->title}}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="regular_price">Regular Price</label>
                            <input name="regular_price" type="number" class="form-control" required="required" placeholder="Enter Regular Price">
                        </div>

                        <div class="form-group">
                            <label for="offer_price">Offer Price</label>
                            <input name="offer_price" type="number" class="form-control" placeholder="Enter Offer Price">
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input name="quantity" type="number" class="form-control" placeholder="Enter Quantity">
                        </div>


                        <div class="form-group">
                            <label for="is_featured">Featured</label>
                            <select name="is_featured" class="form-control">
                                <option value="0">Please choose featured status</option>
                                <option value="1">Featured</option>
                                <option value="0">Regular Product</option>
                            </select>
                        </div>


                    </div>

                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>


                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="0">Please choose status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tags">Product Tags [Separated with comma (,)]</label>
                            <input name="tags" type="text" class="form-control">
                        </div>



                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="image">Main Thumbnail Image*</label>
                                    <input name="product_image[]" type="file" class="form-control-file">
                                </div>
                            </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="image">Image 1</label>
                                        <input name="product_image[]" type="file" class="form-control-file">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="image">Image 2</label>
                                        <input name="product_image[]" type="file" class="form-control-file">
                                    </div>
                                </div>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-success btn-block" type="submit" name="addProduct" value="Submit">
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>

@endsection
