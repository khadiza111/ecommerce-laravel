<!DOCTYPE html>
<html>
<head>
  <title>Invoice - {{ $order->id }}</title>

  <link rel="stylesheet" href="{{asset('public/css/admin_style.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('public/css/admin_demostyle.css')}}">
    <!-- End Layout styles -->
  <style>
    thead {
      background: #ec5d01;
      color: #fff;
    }

    .authority h5 {
      margin-top: -10px;
      color: #ec5d01;
    }
    .thanks h4 {
      color: #ec5d01;
      font-size: 25px;
      font-weight: normal;
      font-family: serif;
      margin-top: 20px;
    }
    .site-address p {
      line-height: 8px;
      font-weight: 300;
    }
    .content-wrapper {
      background: #fff;
    }
    .invoice-header {
      background: #f7f7f7;
      padding: 10px 20px 10px 20px;
      border-bottom: 1px solid grey;
    }
    .invoice-right-top h3 {
      padding-right: 20px;
      margin-top: 20px;
      color: #ec5d0a;
      font-size: 50px!important;
      font-family: serif;
    }
    .invoice-left-top {
      border-left: 4px solid #ec5d00;
      padding-left: 20px;
      padding-top: 20px;
    }
  </style>
</head>
<body>
    <div class="content-wrapper">

      <div class="invoice-header">
        <div class="float-left site-logo">
        <img src="{{ asset('public/images/favicon.png') }}" alt="logo">
      </div>
      <div class="float-right site-address">
        <h4>LR_EC</h4>
        <p>123, Area, District Dhaka-1209</p>
        <p>Phone: <a href="">01234567</a></p>
        <p>Email: <a href="mailto:info@laravelec.com">info@laravelec.com</a></p>
      </div>
      <div class="clearfix"></div>
      </div>

      <div class="invoice-description">
        <div class="invoice-left-top float-left">
          <h6>Invoice to</h6>
          <h3>{{ $order->name }}</h3>
           <div class="address">
             <p><strong>Address: </strong>
              {{ $order->shipping_address }}
             </p>
             <p>Phone: {{ $order->phone_no }}</p>
             <p>Email: <a href="mailto:{{ $order->email }}">{{ $order->email }}</a></p>
           </div>
        </div>
        <div class="invoice-right-top float-right">
          <h3>Invoice #OLE{{ $order->id }}</h3>
          <p>{{ $order->created_at }}</p>
        </div>
        <div class="clearfix"></div>
      </div>
    
          {{--<div class="row">
                                         <div class="col-md-6">
                                             <table class="table table-striped table-hover table-responsive">
                                               <tr><h3>Order Information</h3> </tr>
                                               <hr>
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
                                       </div> --}}         
            <hr>
            <h3>Products</h3>
            @if ($order->carts->count() > 0)
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr style="text-align: center;">
                    <th>No.</th>
                    <th>Product Title</th>
                    <th>Product Quantity</th>
                    <th>Unit Price</th>
                    <th>Sub Total Price</th>
                  </tr>
                </thead>  
                <tbody>
                  @php
                    $total_price = 0;
                  @endphp
                  @foreach($order->carts as $cart)
                  <tr style="text-align: center;">
                    <td>
                      {{ $loop->index + 1 }}
                    </td>
                    <td>
                      <a href="{{ route('products.show', $cart->product->slug) }}">{{ $cart->product->title }}</a>
                    </td>
                    <td>
                     {{ $cart->product_quantity }}
                    </td>
                    <td>
                      {{ $cart->product->price }} TK.
                    </td>
                    
                      @php
                        $total_price += $cart->product->price * $cart->product_quantity;
                      @endphp
                    <td>
                      {{ $cart->product->price * $cart->product_quantity }} TK.
                    </td>
                  </tr>
                  @endforeach
                  <tr style="text-align: center;">
                    <td colspan="3"></td>
                    <td>Shipping Cost</td>
                    <td colspan="2"><strong>{{ $order->shipping_charge }} TK.</strong></td>
                  </tr>
                  <tr style="text-align: center;">
                    <td colspan="3"></td>
                    <td>Discount</td>
                    <td colspan="2"><strong>{{ $order->custom_discount }} TK.</strong></td>
                  </tr>
                  <tr style="text-align: center;">
                    <td colspan="3"></td>
                    <td>Total Amount</td>
                    <td colspan="2"><strong>{{ $total_price + $order->shipping_charge - $order->custom_discount }} TK.</strong></td>
                  </tr>
                </tbody>  
              </table> 
            @endif  

            <div class="thanks mt-3">
              <h4>Thank you for your order !!</h4>
            </div>  
            <div class="authority float-right mt-5">
              <p>.....................................</p>
              <h5>Authority Signature</h5>
            </div>  
            <div class="clearfix"></div>      

{{--<footer class="footer">
                    <div class="container-fluid clearfix">
                      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
                      </span>
                    </div>
                  </footer>--}}
    </div>  
    
</body>
</html>






















