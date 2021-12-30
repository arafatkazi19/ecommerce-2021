@extends('backend.layout.template')
@section('body-content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Create New District</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">Create New Division</h6>
            <hr>
            <form action="{{route('district.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="container">
                        <div class="col-lg-6" style="margin-left: 190px">
                            <div class="form-group">
                                <label for="name">District Name</label>
                                <input name="district_name" type="text" class="form-control" required="required" placeholder="Enter District Name">
                            </div>

                            <div class="form-group">
                                <label for="name">Division</label>
                                <select name="division_id" class="form-control">
                                    <option>Please choose Division</option>
                                    @foreach($divisions as $division)
                                    <option value="{{$division->id}}">{{$division->name}}</option>
                                    @endforeach
                                </select>
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
                                <input class="btn btn-success btn-block" type="submit" name="addDistrict" value="Submit">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
