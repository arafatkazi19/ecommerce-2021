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
											
													<table class="shop_table cart">
														<thead>
															<tr>
																<th class="product-remove">
																	&nbsp;
																</th>
																<th class="product-thumbnail">
																	&nbsp;
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

															@if($cartItems->count() <= 0)
																<div class="alert alert-info text-center font-weight-bold">
																	Please add pordcuts to your cart!!!!
																</div>
															@endif

															@php $sub_total = 0; @endphp
															@foreach ($cartItems as $item)
															<tr class="cart_table_item">
																<td class="product-remove">
																	<form action="{{ route('cart.destroy',$item->id) }}" method="post">
																		@csrf
																		<button type="submit" title="Remove This Item" class="remove item-remove"><i class="fas fa-times"></i></button>
																	</form>
																
																</td>
																<td class="product-thumbnail">
																	@if($item->product->product_images->count() > 0)
																	<a href="{{ route('product-details',$item->product->slug) }}" title="Camera X1000" class="product-image"><img src="{{asset('backend/img/products/'.$item->product->product_images->first()->product_image)}}" alt="{{ $item->product->title }}"> 
																	</a>
																	@endif
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
																	<form action="{{ route('cart.update',$item->id) }}" method="post" class="cart">
																		@csrf
																		<div class="quantity">
																			<input type="button" class="minus" value="-">
																			<input type="text" class="input-text qty text" title="Qty" value="{{ $item->quantity }}" name="quantity" min="1" step="1">
																			<input type="button" class="plus" value="+">
																		</div>

																		<div>
																			<input type="submit" value="Update" name="update" class="btn btn-update-cart btn-lg btn-info pr-4 pl-4 text-2 font-weight-semibold text-uppercase">
																		</div>
																	</form>
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
															{{-- <tr>
																<td class="actions" colspan="6">
																	<div class="actions-continue">
																		<input type="submit" value="Update Cart" name="update_cart" class="btn btn-xl btn-light pr-4 pl-4 text-2 font-weight-semibold text-uppercase">
																	</div>
																</td>
															</tr> --}}
														</tbody>
													</table>
											
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="featured-boxes">
								<div class="row">
								
									<div class="col-sm-6 offset-sm-6">
										<div class="featured-box featured-box-primary text-left mt-3 mt-lg-4">
											<div class="box-content">
												<h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Cart Totals</h4>
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
											</div>
										</div>
									</div>
								</div>

							</div>

							<div class="row">
								<div class="col">
									<div class="actions-continue">
										<a href="{{ route('checkout') }}" type="submit" class="btn btn-primary btn-modern text-uppercase">Proceed to Checkout <i class="fas fa-angle-right ml-1"></i></a>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>

			</div>
		</div>
@endsection
