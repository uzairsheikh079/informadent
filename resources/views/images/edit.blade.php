@extends('layouts.app', ['activePage' => 'images', 'titlePage' => __('Images')])

@section('content')

<head>
    <link href="https://material-dashboard-pro-laravel.creative-tim.com/css/material-dashboard.css" rel="stylesheet">
</head>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <form method="POST" action="{{ route('images.update', $image->id) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="card ">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">image</i>
                  </div>
                  <h4 class="card-title">Edit Image</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('images.index') }}" class="btn btn-sm btn-warning">Back to list</a>
                    </div>
                  </div>
                  <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning ">Image</label>
                  <div class="col-sm-8 text-center">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-new thumbnail img-square">
                        <img src="{{ asset($image->image_url) }}" alt="...">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail img-square"></div>
                      <div>
                        <span class="btn btn-warning btn-file">
                          <span class="fileinput-new">Select image</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" name="image_url" id="input-picture">
                        </span>
                          <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                      </div>
                    </div>
                  </div>
              </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('ID') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        <input class="form-control" name="id" type="text" value="{{ $image->id }}" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('Image Name') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="image_name" type="text" value="{{ $image->image_name }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('Image Title') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="image_title" type="text" value="{{ $image->image_title }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('Image Category') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="image_category" type="text" value="{{ $image->image_category }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-warning">{{ __('Privately Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_cuecard_description">{{ $image->privately_insured_cuecard_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-warning">{{ __('Privately Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_patient_short_description">{{ $image->privately_insured_patient_short_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-warning">{{ __('Privately Insured Patient long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_patient_long_description">{{ $image->privately_insured_patient_long_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-warning">{{ __('Privately Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_doctor_long_description">{{ $image->privately_insured_doctor_long_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-warning">{{ __('Legally Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_cuecard_description" >{{ $image->legaly_insured_cuecard_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-warning">{{ __('Legally Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_patient_short_description" >{{ $image->legaly_insured_patient_short_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-warning">{{ __('Legally Insured Patient long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_patient_long_description">{{ $image->legaly_insured_patient_long_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-warning">{{ __('Legally Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_doctor_long_description">{{ $image->legaly_insured_doctor_long_description }}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-warning">{{ __('UPDATE IMAGE') }}</button>
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
            ['insert', ['link', 'picture', 'image']],
            ['view', ['fullscreen', 'codeview', 'help']]
          ]
        });
      </script>    
@endsection