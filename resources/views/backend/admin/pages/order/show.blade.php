@extends('backend.admin.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        <h4 style="color: red; text-align: center;">View Order Details #OLE{{ $order->id }}</h4>
      </div>       
      <div class="card-body">
        @include('backend.admin.partials.messages')
        <div class="row">
          <div class="col-md-6">
            <table class="table table-striped table-hover table-responsive">
            <tr><h3>Order Information</h3> </tr><hr>
            <tr style="text-align: left; height: auto;">
              <th>Customer Name </th>
              <td>:</td>
              <td style="text-align: left; width: 268px;">{{ $order->name }}</td>
            </tr>
            <tr style="text-align: left; height: auto;">
              <th>Customer Phone </th>
              <td>:</td>
              <td style="text-align: left; width: 268px">{{ $order->phone_no }}</td>
            </tr>
            <tr style="text-align: left; height: auto;">
              <th>Customer Email </th>
              <td>:</td>
              <td style="text-align: left; width: 268px">{{ $order->email }}</td>
            </tr>
            <tr style="text-align: left; height: auto;">
              <th>Customer Shipping Address  </th>
              <td>:</td>
              <td style="text-align: left; width: 268px">{{ $order->shipping_address }}</td>
            </tr>
            <tr style="text-align: left; height: auto;">
              <th>Payment Method  </th>
              <td>:</td>
              <td style="text-align: left; width: 268px">{{ $order->payment->name }}</td>
            </tr>  
            <tr style="text-align: left; height: auto;">
              <th>Payment Transaction ID </th>
              <td>:</td>
              <td style="text-align: left; width: 268px">{{ $order->transaction_id }}</td>
            </tr>     
          </table>
          </div>
        </div>

    {{--<h3>Order Information</h3>  
             <div class="row">
               <div class="col-md-6 border-right">
                 <p><strong>Customer Name : </strong>{{ $order->name }}</p>
                 <p><strong>Customer Phone : </strong>{{ $order->phone_no }}</p>
                 <p><strong>Customer Email : </strong>{{ $order->email }}</p>
                 <p><strong>Customer Shipping Address : </strong>{{ $order->shipping_address }}</p>
               </div>
               <div class="col-md-6">
                 <p><strong>Payment Method in Order : </strong>{{ $order->payment->name }}</p>
                 <p><strong>Payment Transaction ID : </strong>{{ $order->transaction_id }}</p>
               </div>
             </div>--}}
        
        <hr> 
        <h3>Order Items</h3>
        @if ($order->carts->count() > 0)
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
            </thead>  
            <tbody>
              @php
                $total_price = 0;
              @endphp
              @foreach($order->carts as $cart)
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
          </table> 
        @endif

          <hr>
          <form action="{{ route('admin.order.charge', $order->id) }}" class="" method="post">
            @csrf
            <label for="">Shipping Cost</label>
            <input type="number" name="shipping_charge" id="shipping_charge" value="{{ $order->shipping_charge }}">
            <br>

            <label for="">Custom Discount</label>
            <input type="number" name="custom_discount" id="custom_discount" value="{{ $order->custom_discount }}">
            <br>

            <input type="submit" value="Update" class="mt-2 btn btn-success">
            <a href="{{ route('admin.order.invoice', $order->id) }}" class="ml-2 mt-2 btn btn-info" target="_blank">Generate Invoice</a>
          </form>
          <hr>

          <form action="{{ route('admin.order.completed', $order->id) }}" method="post" class="form-inline" style="display: inline-block!important; margin-top: 10px;">
            @csrf
            @if ($order->is_completed)
              <input type="submit" value="Cancel Order Order" class="btn btn-danger">
            @else
              <input type="submit" value="Complete Order" class="btn btn-dark">
            @endif 
          </form> 

          <form action="{{ route('admin.order.paid', $order->id) }}" method="post" class="form-inline" style="display: inline-block!important;">
            @csrf
            @if ($order->is_paid)
              <input type="submit" value="Cancel Payment" class="btn btn-danger">
            @else
              <input type="submit" value="Paid Order" class="btn btn-success">
            @endif
            <a href="{{ route('admin.all_orders') }}" style="float: right; display: inline-block; margin-left: 18px; font-size: 15px; text-decoration: none; color: #8c32ca;" class="form-inline">Go to Manage Orders Page</a>
          </form>      
      </div>     
    </div>

  </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
              </span>
            </div>
          </footer>
          <!-- partial -->
</div>
        <!-- main-panel ends -->

@endsection





















