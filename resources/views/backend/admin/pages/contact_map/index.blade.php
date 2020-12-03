@extends('backend.admin.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        <h4 style="color: red; text-align: center;">Manage Map Details</h4>
      </div>       
      <div class="card-body">
        @include('backend.admin.partials.messages')
        <div class="row" style="float: right;">
          <div class="col-md-12">
            <a href="#addContactMap" data-toggle="modal" class="btn btn-primary" style="padding: 10px; margin-bottom: 5px;">
              <i class="fa fa-plus"></i>Add Map Details
            </a>
          </div>
        </div>
        <div class="clearfix"></div>
        
          <!-- Add Modal -->        
          <div class="modal fade" id="addContactMap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Details</h5>
                            <span aria-hidden="true">&times;</span>
                          </div>
                          <div class="modal-body">
                          <form action="{!! route('admin.contactMap.store') !!}" method="post" enctype="multipart/form-data"> 
                          {{ csrf_field() }}

                          <div class="form-group">
                            <label for="country">Country<small class="text-danger"> (*)</small></label>
                            <input type="text" class="form-control" name="country" id="country" placeholder="Enter country" required>
                          </div>

                          <div class="form-group">
                            <label for="phone">Phone<small class="text-danger"> (*)</small></label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone" required>
                          </div>

                          <div class="form-group">
                            <label for="address">Address<small class="text-danger"></small></label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter address">
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
            <th>Country</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
          
          @foreach($con_map as $map)
          <tr>
                <td style="text-align: center; width: 10%">{{ $loop->index + 1 }}</td>
                <td style="white-space: normal; width: 20%">{{ $map->country }}</td>
                <td style="white-space: normal; width: 20%">{{ $map->phone }}</td>
                <td style="white-space: normal; width: 25%">{{ $map->address }}</td>
                <td style="width: 25%">
                  <a href="#editModal{{ $map->id }}" data-toggle="modal" class="btn btn-info">Edit</a>

                  <!-- Edit Modal -->        
                    <div class="modal fade" id="editModal{{ $map->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
                                      <span aria-hidden="true">&times;</span>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{!! route('admin.contactMap.update', $map->id) !!}" method="post" enctype="multipart/form-data"> 
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                      <label for="country">Country<small class="text-danger"> (*)</small></label>
                                      <input type="text" class="form-control" name="country" id="country" value="{{ $map->country }}" placeholder="Country" required>
                                    </div>

                                    <div class="form-group">
                                      <label for="phone">Phone<small class="text-danger"> (*)</small></label>
                                      <input type="text" class="form-control" name="phone" id="phone" value="{{ $map->phone }}" placeholder="Phone" required>
                                    </div>

                                    <div class="form-group">
                                      <label for="address">Address<small class="text-danger"></small></label>
                                      <input type="text" class="form-control" name="address" id="address" value="{{ $map->address }}" placeholder="Address">
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

                  <a href="#deleteModal{{ $map->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!--Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $map->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                            <span aria-hidden="true">&times;</span>
                          </div>
                          <div class="modal-body">
                          <form action="{!! route('admin.contactMap.delete', $map->id) !!}" method="post"> 
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





















