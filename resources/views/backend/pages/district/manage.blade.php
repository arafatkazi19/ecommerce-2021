@extends('backend.layout.template')
@section('body-content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Manage Districts</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">Districts</h6>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-base bd-0 overflow-hidden">
                        <table class="table table-bordered table-striped mg-b-0">
                            <thead class="thead-colored thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">District Name</th>
                                <th scope="col">Division</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($districts as $district)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$district->district_name}}</td>
                                    <td>{{$district->division->name}}</td>
                                    <td>
                                        @if($district->status)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('district.edit',$district->id)}}">
                                            <i class="fa fa-edit" style="color: #FFCC00"></i></a>
                                        <a href="" data-toggle="modal" data-target="#delete{{$district->id}}">
                                            <i class="fa fa-trash" style="color: red"></i></a>
                                    </td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="delete{{$district->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <form action="{{route('district.destroy',$district->id)}}" method="post">
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
                            @if($districts->count() == 0)
                                <div class="alert alert-info">
                                    No Districts found!!!
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
