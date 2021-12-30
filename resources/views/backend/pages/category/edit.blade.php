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
            <form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="name">Title</label>
                            <input value="{{$category->title}}" name="title" type="text" class="form-control" required="required" placeholder="Enter Category Name">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{$category->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Primary Category [Optional]</label>
                            <select name="is_parent" class="form-control">
                                <option value="0">Please select primary category</option>
                                @foreach($parents as $p)
                                    <option value="{{$p->id}}"
                                            @if($category->is_parent==0)

                                            @elseif($category->is_parent!=0)
                                                   @if($p->id == $category->is_parent)
                                                    selected
                                                   @endif
                                            @endif
                                    >{{$p->title}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="0">Please choose status</option>
                                <option {{$category->status==1 ? 'selected' : ''}} value="1">Active</option>
                                <option {{$category->status==0 ? 'selected' : ''}} value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input name="image" type="file" class="form-control-file">
                        </div>
                        @if($category->image)
                            <img src="{{asset('backend/img/categories/'.$category->image)}}" alt="" width="100px">
                        @endif

                        <div class="form-group">
                            <input class="btn btn-success btn-block" type="submit" name="updateCategory" value="Save Changes">
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>

@endsection
