@extends('backend.admin.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        <h4 style="color: red; text-align: center;">Manage Sliders</h4>
      </div>       
      <div class="card-body">
        @include('backend.admin.partials.messages')
        <div class="row" style="float: right;">
          <div class="col-md-12">
            <a href="#addSliderModal" data-toggle="modal" class="btn btn-primary" style="padding: 10px; margin-bottom: 5px;">
              <i class="fa fa-plus"></i>Add New Slider
            </a>
          </div>
        </div>
        <div class="clearfix"></div>
        
          <!-- Add Modal -->        
          <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add New Slider</h5>
                            <span aria-hidden="true">&times;</span>
                          </div>
                          <div class="modal-body">
                          <form action="{!! route('admin.slider.store') !!}" method="post" enctype="multipart/form-data"> 
                          {{ csrf_field() }}

                          <div class="form-group">
                            <label for="title">Slider Title<small class="text-danger"> (*)</small></label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Slider Title" required>
                          </div>

                          <div class="form-group">
                            <label for="image">Slider Image<small class="text-danger"> (*)</small></label>
                            <input type="file" class="form-control" name="image" id="image" placeholder="Slider Image" required>
                          </div>

                          <div class="form-group">
                            <label for="button_text">Slider Button Text<small class="text-info"> (optional)</small></label>
                            <input type="text" class="form-control" name="button_text" id="button_text" placeholder="Slider Button Text (If need)">
                          </div>

                          <div class="form-group">
                            <label for="button_link">Slider Button Link<small class="text-info"> (optional)</small></label>
                            <input type="url" class="form-control" name="button_link" id="button_link" placeholder="Slider Button Link (If need)">
                          </div>

                          <div class="form-group">
                            <label for="priority">Slider Priority<small class="text-danger"> (*)</small></label>
                            <input type="number" class="form-control" name="priority" id="priority" placeholder="Slider Priority" required>
                          </div>

                            <button type="submit" class="btn btn-dark">Add New</button>
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
            <th>Slider Title</th>
            <th>Slider Image</th>
            <th>Slider Btn Link</th>
            <th>Slider Priority</th>
            <th>Action</th>
          </tr>
          
          @foreach($sliders as $slider)
          <tr>
                <td style="text-align: center; width: 10%">{{ $loop->index + 1 }}</td>
                <td style="white-space: normal; width: 15%">{{ $slider->title }}</td>
                
                <td style="white-space: normal; width: 20%">
                  <img src="{{ asset('public/images/sliders/'. $slider->image) }}" style="border-radius: unset; width: 120px; height: 50px;">
                </td>

                <td style="white-space: normal; width: 20%">
                  <form action="{{ route('admin.all_sliders') }}">
                        <textarea rows="5" cols="16" name="slider" wrap="hard">
                          {{ $slider->button_link }}
                        </textarea>
                  </form>
                </td>

                <td style="text-align: center; width: 10%">{{ $slider->priority }}</td>
                
                <td style="width: 25%">
                  <a href="#editModal{{ $slider->id }}" data-toggle="modal" class="btn btn-info">Edit</a>

                  <!-- Edit Modal -->        
                    <div class="modal fade" id="editModal{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Slider</h5>
                                      <span aria-hidden="true">&times;</span>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{!! route('admin.slider.update', $slider->id) !!}" method="post" enctype="multipart/form-data"> 
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                      <label for="title">Slider Title<small class="text-danger"> (*)</small></label>
                                      <input type="text" class="form-control" name="title" id="title" value="{{ $slider->title }}" placeholder="Slider Title" required>
                                    </div>

                                    <div class="form-group">
                                      <label for="image">Slider Image
                                        <a href="{{ asset('public/images/sliders/'.$slider->image) }}" target="_blank">
                                          Previous Image
                                        </a>
                                      </label>
                                      <input type="file" class="form-control" name="image" id="image" value="{{ $slider->image }}" placeholder="Slider Image">
                                    </div>

                                    <div class="form-group">
                                      <label for="button_text">Slider Button Text<small class="text-info"> (optional)</small></label>
                                      <input type="text" class="form-control" name="button_text" id="button_text" value="{{ $slider->button_text }}" placeholder="Slider Button Text (If need)">
                                    </div>

                                    <div class="form-group">
                                      <label for="button_link">Slider Button Link<small class="text-info"> (optional)</small></label>
                                      <input type="url" class="form-control" name="button_link" id="button_link" value="{{ $slider->button_link }}" placeholder="Slider Button Link (If need)">
                                    </div>

                                    <div class="form-group">
                                      <label for="priority">Slider Priority<small class="text-danger"> (*)</small></label>
                                      <input type="number" class="form-control" name="priority" id="priority" value="{{ $slider->priority }}" placeholder="Slider Priority" required>
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

                  <a href="#deleteModal{{ $slider->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!--Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                            <span aria-hidden="true">&times;</span>
                          </div>
                          <div class="modal-body">
                          <form action="{!! route('admin.slider.delete', $slider->id) !!}" method="post"> 
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





















