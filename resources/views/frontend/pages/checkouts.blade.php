@extends('frontend.layouts.master')

@section('content')
	<div class="container margin-top-20">
		<h2 style="text-align: center; font-size: 30px; color: grey; font-weight: bold; font-variant-caps: small-caps;">Checkout Page</h2>
		<div class="card card-body">
			<h4>Checkout Items</h4>
			<hr>
			<div class="row">
				<div class="col-md-7 border-right">
					@foreach(App\Models\Cart::totalCarts() as $cart)
						<p>
							{{ $cart->product->title }} -
							<strong>{{ $cart->product->price }} TK. </strong>
							- {{ $cart->product_quantity }} items
						</p>
					@endforeach	
				</div>
				<div class="col-md-5">
					@php
						$total_price = 0;
					@endphp
					@foreach(App\Models\Cart::totalCarts() as $cart)
						@php
							$total_price += $cart->product->price * $cart->product_quantity; 
						@endphp
					@endforeach
					<p>Total Amount : <strong>{{ $total_price }}</strong> TK.</p>
					<p>Total Amount with Shipping Cost : <strong>{{ $total_price + App\Models\Setting::first()->shipping_cost }}</strong> TK.</p>
				</div>
			</div>
				<p>
					<a href="{{ route('carts') }}">Change Cart</a>
				</p>
		</div>
		<div class="card card-body mt-2 mb-4">
			<h4>Shipping Address</h4>
			<hr>
			<form method="POST" action="{{ route('checkout.store') }}">
				@csrf
						<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Client Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : ''}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::check() ? Auth::user()->email : ''}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone No') }}</label>

                            <div class="col-md-6">
                                <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : ''}}" required autocomplete="phone_no" autofocus>

                                @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Additional Message (Optional)') }}</label>

                            <div class="col-md-6">
                            	<textarea id="message" class="form-control @error('message') is-invalid @enderror" rows="4" name="message"  required autocomplete="message" autofocus>
                            		{{ Auth::check() ? Auth::user()->message : ''}}
                            	</textarea>

                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

						<div class="form-group row">
                            <label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address (*)') }}</label>

                            <div class="col-md-6">
                            	<textarea id="shipping_address" class="form-control @error('shipping_address') is-invalid @enderror" rows="4" name="shipping_address"  required autocomplete="shipping_address" autofocus>
                            		{{ Auth::check() ? Auth::user()->shipping_address : ''}}
                            	</textarea>

                                @error('shipping_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Payment Method (*)') }}</label>

                            <div class="col-md-6 box-select">
                           		<select class="form-control" name="payment_method_id" required id="payments">
                           			<option value="">Select Payment Method</option>
                           			@foreach($payments as $payment)
                           				<option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
                           			@endforeach
                           		</select>
                           		@foreach ($payments as $payment)
                           				@if ($payment->short_name == "cash_in")
                           					<div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 text-center hidden" style="margin-top: 15px;">
                           						<h3>
                           							You choose cash in delivery!
                           						</h3><br>
                           						<small>You can get your order in two or three days..</small>
                           					</div>
                           				@else
                           					<div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 text-center hidden" style="margin-top: 15px;">
		                           				<h3>{{ $payment->name }} Payment</h3>
		                           				<p>
		                           					<strong>{{ $payment->name }} No: {{ $payment->no }}</strong>
		                           					<br>
		                           					<strong>Account Type: {{ $payment->type }}</strong>
		                           				</p>
		                           				<div class="alert alert-success">
		                           							Please make payment to this {{ $payment->name }} No and fill your transaction code below..
		                           				</div>
                        
		                           			</div>	
                           				@endif
                           		@endforeach
                              <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Enter Transaction Code">
                           		
                        	</div>

                               {{--  @error('payment_method')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                        </div>
                            <div class="form-group row mb-0">
	                            <div class="col-md-6 offset-md-4">
	                                <!-- Set up a container element for the button -->
                                    <div id="paypal-button-container"></div>
	                            </div>
                        	</div>
                            <div class="form-group row mb-0">
	                            <div class="col-md-6 offset-md-4">
	                                <button type="submit" class="btn btn-primary">
	                                    {{ __('Order Now') }}
	                                </button>
	                            </div>
                        	</div>
        	</form>
		</div>
	</div>
@endsection

@section('scripts')
    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=ASbVSCwhGxp2-Bl9x6i5VErYykJnPpz4pNmG_BdNF_GYw17BNX7q_p94E80mPCka-PISDlb4LWyhMtap&currency=USD&disable-funding=credit"></script>

    <script>
        var total = '{{ $total_price + App\Models\Setting::first()->shipping_cost }}'
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: parseFloat(total).toFixed(2)
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    $total = '';
                    window.location = '/';
                    // return redirect()->route('index'); 
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                    
                });
            }


        }).render('#paypal-button-container');
        // return redirect()->route('index'); 
    </script>

	<script type="text/javascript">
    $("#payments").change(function(){
      $payment_method = $("#payments").val();
      if ($payment_method == "cash_in") {
        $("#payment_cash_in").removeClass('hidden');
        $("#payment_bkash").addClass('hidden');
        $("#payment_rocket").addClass('hidden');
        $("#payment_credit_card").addClass('hidden');
      } else if ($payment_method == "bkash") {
        $("#payment_bkash").removeClass('hidden');
        $("#payment_cash_in").addClass('hidden');
        $("#payment_rocket").addClass('hidden');
        $("#payment_credit_card").addClass('hidden');
        $("#transaction_id").removeClass('hidden');
      } else if ($payment_method == "rocket") {
        $("#payment_rocket").removeClass('hidden');
        $("#payment_bkash").addClass('hidden');
        $("#payment_cash_in").addClass('hidden');
        $("#payment_credit_card").addClass('hidden');
        $("#transaction_id").removeClass('hidden');
      } else if ($payment_method == "credit_card") {
        $("#payment_credit_card").removeClass('hidden');
        $("#payment_bkash").addClass('hidden');
        $("#payment_rocket").addClass('hidden');
        $("#payment_cash_in").addClass('hidden');
        $("#transaction_id").removeClass('hidden');
      }
    })
  </script>
@endsection