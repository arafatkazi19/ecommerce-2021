@extends('frontend.layout.template')
@section('body-content')


		<div class="body">

			<div role="main" class="main shop py-4">

				<div class="container">

					<div class="row">
						<div class="col">
							<p>Returning customer? <a href="shop-login.html">Click here to login.</a></p>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-9">

							<div class="accordion accordion-modern" id="accordion">
					
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title m-0">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
												Fillup Shipping Address to complete the order
											</a>
										</h4>
									</div>
									<div id="collapseTwo" class="collapse show">
										<div class="card-body">
											<form action="/" id="frmShippingAddress" method="post">
					@csrf
										
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">First Name</label>
														<input type="text" value="" name="first_name" class="form-control">
													</div>
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Last Name</label>
														<input type="text" value="" name="last_name" class="form-control">
													</div>
												</div>

												<div class="form-row">
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">email</label>
														<input type="text" value="" name="email" class="form-control">
													</div>
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Phone</label>
														<input type="text" value="" name="phone" class="form-control">
													</div>
												</div>

										
												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Shipping Address [Flat#, house# etc]</label>
														<input type="text" value="" name="address" class="form-control">
													</div>
												</div>

												<div class="form-row">
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">District</label>
														<select class="form-control" name="district_id">
															<option value="">Please select your District</option>
														</select>
													</div>
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Division</label>
														<select class="form-control" name="division_id">
															<option value="">Please select your Division</option>
														</select>
													</div>
												</div>

												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Country</label>
														<input type="text" value="Bangladesh" name="country" class="form-control">
													</div>
												</div>

												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Message[if any]</label>
														<textarea placeholder="write your message..." name="message" rows="3" class="form-control"></textarea>
													</div>
												</div>

												<div class="form-row">
													<div class="form-group col">
														<input type="submit" value="Continue" class="btn btn-xl btn-light pr-4 pl-4 text-2 font-weight-semibold text-uppercase float-right mb-2" data-loading-text="Loading...">
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title m-0">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
												Review &amp; Payment
											</a>
										</h4>
									</div>
									<div id="collapseThree" class="collapse">
										<div class="card-body">
											<table class="shop_table cart">
												<thead>
													<tr>
														{{-- <th class="product-thumbnail">
															&nbsp;
														</th> --}}
														<th>
															#sl.
														</th>
														<th class="product-name">
															Product
														</th>
														<th class="product-price">
															Price
														</th>
														<th class="product-quantity">
															Quantity
														</th>
														<th class="product-subtotal">
															Total
														</th>
													</tr>
												</thead>
												<tbody>
													
										

												@php $i=1; $sub_total = 0; @endphp
												@foreach ($cartItems as $item)
												<tr class="cart_table_item">
													{{-- <td class="product-remove">
														<form action="{{ route('cart.destroy',$item->id) }}" method="post">
															@csrf
															<button type="submit" title="Remove This Item" class="remove item-remove"><i class="fas fa-times"></i></button>
														</form>
													
													</td> --}}
													{{-- <td class="product-thumbnail">
														@if($item->product->product_images->count() > 0)
														<a href="{{ route('product-details',$item->product->slug) }}" title="Camera X1000" class="product-image"><img src="{{asset('backend/img/products/'.$item->product->product_images->first()->product_image)}}" alt="{{ $item->product->title }}"> 
														</a>
														@endif
													</td> --}}
													<td>
														{{ $i++ }}
													</td>
													<td class="product-name">
														<a href="{{ route('product-details',$item->product->slug) }}">{{ $item->product->title }}</a>
													</td>
													<td class="product-price">
														<span class="amount">
														 <span class="price">৳ {{ !empty($item->product->offer_price) ? $item->product->offer_price : $item->product->regular_price }}
														</span>
													</td>
													<td class="product-quantity">
														{{ $item->quantity }}
													</td>
													<td class="product-subtotal">
														<span class="amount">
															৳ {{ !empty($item->product->offer_price) ? $sub_total = $item->product->offer_price * $item->quantity 
																	: $sub_total = $item->product->regular_price * $item->quantity
															}}
														</span>
													</td>

													<td>
														
													</td>
												</tr>
												@endforeach
											
												</tbody>
											</table>

											<hr class="solid my-5">

											<h4 class="text-primary">Cart Totals</h4>
											<table class="cart-totals">
												<tbody>
													<tr class="cart-subtotal">
														<th>
															<strong class="text-dark">Cart Subtotal</strong>
														</th>
														<td>
															<strong class="text-dark"><span class="amount">৳ {{ App\Models\Cart::totalPrice() }}</span></strong>
														</td>
													</tr>
													<tr class="shipping">
														<th>
															Shipping
														</th>
														<td>
															Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
														</td>
													</tr>
													<tr class="total">
														<th>
															<strong class="text-dark">Order Total</strong>
														</th>
														<td>
															<strong class="text-dark"><span class="amount">৳ {{ App\Models\Cart::totalPrice() }}</span></strong>
														</td>
													</tr>
												</tbody>
											</table>

											<hr class="solid my-5">

											<h4 class="text-primary">Payment</h4>

											<form action="/" id="frmPayment" method="post">
												<div class="form-row">
													<div class="form-group col">
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" id="paymentdirectbank">
															<label class="custom-control-label" for="paymentdirectbank">Direct Bank Transfer</label>
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" id="paymentcheque">
															<label class="custom-control-label" for="paymentcheque">Cheque Payment</label>
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" id="paymentpaypal">
															<label class="custom-control-label" for="paymentpaypal">Paypal</label>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>

							<div class="actions-continue">
								<input id="sslczPayBtn" type="submit" value="Place Order" name="proceed" class="btn btn-primary btn-modern text-uppercase mt-5 mb-5 mb-lg-0">
							</div>

						</div>
						<div class="col-lg-3">
							<h4 class="text-primary">Cart Totals</h4>
							<table class="cart-totals">
								<tbody>
									<tr class="cart-subtotal">
										<th>
											<strong class="text-dark">Cart Subtotal</strong>
										</th>
										<td>
											<strong class="text-dark"><span class="amount">$431</span></strong>
										</td>
									</tr>
									<tr class="shipping">
										<th>
											Shipping
										</th>
										<td>
											Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
										</td>
									</tr>
									<tr class="total">
										<th>
											<strong class="text-dark">Order Total</strong>
										</th>
										<td>
											<strong class="text-dark"><span class="amount">$431</span></strong>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

				</div>

			</div>
        </div>
@endsection
