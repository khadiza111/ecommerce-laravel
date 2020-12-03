@extends('frontend.layouts.master')

@section('content')
	<div class="container margin-top-20 mb-5">
		<h2 style="text-align: center; font-size: 30px; color: grey; font-weight: bold; font-variant-caps: small-caps; padding-bottom: 20px; padding-top: 20px;">Cart View</h2>
		@if (App\Models\Cart::totalItems() > 0)
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr style="text-align: center;">
						<th>No.</th>
						<th>Product Title</th>
						<th>Product Image</th>
						<th>Product Quantity</th>
						<th>Unit Price</th>
						<th>Sub Total Price</th>
						<th>Action</th>
					</tr>
				<tbody>
					@php
						$total_price = 0;
					@endphp
					@foreach(App\Models\Cart::totalCarts() as $cart)
						<tr style="text-align: center;">
						<td>{{ $loop->index + 1 }}</td>
						<td><a href="{{ route('products.show', $cart->product->slug) }}">{{ $cart->product->title }}</a></td>
						<td>
							@if ($cart->product->images->count() > 0)
								<img src="{{ asset('public/images/products/'. $cart->product->images->first()->image) }}" width="50px" height="50px">
							@endif
						</td>
						<td>
							<form class="form-inline" action="{{ route('carts.update', $cart->id) }}" method="post">
								@csrf
								<input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}">
								<button type="submit" class="btn btn-info ml-1">Update</button>
							</form>
						</td>
						<td>{{ $cart->product->price }} TK.</td>
							@php
								$total_price += $cart->product->price * $cart->product_quantity;
							@endphp
						<td>{{ $cart->product->price * $cart->product_quantity }} TK.</td>
						<td>
							<form class="form-inline" action="{{ route('carts.delete', $cart->id) }}" method="post">
								@csrf
								<input type="hidden" name="cart_id">
								<button type="submit" style="text-align: center;" class="btn btn-danger">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
					<tr style="text-align: center;">
						<td colspan="4"></td>
						<td>Total Amount</td>
						<td colspan="2"><strong>{{ $total_price }} TK.</strong></td>
					</tr>
				</tbody>	
				</thead>
			</table>
			<div class="float-right">
				<a href="{{ route('products') }}" class="btn btn-info btn-lg">Continue Shopping</a>
				<a href="{{ route('checkouts') }}" class="btn btn-warning btn-lg">Checkout</a>
			</div>
			<div class="clearfix"></div>
		@else
			<div class="alert alert-warning mt-4" style="height: 200px; padding-top: 50px;">
				<strong style="">No Item has selected!</strong>
				<br><br>
				<a href="{{ route('products') }}" class="btn btn-info btn-lg">Continue Shopping</a>
			</div>
		@endif
	</div>
@endsection