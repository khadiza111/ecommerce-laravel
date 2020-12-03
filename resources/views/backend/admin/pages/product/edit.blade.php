@extends('backend.admin.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        <h4 style="color: red; text-align: center;">Edit Product</h4>
      </div>       
      <div class="card-body">
        <form method="post" action="{{ route('admin.product.update', $product->id) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          @include('backend.admin.partials.messages')
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $product->title }}">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" rows="8" cols="80" class="form-control">{{ $product->description }}</textarea>
          </div>
          {{--<div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug">
          </div>--}}
          <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" name="price" id="price" value="{{ $product->price }}">
          </div>
          <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" name="quantity" id="quantity" value="{{ $product->quantity }}">
          </div>

          <div class="form-group">
            <label for="category_id">Change Category</label>
            <select class="form-control" name="category_id">
              <option value="">Select category for product</option>
              @foreach(App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
                <option value="{{ $parent->id }}" {{ $parent->id == $product->category->id ? 'selected' : '' }}>{{ $parent->name }}</option>
              
                @foreach(App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
                  <option value="{{ $child->id }}" {{ $child->id == $product->category->id ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;{{ $child->name }}</option>
                @endforeach

              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="brand_id">Change Brand</label>
            <select class="form-control" name="brand_id">
              <option value="">Select Brand for product</option>
              @foreach(App\Models\Brand::orderBy('name', 'asc')->get() as $brd)     
                <option value="{{ $brd->id }}" {{ $brd->id == $product->brand_id ? 'selected' : '' }}>{{ $brd->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="product_image">Product Image</label>

            <div class="row">
              <div class="col-md-4">
                <input type="file" class="form-control" name="product_image[]" id="product_image">
              </div>
              <div class="col-md-4">
                <input type="file" class="form-control" name="product_image[]" id="product_image">
              </div>
              <div class="col-md-4">
                <input type="file" class="form-control" name="product_image[]" id="product_image">
              </div>
              <div class="col-md-4">
                <input type="file" class="form-control" name="product_image[]" id="product_image">
              </div>
              <div class="col-md-4">
                <input type="file" class="form-control" name="product_image[]" id="product_image">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="criteria_id">Change Criteria</label>
            <select class="form-control" name="criteria_id">
              <option value="">Select Criteria for product</option>
              @foreach(App\Models\ProductCriteria::orderBy('name', 'asc')->get() as $crt)     
                <option value="{{ $crt->id }}" {{ $crt->id == $product->criteria_id ? 'selected' : '' }}>{{ $crt->name }}</option>
              @endforeach
            </select>
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





















