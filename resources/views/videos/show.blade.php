@extends('layouts.app', ['activePage' => 'videos', 'titlePage' => __('Videos')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">videocam</i>
                  </div>
                  <h4 class="card-title">Video</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('videos.index') }}" class="btn btn-sm btn-primary">Back to list</a>
                    </div>
                  </div>
                  <div class="row">
                <label style="font-weight:bold" class="col-sm-4 col-form-label text-primary">Image</label>
                <div class="col-sm-8">
                 <a href="{{ $video->video_url }}">
                  <video style="border-radius: 8px;" width="200" controls>
                      <source src="{{ $video->video_url }}" style="border-radius: 8px;" type="video/mp4">
                      Your browser does not support the video tag.
                  </video>
                </a>
                </div>
                </div>
                 <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('ID') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $video->id }} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('User') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $video->user->email }} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Video Name') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $video->video_name }} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Video Title') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $video->video_title }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Video Category') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                       {{ $video->video_category }} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Privately Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $video->privately_insured_cuecard_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary" >{{ __('Privately Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $video->privately_insured_patient_short_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Privately Insured Patient long Description') }}</label>
                  <div class="col-sm-8">
                   <div class="form-group">
                      {!! $video->privately_insured_patient_long_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Privately Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $video->privately_insured_doctor_long_description !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Legally Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $video->legaly_insured_cuecard_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Legally Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $video->legaly_insured_patient_short_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Legally Insured Patient long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $video->legaly_insured_patient_long_description !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Legally Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $video->legaly_insured_doctor_long_description !!} 
                    </div>
                  </div>
                </div>
              </div>
        </div>
            </div>
        </div>
    </div>
</div>  
@endsection