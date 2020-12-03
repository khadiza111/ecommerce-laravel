@extends('backend.admin.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        <h4 style="color: red; text-align: center;">Manage Blog Criteria</h4>
      </div>       
      <div class="card-body">
        @include('backend.admin.partials.messages')
        <div class="row" style="float: right;">
          <div class="col-md-12">
            <a href="#addBlogCriteria" data-toggle="modal" class="btn btn-primary" style="padding: 10px; margin-bottom: 5px;">
              <i class="fa fa-plus"></i>Add Criteria
            </a>
          </div>
        </div>
        <div class="clearfix"></div>
        
          <!-- Add Modal -->        
          <div class="modal fade" id="addBlogCriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Blog Criteria</h5>
                            <span aria-hidden="true">&times;</span>
                          </div>
                          <div class="modal-body">
                          <form action="{!! route('admin.blogCriterias.store') !!}" method="post" enctype="multipart/form-data"> 
                          {{ csrf_field() }}

                          <div class="form-group">
                            <label for="name">Criteria Name<small class="text-danger"> (*)</small></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required>
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
            <th>Blog Criteria</th>
            <th>Action</th>
          </tr>
          
          @foreach($blog_criterias as $criteria)
          <tr>
                <td style="text-align: center; width: 20%">{{ $loop->index + 1 }}</td>
                <td style="white-space: normal; width: 30%">{{ $criteria->name }}</td>
                <td style="width: 50%">
                  <a href="#editModal{{ $criteria->id }}" data-toggle="modal" class="btn btn-info">Edit</a>

                  <!-- Edit Modal -->        
                    <div class="modal fade" id="editModal{{ $criteria->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
                                      <span aria-hidden="true">&times;</span>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{!! route('admin.blogCriterias.update', $criteria->id) !!}" method="post" enctype="multipart/form-data"> 
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                      <label for="name">Criteria Name<small class="text-danger"> (*)</small></label>
                                      <input type="text" class="form-control" name="name" id="name" value="{{ $criteria->name }}" placeholder="Country" required>
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

                  <a href="#deleteModal{{ $criteria->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!--Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $criteria->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                            <span aria-hidden="true">&times;</span>
                          </div>
                          <div class="modal-body">
                          <form action="{!! route('admin.blogCriterias.delete', $criteria->id) !!}" method="post"> 
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





















