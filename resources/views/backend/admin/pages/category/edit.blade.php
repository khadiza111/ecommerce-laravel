@extends('backend.admin.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        <h4 style="color: red; text-align: center;">Edit Category</h4>
      </div>       
      <div class="card-body">
        <form method="post" action="{{ route('admin.category.update', $category->id) }}" enctype="multipart/form-data">
          @csrf
          @include('backend.admin.partials.messages')
          <div class="form-group">
            <label for="title">Name : </label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
          </div>
          <div class="form-group">
            <label for="description">Description : </label>
            <textarea name="description" rows="8" cols="80" class="form-control">{{ $category->description }}</textarea>
          </div>
          <div class="form-group">
            <label for="old_image">Old Image : </label>&nbsp;&nbsp;&nbsp;&nbsp;
              <img src="{{ asset('public/images/categories/'. $category->image) }}" width="100"><br><br> 
            <label for="new_image">New Image : </label>
              <input type="file" class="form-control" name="image" id="image">   
          </div>
          <div class="form-group">
            <label for="product_id">Parent ID : </label>
            {{--<input type="number" class="form-control" name="parent_id" id="parent_id" value="{{ $category->parent_id }}">--}}
            <select class="form-control" id="parent_id" name="parent_id">
                    <option value="">Change Category </option>
                    @foreach ($main_cats as $cat)
                        <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
            </select>
          </div>
            <button type="submit" class="btn btn-success">Update</button>
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





















