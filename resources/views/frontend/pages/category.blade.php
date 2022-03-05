@extends('frontend.layout.template')
@section('body-content')
    <div role="main" class="main shop py-4">

        <div class="container">

            <div class="row">
                @include('frontend.includes.sidebar')

                <div class="col-lg-9">
                    <div class="masonry-loader masonry-loader-showing">
                        <div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
                        
                            @if($category->products->count() > 0)
                            @foreach($category->products as $product)
							<div class="col-sm-6 col-lg-4 product">
								@if($product->is_featured == 1)
                                <a href="#">
                                    <span class="onsale">Sale!</span>
                                </a>
								@endif
                                <span class="product-thumb-info border-0">
											<a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
												<span class="text-uppercase text-1">Add to Cart</span>
											</a>
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
                            @else
                                <div class="col-lg-12">
                                    <div class="alert alert-info text text-center">
                                       <strong>Ooopppss !!! No Products found of this Category</strong>
                                    </div>
                                </div>
                            @endif
                    
                        </div>
                        <div class="row">
                            {{-- <div class="col">
                                <ul class="pagination float-right">
                                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
