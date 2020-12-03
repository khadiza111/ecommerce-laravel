{{--<script src="{{ asset('public/js/jquery-3.5.1.min.js') }}" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}

{{--old theme scripts
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
	integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
	crossorigin="anonymous"></script>
<script src="{{ asset('public/js/popper.min.js') }}" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="{{ asset("public/js/bootstrap.min.js") }}" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

 JS Plugins
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
Old theme scripts--}}


<!--New theme Js Plugins -Ogani-->

    <script src="{{ asset('public/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('public/js/popper.min.js') }}" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    {{--<script src="{{ asset('public/js/jquery.nice-select.min.js') }}"></script>--}}
    <script src="{{ asset('public/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('public/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('public/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/js/main.js') }}"></script>
    


<!--New theme Js Plugins -Ogani-->

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
	// For csrf token
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
		}
	});

	//for add to cart
	function addToCart(product_id) {
		var url = "{{ url('/') }}";
		$.post(url + "/api/carts/store",
		{
			product_id: product_id
		})

		.done(function(data){
			//alert("Data loaded: " + data);
			//console.log(data);
			data = JSON.parse(data);
			if (data.status == 'success') {
				//toast
				alertify.set('notifier','position', 'top-center');
 				alertify.success('Item added to cart successfully! Total Item: '+data.totalItems+ '<br>Go to Checkout Page: <a href="{{ route('carts') }}">Checkout</a>');
				
				$("#totalItems").html(data.totalItems);
			}
		}); 
	}
</script>
