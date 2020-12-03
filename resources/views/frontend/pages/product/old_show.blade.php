@extends('frontend.layouts.master')

@section('title')
	{{ $product->title }} | EC (Laravel)
@endsection

@section('content')

	{{--Start sidebar and Content--}}	
	<div class='container margin-top-20'>
		<div class="row">
			<div class="col-md-3">
				{{--@include('frontend.partials.product-sidebar')--}}
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					  <div class="carousel-inner">
						    @php $i = 1; @endphp
						    @foreach ($product->images as $image)
						    	<div class="product-item carousel-item {{ $i == 1 ? 'active' : '' }}">
							      <img src="{{ asset('public/images/products/'. $image->image) }}" class="d-block w-100" alt="{{ $product->title }}">
							    </div>
							@php $i++; @endphp    
						    @endforeach
					  </div>
							<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
							    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
							    <span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
							    <span class="carousel-control-next-icon" aria-hidden="true"></span>
							    <span class="sr-only">Next</span>
							</a>
				</div>

				<div class="mt-3">
					<p>Category : <span class="badge badge-info">{{ $product->category->name }}</span></p>
					<p>Brand : <span class="badge badge-info">{{ $product->brand->name }}</span></p>
				</div>
			</div>
			<div class="col-md-9">
				<div class="widget">
					<h3>{{ $product->title }}</h3><br>
					<h4>{{ $product->price }} TK. 
						{{--<span class="product-qtn badge badge-primary">
							{{ $product->quantity }}
						</span>--}}
						<span class="product-qtn badge badge-pill badge-warning">
							{{ $product->quantity < 1 ? '0' : $product->quantity }}
						</span>
					</h4><hr>
					<div class="product-description">
						<p style="text-align: justify;">{{ $product->description }} </p>
					</div>	
				</div>
				<div class="widget">
					
				</div>
				<div class="widget">
					
				</div>
			</div>
		</div>
	</div>
	{{-- end of sidebar and content--}}

@endsection
