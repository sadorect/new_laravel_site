@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="page-content">
  <div class="container-fluid">

  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Home Slide Page</h4>
                
                <form method="POST" action="{{ route('update.slider') }}" enctype="multipart/form-data">
                  @csrf

                  <input class="form-control" type="hidden" name="id" id="id" value=" {{$homeslide->id}}">

                    <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="title" id="title" value=" {{$homeslide->title}}">
                    </div>
                </div>

                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                  <div class="col-sm-10">
                      <input class="form-control" type="text" name="short_title" id="short_title" value=" {{$homeslide->short_title}}">
                  </div>
              </div>

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                <div class="col-sm-10">
                    <input class="form-control" type="url" name="video_url" id="video_url" value=" {{$homeslide->video_url}}">
                </div>
            </div>


            <div class="row mb-3">
              <label for="example-text-input" class="col-sm-2 col-form-label">Slider Image</label>
              <div class="col-sm-10">
                  <input class="form-control" type="file" name="slider_image" id="image" >
              </div>
          </div>


          <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <img class="rounded avatar-lg" id="showImage" src="{{ (!empty($homeslide->home_slide)) ? url($homeslide->home_slide): url('upload/no_image.jpg') }}" alt="Card image cap">
        </div>
          </div>

          <input type="submit" class="btn btn-round btn-info waves-effect waves-light" value="Update Slide">
                </form>
                <!-- end row -->
                
                <!-- end row -->
            </div>
        </div>
    </div>
  

  </div>
</div> 

<script type="text/javascript">
$(document).ready(function(){
  $('#image').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e){
      $('#showImage').attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
  });
});

</script>
@endsection