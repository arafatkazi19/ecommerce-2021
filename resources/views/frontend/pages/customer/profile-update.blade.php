    @extends('frontend.layout.template')
    @section('body-content')

            <div class="body">

                <div role="main" class="main shop py-4">

                    <div class="container">

                        <div class="row">
                            <div class="col">

                                <div class="featured-boxes">
                                        <div class="row">
                                            <div class="col">
                                                <div class="featured-box featured-box-primary text-left mt-2">
                                                    <div class="box-content">
                                                        <form method="POST" action="{{ route('profile.store',$user->id) }}" enctype="multipart/form-data">
                                                            @csrf
                                                        {{-- User info show starts --}}
                                                    {{-- <div class="row">
                                                        <div class="col-lg-3">
                                                        @if (empty(Auth::user()->image))
															<img class="img-fluid" src="{{ asset('backend/img/users/user.png') }}">
														@else
														   <img style="width: 400px; height:400px" class="img-fluid" src="{{ asset('backend/img/users/'.Auth::user()->image) }}">
														@endif
                                                        </div>
                                                    </div> --}}
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="name">Fullname</label>
                                                                            <input value="{{ Auth::user()->name }}" type="text" name="name" class="form-control" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="email">Email</label>
                                                                            <input value="{{ Auth::user()->email }}" type="text" name="email" class="form-control" disabled>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="phone">Phone</label>
                                                                            <input value="{{ !empty(Auth::user()->phone) ?  Auth::user()->phone :  old('phone')  }}" type="text" name="phone" class="form-control" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="address">Address</label>
                                                                            <input  value="{{ !empty(Auth::user()->address) ?  Auth::user()->address : old('address') }}" type="text" name="address" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="city">City</label>
                                                                            <input  value="{{ !empty(Auth::user()->city) ?  Auth::user()->city : old('city') }}" type="text" name="city" class="form-control" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="country">Country</label>
                                                                            <input  value="{{ !empty(Auth::user()->country) ?  Auth::user()->country : old('country') }}" type="text" name="country" class="form-control" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="zipcode">Zipcode</label>
                                                                            <input  value="{{ !empty(Auth::user()->zipcode) ?  Auth::user()->zipcode : old('zipcode') }}" type="text" name="zipcode" class="form-control" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="name">Profile Picture</label>
                                                                        @if (empty(Auth::user()->image))
                                                                            <img class="img-fluid" src="{{ asset('backend/img/users/user.png') }}">
                                                                        @else
                                                                           <img style="width: 200px; height:200px" class="img-fluid" src="{{ asset('backend/img/users/'.Auth::user()->image) }}">
                                                                         @endif
                                                                            <input  value="{{ !empty(Auth::user()->image) ?  Auth::user()->image : old('image') }}"
                                                                            type="file" name="image" class="form-control-file">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <button type="submit" class="btn btn-success float-right">Save Changes</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        {{-- User info show ends --}}
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
            
                                    </div>
                                </div>


                        

                            </div>
                        </div>

                    </div>

                </div>
            </div>
    @endsection
