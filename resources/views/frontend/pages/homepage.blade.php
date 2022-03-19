@extends('frontend.layout.template')
@section('body-content')
    <div role="main" class="main shop py-4">

        <div class="container">

            <div class="row">
                @include('frontend.includes.sidebar')

                <div class="col-lg-9">
                    <div class="masonry-loader masonry-loader-showing">
						<h2 class="text-center text-info font-weight-bold mb-3">Latest Porducts</h2>
                        <div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
							
							@foreach($latestProducts as $product)
							<div class="col-sm-6 col-lg-4 product">
								@if($product->is_featured == 1)
                                <a href="#">
                                    <span class="onsale">Sale!</span>
                                </a>
								@endif
                                <span class="product-thumb-info border-0">
                                    <form action="{{ route('cart.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
										<input type="hidden" value="1" value="{{ $product->id }}" name="quantity">
                                        <input type="submit" value="Add To Cart" name="addcart" class="add-to-cart-product bg-color-primary">
                                    </form>
										
											<a href="{{ route('product-details', $product->slug) }}">
												<span class="product-thumb-info-image">

													@foreach($product->product_images as $prodimages)
														<img alt="{{ $product->title }}" width="220px" height="180px" src="{{ asset('backend/img/products/'.$prodimages->product_image) }}" >
														@break
													@endforeach


													
												</span>
											</a>
											<span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
												<a href="shop-product-sidebar-left.html">
													<h4 class="text-4 text-primary">{{ $product->title }}</h4>
													<span class="price">
														@if ($product->is_featured == 1)
														<del><span class="amount">৳ {{ $product->regular_price }}</span></del>
														<ins><span class="amount text-dark font-weight-semibold"></span>৳ {{ $product->offer_price }}</ins>

														@else
														<ins><span class="amount text-dark font-weight-semibold"></span>৳ {{ $product->regular_price }}</ins>

														@endif
														
													</span>
												</a>
											</span>
										</span>
                            </div>
							@endforeach
                        </div>
						<hr>

						<h2 class="text-center text-info font-weight-bold mb-5">Featured Porducts</h2>
						
						<div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
							
							@foreach($featuredProducts as $product)
							<div class="col-sm-6 col-lg-4 product">
								
                                <a href="#">
                                    <span class="onsale">Sale!</span>
                                </a>
								
                                <span class="product-thumb-info border-0">
                                    <form action="{{ route('cart.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
										<input type="hidden" value="1" value="{{ $product->id }}" name="quantity">
                                        <input type="submit" value="Add To Cart" name="addcart" class="add-to-cart-product bg-color-primary">
                                    </form>
										
											<a href="{{ route('product-details', $product->slug) }}">
												<span class="product-thumb-info-image">

													@foreach($product->product_images as $prodimages)
														<img alt="{{ $product->title }}" width="220px" height="180px" src="{{ asset('backend/img/products/'.$prodimages->product_image) }}" >
														@break
													@endforeach


													
												</span>
											</a>
											<span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
												<a href="shop-product-sidebar-left.html">
													<h4 class="text-4 text-primary">{{ $product->title }}</h4>
													<span class="price">
														@if ($product->is_featured == 1)
														<del><span class="amount">৳ {{ $product->regular_price }}</span></del>
														<ins><span class="amount text-dark font-weight-semibold"></span>৳ {{ $product->offer_price }}</ins>

														@else
														<ins><span class="amount text-dark font-weight-semibold"></span>৳ {{ $product->regular_price }}</ins>

														@endif
														
													</span>
												</a>
											</span>
										</span>
                            </div>
							@endforeach
                        </div>
                        {{-- <div class="row">
                            <div class="col">
                                <ul class="pagination float-right">
                                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
