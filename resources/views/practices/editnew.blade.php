@extends('layouts.app', ['activePage' => 'practices', 'titlePage' => __('Practices')])

@section('content')

<style type="text/css">
  input[type="file"] {
      display: none;
  }
</style>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('practices.update', $practice->id) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('put')
        <div class="card ">
          <div class="card-header card-header-rose card-header-icon">
            <div class="card-icon">
            <i class="material-icons">foundation</i>
            </div>
            <h4 class="card-title">Edit Practice</h4>
          </div>
          <div class="card-body ">
            <div class="row">
              <div class="col-md-12 text-right">
                  <a href="{{ route('practices.index') }}" class="btn btn-sm btn-rose">Back to list</a>
              </div>
            </div>
            <div class="row" id="uploadDiv">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose ">Practice
                      Logo</label>
                  <div class="col-sm-8">
                      <div class="fileinput fileinput-new text-center">
                          <div class="fileinput-new thumbnail img-circle">
                              <img id="image2"
                                   src="https://user-images.githubusercontent.com/20684618/31289519-9ebdbe1a-aae6-11e7-8f82-bf794fdd9d1a.png"
                                      alt="..." style="width: 200px; border-radius: 8px; display: none;">
                              <div id="image1">
                                  <img id="target"
                                      src="{{ $practice->image_id ? asset($practice->image->image_url) : '' }}"
                                      alt="..." style="width: 200px; border-radius: 8px;">
                              </div>
                          </div>
                          <div>
                              <label style="font-weight:bold" class="custom-file-upload btn btn-rose"
                                  id="image-label" onclick="hidebutton()">
                                  <input type="file" name="image_url1" id="src" />
                                  UPLOAD LOGO
                              </label>
                              <div id="remove" style="display: none;">
                                  <label style="font-weight:bold"
                                      class="custom-file-upload btn btn-rose"
                                      onclick="hidebutton()">
                                      <input type="file" name="image_url2" id="src1" />
                                      <input type="hidden" name="image_url"
                                          value="{{ $practice->image_id }}">
                                      CHANGE LOGO
                                  </label>
                                  <span class="btn btn-danger btn-file" onclick="removeImage()"><i
                                          class="fa fa-times"></i>Remove</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
              <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('ID') }}</label>
              <div class="col-sm-8">
                <div class="form-group">
                  <input class="form-control" name="id" type="text" value="{{ $practice->id }}" disabled>
                </div>
              </div>
            </div>
            <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Practice Name') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="practice_name"  type="text" value="{{ $practice->practice_name }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label  text-rose">{{ __('Practice Email') }}</label>
                    <div class="col-sm-8">
                      <div class="form-group">  
                        <input class="form-control" name="practice_email" type="email" value="{{ $practice->practice_email }}" required="true" aria-required="true"/>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Practice Address') }}</label>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <input class="form-control" name="practice_address" type="text" value="{{ $practice->practice_address }}" required="true" aria-required="true"/>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Practice Telephone') }}</label>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <input class="form-control" name="practice_telephone" type="text" value="{{ $practice->practice_telephone }}" required="true" aria-required="true"/>
                      </div>
                    </div>
                </div>
                <div class="form-row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Clinic') }}</label>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <select class="custom-select custom-select-md" name="clinic_id">
                            <option value="{{ $practice->clinic_id }}">{{ $practice->clinic->clinic_name }}</option>
                        @foreach ($clinics as $clinic)
                            <option value="{{ $clinic->id }}">{{ $clinic->clinic_name }}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>
                </div>
                <div class="row" id="imageDiv">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Select Practice Logo') }}</label>
                    <div class="col-sm-8">
                      <div class="form-group{{ $errors->has('image_id') ? ' has-danger' : '' }}">
                        @foreach ($images as $image)
                        @if ($practice->image_id == $image->id)
                        <div class="form-check form-check-radio form-check-inline">
                          <label class="form-check-label"><img src="{{ $practice->image_id ? asset($practice->image->image_url) : '' }}" alt="" style="height: 100px; height: 100px;" >
                            <input class="form-check-input" type="radio" id="inlineRadio1" name="image_id" value="{{ $practice->image->id }}" checked> 
                            <input type="hidden" name="" value="{{ $image->image_url }}" id="img">
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        @else
                        <div class="form-check form-check-radio form-check-inline">
                          <label class="form-check-label"><img src="{{ asset($image->image_url) }}" alt="" style="height: 100px; height: 100px;" >
                            <input class="form-check-input" type="radio" id="inlineRadio1" name="image_id" value="{{ $image->id }}"> 
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        @endif
                        @endforeach
                      </div>
                    </div>
                </div>
          </div>
          <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-rose">{{ __('UPDATE PRACTICE') }}</button>
          </div>
        </div>
        </form>
                        <span onclick="replaceImage()">Click me</span>

      </div>
    </div>
  </div>
</div>  
<script>
    function hidebutton() {
        var x = document.getElementById("image-label");
        var y = document.getElementById("remove");

        x.style.display = "none";
        y.style.display = "block";
    }

    function removeImage() {
        var x = document.getElementById("image-label");
        var y = document.getElementById("remove");
        var m = document.getElementById("image1");
        var n = document.getElementById("image2");

        x.style.display = "inline-block";
        y.style.display = "none";
        m.style.display = "none";
        n.style.display = "inline-block";
    }

    function replaceImage(){

      var profile_image = document.getElementById('img').value;

      var image_target = document.getElementById('target');

      image_target.setAttribute("src", 'profile_image');

      alert(image_target);


      // alert(profile_image);
    }


    function showImage(src, target) {
        var fr = new FileReader();
        // when image is loaded, set the src of the image where you want to display it
        fr.onload = function(e) {
            target.src = this.result;
        };
        src.addEventListener("change", function() {
            // fill fr with image data    
            fr.readAsDataURL(src.files[0]);
        });
    }

    var src = document.getElementById("src");
    var target = document.getElementById("target");
    showImage(src, target);


    // replace the image in the placeholder
    var src1 = document.getElementById("src1");
    showImage(src1, target);


    $("#uploadDiv").click(function() {
        $("#imageDiv").css("display", "none");
    });
    $("#imageDiv").click(function() {
        $("#uploadDiv").css("display", "none");
    });
</script>
<script>
  $("#uploadDiv").click(function() {
  $("#imageDiv").css("display", "none");
  });
  $("#imageDiv").click(function() {
  $("#uploadDiv").css("display", "none");
  });

  $("#select").click(function() {
  $("#imgchange").css("display", "none");
  });
</script>         
@endsection