@extends('backend.admin.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        <h4 style="color: red; text-align: center;">Manage Districts</h4>
      </div>       
      <div class="card-body">
        @include('backend.admin.partials.messages')
        {{--<div class="col-lg-12 col-md-10 mx-auto">--}}
          <table class="table table-striped table-hover table-bordered table-responsive">
          <tr style="text-align: center; height: auto;">
            <th>ID</th>
            <th>District Name</th>
            <th>Division Name</th>
            <th>Action</th>
          </tr>
          
          @foreach($districts as $district)
          <tr>
                <td style="text-align: center; width: 15%">{{ $district->id }}</td>
                <td style="text-align: center; width: 20%">{{ $district->name }}</td>
                <td style="text-align: center; width: 25%">{{ $district->division->name }}</td>
                <td style="width: 25%">
                  <a href="{{ route('admin.district.edit', $district->id) }}" class="btn btn-info">Edit</a>
                  <a href="#deleteModal{{ $district->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!--Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $district->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.district.delete', $district->id) !!}" method="post"> 
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





















