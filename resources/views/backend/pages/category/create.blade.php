@extends('backend.layout.template')
@section('body-content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Create New Category</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">Create New Category</h6>
            <hr>
            <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="name">Title</label>
                            <input name="title" type="text" class="form-control" required="required" placeholder="Enter Category Name">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Primary Category [Optional]</label>
                            <select name="is_parent" class="form-control">
                                <option value="0">Please select primary category</option>
                                @foreach($parents as $p)
                                    <option value="{{$p->id}}">{{$p->title}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="0">Please choose status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input name="image" type="file" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-success btn-block" type="submit" name="addCategory" value="Submit">
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>

@endsection
