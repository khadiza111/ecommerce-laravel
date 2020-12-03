@extends('backend.admin.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        <h4 style="color: red; text-align: center;">Manage Products</h4>
      </div>       
      <div class="card-body">
        @include('backend.admin.partials.messages')
        {{--<div class="col-lg-12 col-md-10 mx-auto">--}}
          <table class="table table-striped table-hover table-bordered table-responsive" id="dataTable">
            <thead>
              <tr style="text-align: center; height: auto; width: 100%">
                <th>#</th>
                <th>Produect Code</th>
                <th>Cat Id</th>
                <th>Brand Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Slug</th>
                {{--<th>Image</th>--}}
                <th>Price</th>
                <th>Qty</th>
                <th>Ad_ID</th>
                <th>Action</th>
              </tr>
            </thead>
          
            <tbody>
            @foreach($products as $product)
              <tr>
                    <td style="text-align: center; width: 5%">{{ $loop->index + 1 }}</td>
                    <td style="text-align: center; width: 5%">#PLE{{ $product->id }}</td>
                    <td style="text-align: center; width: 5%">{{ $product->category_id }}</td>
                    <td style="text-align: center; width: 5%">{{ $product->brand_id }}</td>
                    <td style="white-space: normal; width: 15%">{{ $product->title }}</td>
                    <td style="white-space: normal; width: 15%">
                      <form action="{{ route('admin.all_products') }}">
                        <textarea rows="5" cols="10" name="description" wrap="hard">
                          {{ $product->description }}
                        </textarea>
                      </form>
                    </td>
                    <td style="white-space: normal; width: 10%">{{ $product->slug }}</td>
                    {{--<td style="width: 100px; height: 100px">{{ $product->image }}</td>--}}
                    <td style="text-align: center; width: 10%">{{ $product->price }}</td>
                    <td style="text-align: center; width: 5%">{{ $product->quantity }}</td>
                    <td style="text-align: center; width: 5%">{{ $product->admin_id }}</td>
                    <td style="width: 25%">
                      <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-info">Edit</a><br><br>
                      <a href="#deleteModal{{ $product->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                      <!--Delete Modal -->
                      <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                                <span aria-hidden="true">&times;</span>
                            </div>
                            <div class="modal-body">
                              <form action="{!! route('admin.product.delete', $product->id) !!}" method="post"> 
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
            </tbody> 
            <tfoot>
                <th>ID</th>
                <th>Cat Id</th>
                <th>Brand Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Slug</th>
                {{--<th>Image</th>--}}
                <th>Price</th>
                <th>Qty</th>
                <th>Ad_ID</th>
                <th>Action</th>
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





















