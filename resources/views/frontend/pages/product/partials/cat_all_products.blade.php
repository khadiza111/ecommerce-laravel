<div class="row">
							@foreach ($products as $product)
							
								<div class="col-md-3">
									<div class="card" style="height: 380px; margin-bottom: 20px;">	
								    {{--<img class="card-img-top featured-img" src="{{ asset('public/images/products/'.'{{ $product->image }}') }}" alt="Card image">--}}

								    @php $i=1; @endphp
								    @foreach($product->images as $image)
								    	@if ($i > 0)
								    	<a href="{{ route('products.show', $product->slug) }}">
								    		<img class="card-img-top featured-img" src="{{ asset('public/images/products/'. $image->image) }}" alt="{{ $product->title }}" style="height: 150px;">
								    	</a>
								    	@endif
								    @php $i--; @endphp	
								    @endforeach

		  								<div class="card-body">
		    								<h4 class="card-title">
		    									<a href="{{ route('products.show', $product->slug) }}">
		    										{{ $product->title }}
		    									</a>
		    								</h4>
										    <p class="card-text">TK. {{ $product->price }}</p>
										    @include('frontend.pages.product.partials.cart-button')
									  	</div>
									</div>
								</div>	

							@endforeach	
					</div>

<div class="mt-2 mb-3 pagination float-right">
	{{ $products->links() }}
</div>



















