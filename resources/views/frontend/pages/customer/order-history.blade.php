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
											<div class="box-content order-history">
												{{-- Order history show starts --}}
													<div class="row">
														{{-- Left tab bar --}}
														<div class="col-3">
														  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
															<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Order History</a>
														  </div>
														</div>

														{{-- Order content --}}
														<div class="col-9">
														  <div class="tab-content" id="v-pills-tabContent">
															<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
																{{-- order content table --}}
																<table class="table">
																	<thead class="thead-dark">
																	  <tr>
																		<th scope="col">#</th>
																		<th scope="col">Order ID</th>
																		<th scope="col">Order Date</th>
																		<th scope="col">Items</th>
																		<th scope="col">Total Amount</th>
																		<th scope="col">Status</th>
																	  </tr>
																	</thead>
																	<tbody>
																	  <tr>
																		<th scope="row">1</th>
																		<td>#id 103290</td>
																		<td>28th Jan, 2022</td>
																		<td>
																			<button data-toggle="modal" data-target="#productDetails" class="btn btn-info">Products</button>
																																				  <!--Product Detail Modal -->
																	  			
<div class="modal fade" id="productDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  ...
		</div>
	  </div>
	</div>
  </div>
																		</td>
																		<td>$1032</td>
																		<td>
																			<span class="badge badge-success">Completed</span>
																			{{-- <span class="badge badge-primary">In Progress</span>
																			<span class="badge badge-danger">Cancelled</span>
																			<span class="badge badge-warning">Hold</span>
																			<span class="badge badge-dark">Returned</span> --}}
																			
																		</td>
																	  </tr>
																	  	
																	  
																	</tbody>
																  </table>
																{{-- order content table ends --}}
															</div>
														  </div>
														</div>
													  </div>

												{{--Order history show ends --}}
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
