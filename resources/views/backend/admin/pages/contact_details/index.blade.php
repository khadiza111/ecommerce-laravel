@extends('backend.admin.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        <h4 style="color: red; text-align: center;">Manage Contact Details</h4>
      </div>       
      <div class="card-body">
        @include('backend.admin.partials.messages')
        <div class="row" style="float: right;">
          <div class="col-md-12">
            <a href="#addContactDetails" data-toggle="modal" class="btn btn-primary" style="padding: 10px; margin-bottom: 5px;">
              <i class="fa fa-plus"></i>Add Contact Details
            </a>
          </div>
        </div>
        <div class="clearfix"></div>
        
          <!-- Add Modal -->        
          <div class="modal fade" id="addContactDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Details</h5>
                            <span aria-hidden="true">&times;</span>
                          </div>
                          <div class="modal-body">
                          <form action="{!! route('admin.contactDetails.store') !!}" method="post" enctype="multipart/form-data"> 
                          {{ csrf_field() }}

                          <div class="form-group">
                            <label for="phone">Phone No.<small class="text-danger"> (*)</small></label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone no." required>
                          </div>

                          <div class="form-group">
                            <label for="address">Address<small class="text-danger"></small></label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter address">
                          </div>

                          <div class="form-group">
                            <label for="open_time">Open Time<small class="text-danger"></small></label>
                            <input type="text" class="form-control" name="open_time" id="open_time" placeholder="Enter open time">
                          </div>

                          <div class="form-group">
                            <label for="email">Email ID<small class="text-danger"> (*)</small></label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter email" required>
                          </div>

                            <button type="submit" class="btn btn-dark">Insert</button>
                          </form>
                          </div>
                        
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          </div>
                      </div>
                  </div>
          </div>
          <!--End Add Modal-->

          <table class="table table-striped table-hover table-bordered table-responsive">
          <tr style="text-align: center; height: auto;">
            <th>ID</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Open Time</th>
            <th>Email ID</th>
            <th>Action</th>
          </tr>
          
          @foreach($con_details as $details)
          <tr>
                <td style="text-align: center; width: 10%">{{ $loop->index + 1 }}</td>
                <td style="white-space: normal; width: 15%">{{ $details->phone }}</td>
                <td style="white-space: normal; width: 20%">{{ $details->address }}</td>
                <td style="white-space: normal; width: 20%">{{ $details->open_time }}</td>
                <td style="white-space: normal; width: 15%">{{ $details->email }}</td>
                <td style="width: 20%">
                  <a href="#editModal{{ $details->id }}" data-toggle="modal" class="btn btn-info">Edit</a>

                  <!-- Edit Modal -->        
                    <div class="modal fade" id="editModal{{ $details->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
                                      <span aria-hidden="true">&times;</span>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{!! route('admin.contactDetails.update', $details->id) !!}" method="post" enctype="multipart/form-data"> 
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                      <label for="phone">Phone No.<small class="text-danger"> (*)</small></label>
                                      <input type="text" class="form-control" name="phone" id="phone" value="{{ $details->phone }}" placeholder="Phone" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="address">Address<small class="text-danger"></small></label>
                                      <input type="text" class="form-control" name="address" id="address" value="{{ $details->address }}" placeholder="Address">
                                    </div>
                                    <div class="form-group">
                                      <label for="open_time">Open Time<small class="text-danger"></small></label>
                                      <input type="text" class="form-control" name="open_time" id="open_time" value="{{ $details->open_time }}" placeholder="Open time">
                                    </div>
                                    <div class="form-group">
                                      <label for="email">Email ID<small class="text-danger"> (*)</small></label>
                                      <input type="text" class="form-control" name="email" id="email" value="{{ $details->email }}" placeholder="Email Id" required>
                                    </div>

                                      <button type="submit" class="btn btn-dark">Update</button>
                                    </form>
                                    </div>
                                  
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                  <!--End Edit Modal-->

                  <a href="#deleteModal{{ $details->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!--Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $details->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                            <span aria-hidden="true">&times;</span>
                          </div>
                          <div class="modal-body">
                          <form action="{!! route('admin.contactDetails.delete', $details->id) !!}" method="post"> 
                          {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                          </div>
                        
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          </div>
                      </div>
                    </div>
                  </div>
                  <!--End Delete Modal-->

                </td>
          </tr>
          @endforeach         
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





















