@extends('layouts.app', ['activePage' => 'practices', 'titlePage' => __('Practices')])

@section('content')

<head>
    <link href="https://material-dashboard-pro-laravel.creative-tim.com/css/material-dashboard.css" rel="stylesheet">
</head>

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
                  <<div class="col-sm-8 text-center">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-new thumbnail img-square">
                        <img src="{{ $practice->image_id ? asset($practice->image->image_url) : '' }}" alt="...">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail img-square"></div>
                      <div>
                        <span class="btn btn-rose btn-file">
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
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Practice Adress') }}</label>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <input class="form-control" name="street_no"  type="text" value="{{ $practice->street_no }}" required="true" aria-required="true"/>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <input class="form-control" name="house_no"  type="text" value="{{ $practice->house_no }}" required="true" aria-required="true"/>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose" ></label>
                  <div class="col-sm-3">
                      <div class="form-group">
                        <input class="form-control" name="post_code"  type="text" value="{{ $practice->post_code }}" required="true" aria-required="true"/>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input class="form-control" name="city"  type="text" value="{{ $practice->city }}" required="true" aria-required="true"/>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <input class="form-control" name="country"  type="text" value="{{ $practice->country }}" required="true" aria-required="true"/>
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
                <!-- <div class="row" id="imageDiv">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Select Practice Logo') }}</label>
                    <div class="col-sm-8">
                      <div class="form-group{{ $errors->has('image_id') ? ' has-danger' : '' }}">
                        @foreach ($images as $image)
                        @if ($practice->image_id == $image->id)
                        <div class="form-check form-check-radio form-check-inline">
                          <label class="form-check-label"><img src="{{ $practice->image_id ? asset($practice->image->image_url) : '' }}" alt="" style="height: 100px; height: 100px;" >
                            <input class="form-check-input" type="radio" id="inlineRadio1" name="image_id" value="{{ $practice->image->id }}" checked> 
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
                </div> -->
          </div>
          <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-rose">{{ __('UPDATE PRACTICE') }}</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>  
<!-- <script>
  $("#uploadDiv").click(function() {
  $("#imageDiv").css("display", "none");
  });
  $("#imageDiv").click(function() {
  $("#uploadDiv").css("display", "none");
  });

  $("#select").click(function() {
  $("#imgchange").css("display", "none");
  });
</script>   -->       
@endsection