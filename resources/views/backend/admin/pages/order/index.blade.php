@extends('backend.admin.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        <h4 style="color: red; text-align: center;">Manage Orders</h4>
      </div>       
      <div class="card-body">
        @include('backend.admin.partials.messages')
        {{--<div class="col-lg-12 col-md-10 mx-auto">--}}
          <table class="table table-striped table-hover table-bordered table-responsive" id="dataTable">
            <thead>
            <tr style="text-align: center; height: auto;">
              <th>#</th>
              <th>Order ID</th>
              <th>Customer Name</th>
              <th>Customer Phone</th>
              <th>Order Status</th>
              <th>Action</th>
            </tr>
            </thead>
          
            <tbody>
            @foreach($orders as $order)
            <tr>
                  <td style="text-align: center; width: 5%">{{ $loop->index + 1 }}</td>
                  <td style="text-align: center; width: 10%">#OLE{{ $order->id }}</td>
                  <td style="white-space: normal; width: 20%">{{ $order->name }}</td>
                  <td style="white-space: normal; width: 15%">{{ $order->phone_no }}</td>
      
                  <td style="text-align: right; width: 25%">
                     
                     <p>
                          @if ($order->is_seen_by_admin)
                              <button type="button" class="btn btn-primary btn-sm">Seen</button>
                          @else
                              <button type="button" class="btn btn-secondary btn-sm">Not Seen</button>
                          @endif 
                     </p> 

                     <p>
                          @if ($order->is_completed)
                              <button type="button" class="btn btn-primary btn-sm">Completed</button>
                          @else
                              <button type="button" class="btn btn-warning btn-sm">Not Completed</button>
                          @endif 
                     </p> 

                     <p>
                          @if ($order->is_paid)
                              <button type="button" class="btn btn-success btn-sm">Paid</button>
                          @else
                              <button type="button" class="btn btn-danger btn-sm">Not Paid</button>
                          @endif 
                     </p>            
                  </td>
                  <td style="text-align: center; width: 25%">
                    <a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-info">View Details</a>
                    <a href="#deleteModal{{ $order->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                    <!--Delete Modal -->
                    <div class="modal fade" id="deleteModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                                <span aria-hidden="true">&times;</span>
                            </div>
                            <div class="modal-body">
                              <form action="{!! route('admin.order.delete', $order->id) !!}" method="post"> 
                              @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </div>
                          
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                      </div>
                    </div>
                  </td>
            </tr>
            @endforeach
            </tbody> 
            <tfoot>
              <tr style="text-align: center; height: auto;">
                <th>#</th>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Customer Phone</th>
                <th>Order Status</th>
                <th>Action</th>
              </tr>
            </tfoot>        
        </table>
        
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





















