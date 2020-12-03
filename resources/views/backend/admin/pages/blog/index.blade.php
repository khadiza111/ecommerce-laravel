@extends('backend.admin.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        <h4 style="color: red; text-align: center;">Manage Blog Posts</h4>
      </div>       
      <div class="card-body">
        @include('backend.admin.partials.messages')
        <div class="row" style="float: right;">
          <div class="col-md-12">
            <a href="#addBlogPosts" data-toggle="modal" class="btn btn-primary" style="padding: 10px; margin-bottom: 5px;">
              <i class="fa fa-plus"></i>Add Post
            </a>
          </div>
        </div>
        <div class="clearfix"></div>
        
          <!-- Add Modal -->        
          <div class="modal fade" id="addBlogPosts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Blog Post</h5>
                            <span aria-hidden="true">&times;</span>
                          </div>
                          <div class="modal-body">
                          <form action="{!! route('admin.blogPosts.store') !!}" method="post" enctype="multipart/form-data"> 
                          {{ csrf_field() }}

                          <div class="form-group">
                            <label for="title">Title<small class="text-danger"> (*)</small></label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" required>
                          </div>

                          <div class="form-group">
                            <label for="sub_title">Sub Title<small class="text-danger"> (*)</small></label>
                            <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="Enter sub title" required>
                          </div>

                          <div class="form-group">
                            <label for="image">Image<small class="text-danger"> (*)</small></label>
                                <input type="file" class="form-control" name="image" id="image" placeholder="Enter image">
                          </div> 

                          <div class="form-group">
                            <label for="description">Description<small class="text-danger"></small></label>
                            {{-- <input type="text" class="form-control" name="description" id="description" placeholder="Enter description"> --}}
                            <textarea name="description" rows="8" cols="80" id="description" class="form-control" placeholder="Enter Description here...."></textarea>
                          </div>

                          <div class="form-group">
                            <label for="blog_criteria_id">Select Blog Criteria</label>
                            <select class="form-control" name="blog_criteria_id">
                              <option value="">Select Criteria </option>
                              @foreach(App\Models\BlogCriteria::orderBy('name', 'asc')->get() as $criteria)     
                                <option value="{{ $criteria->id }}">{{ $criteria->name }}</option>
                              @endforeach
                            </select>
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
            <th>Title</th>
            <th>Sub Title</th>
            <th>Image</th>
            <th>Description</th>
            <th>Blog Criteria</th>
            <th>Action</th>
          </tr>
          
          @foreach($blog_posts as $post)
          <tr>
                <td style="text-align: center; width: 5%">{{ $loop->index + 1 }}</td>
                <td style="white-space: normal; width: 15%">{{ $post->title }}</td>
                <td style="white-space: normal; width: 15%">{{ $post->sub_title }}</td>
                <td style="white-space: normal; width: 15%">
                  <img style="height: 100px; width: 120px; border-radius: unset;" src="{{ asset('public/images/blogPosts/'. $post->image) }}">
                </td>
                {{-- <td style="white-space: normal; width: 20%">{{ $post->description }}</td> --}}
                <td style="white-space: normal; width: 20%">
                      <form action="{{ route('admin.all_blogPosts') }}">
                        <textarea rows="8" cols="30" name="description" wrap="hard">
                          {{ $post->description }}
                        </textarea>
                      </form>
                </td>
                <td style="white-space: normal; text-align: center; width: 10%">{{ $post->blog_criteria_id }}</td>
                <td style="width: 20%">
                  <a href="#editModal{{ $post->id }}" data-toggle="modal" class="btn btn-info">Edit</a>

                  <!-- Edit Modal -->        
                    <div class="modal fade" id="editModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
                                      <span aria-hidden="true">&times;</span>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{!! route('admin.blogPosts.update', $post->id) !!}" method="post" enctype="multipart/form-data"> 
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                      <label for="title">Title<small class="text-danger"> (*)</small></label>
                                      <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}" placeholder="Country" required>
                                    </div>

                                    <div class="form-group">
                                      <label for="sub_title">Sub Title<small class="text-danger"> (*)</small></label>
                                      <input type="text" class="form-control" name="sub_title" id="sub_title" value="{{ $post->sub_title }}" placeholder="Phone" required>
                                    </div>

                                    <div class="form-group">
                                      <label for="old_image">Old Image : </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <img src="{{ asset('public/images/blogPosts/'. $post->image) }}" width="100"><br><br> 
                                      <label for="new_image">New Image : </label>
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>

                                    <div class="form-group">
                                      <label for="description">Description<small class="text-danger"></small></label>
                                      {{-- <input type="text" class="form-control" name="description" id="description" value="{{ $post->description }}" placeholder="Address"> --}}
                                      <textarea name="description" rows="8" cols="80" id="description" class="form-control" placeholder="Enter Description here....">{{ $post->description }}</textarea>
                                    </div>

                                    <div class="form-group">
                                      <label for="blog_criteria_id">Criteria</label>
                                      <select class="form-control" name="blog_criteria_id">
                                        <option value="">Select Criteria</option>
                                        @foreach(App\Models\BlogCriteria::orderBy('name', 'asc')->get() as $crt)     
                                          <option value="{{ $crt->id }}" {{ $crt->id == $post->blog_criteria_id ? 'selected' : '' }}>{{ $crt->name }}</option>
                                        @endforeach
                                      </select>
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

                  <a href="#deleteModal{{ $post->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!--Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                            <span aria-hidden="true">&times;</span>
                          </div>
                          <div class="modal-body">
                          <form action="{!! route('admin.blogPosts.delete', $post->id) !!}" method="post"> 
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





















