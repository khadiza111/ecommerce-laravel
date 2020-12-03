@extends('backend.admin.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        <h4 style="color: red; text-align: center;">Edit Division</h4>
      </div>       
      <div class="card-body">
        <form method="post" action="{{ route('admin.division.update', $division->id) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          @include('backend.admin.partials.messages')
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $division->name }}">
          </div>
          <div class="form-group">
            <label for="priority">Priority</label>
            <input type="number" class="form-control" name="priority" id="priority" value="{{ $division->priority }}">
          </div>
            <button type="submit" class="btn btn-primary">Update</button>
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





















