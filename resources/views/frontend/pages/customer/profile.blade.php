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
												{{-- User info show starts --}}
												<div class="row">
													<div class="col-lg-3">
														@if (empty(Auth::user()->image))
															<img class="img-fluid" src="{{ asset('backend/img/users/user.png') }}">
														@else
														<img class="img-fluid" src="{{ asset('backend/img/users/'.Auth::user()->image) }}">

														@endif
													</div>
													<div class="col-lg-9">
													   <div class="row">
															<div class="col-lg-6">
																<table class="table table-hover table-striped table-bordered">
																	<tbody>
																		<tr scope="col">
																			<th>Name</th>
																			<th>{{ Auth::user()->name }}</th>
																		</tr>

																		<tr scope="col">
																			<th>Email</th>
																			<th>{{ Auth::user()->email }}</th>
																		</tr>

																		<tr scope="col">
																			<th>Phone</th>
																			<th>{{ !empty(Auth::user()->phone) ? Auth::user()->phone : 'N/A' }}</th>
																		</tr>

																		<tr scope="col">
																			<th>Shipping Address</th>
																			<th>{{ !empty(Auth::user()->address) ? Auth::user()->address : 'N/A' }}</th>
																		</tr>
																	</tbody>
																</table>
															</div>

															<div class="col-lg-6">
																<table class="table table-hover table-striped table-bordered">
																	<tbody>

																		<tr scope="col">
																			<th>City</th>
																			<th>{{ !empty(Auth::user()->city) ? Auth::user()->city : 'N/A' }}</th>
																		</tr>

																		<tr scope="col">
																			<th>Country</th>
																			<th>{{ !empty(Auth::user()->country) ? Auth::user()->country : 'N/A' }}</th>
																		</tr>

																		<tr scope="col">
																			<th>Zipcode</th>
																			<th>{{ !empty(Auth::user()->zipcode) ? Auth::user()->zipcode : 'N/A' }}</th>
																		</tr>

																	
																	</tbody>
															
																</table>
															</div>

													   </div>
													   <div class="row">
														<div class="col-lg-12">
															<a class="btn btn-warning float-right text-dark" href="{{ route('profile.update',Auth::user()->id) }}">Update</a>
														</div>
													</div>
													</div>
													</div>
												</div>
												{{-- User info show ends --}}
											</div>
										</div>
									</div>
								</div>
							</div>


					

						</div>
					</div>

				</div>

			</div>
		</div>
@endsection
