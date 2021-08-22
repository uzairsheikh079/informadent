@extends('layouts.app', ['activePage' => 'videos', 'titlePage' => __('Videos')])

@section('content')
<head>
    <link href="https://material-dashboard-pro-laravel.creative-tim.com/css/material-dashboard.css" rel="stylesheet">
</head>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <form method="POST" action="{{ route('videos.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
              @csrf
              <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">videocam</i>
                  </div>
                  <h4 class="card-title">Add Video</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('videos.index') }}" class="btn btn-sm btn-primary">Back to list</a>
                    </div>
                  </div>
                  <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">Video</label>
                  <div class="col-sm-8 text-center">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-new thumbnail img-square">
                        <video poster="{{ asset('material') }}/img/video-placeholder.jpg" id="target" style="border-radius: 8%;" width="200">
                            <source src="" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail img-square"></div>
                      <div>
                        <span class="btn btn-primary btn-file">
                          <span class="fileinput-new">Select image</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" name="video_url" id="input-picture">
                        </span>
                          <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Video Name') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="video_name" type="text" placeholder="{{ __('video name...') }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Video Title') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="video_title" type="text" placeholder="{{ __('video title...') }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Video Category') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="video_category" id="input-video_category" type="text" placeholder="{{ __('video category...') }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Privately Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_cuecard_description" ></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Privately Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_patient_short_description" ></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Privately Insured Patient Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_patient_long_description"> </textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Privately Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_doctor_long_description"> </textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Legally Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_cuecard_description" > </textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Legally Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_patient_short_description"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Legally Insured Patient Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_patient_long_description"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Legally Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_doctor_long_description"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('ADD VIDEO') }}</button>
              </div>
        </div>
        </form>
            </div>
        </div>
    </div>
</div>
<script>
  $('.summernote').summernote({
    tabsize: 2,
    height: 120,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph', ]],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
</script>   
@endsection