@extends('layouts.app', ['activePage' => 'treatmentcategories', 'titlePage' => __('Treatment Categories')])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">category</i>
                  </div>
                  <h4 class="card-title">Treatment Category</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('treatmentcategories.index') }}" class="btn btn-sm btn-success">Back to list</a>
                    </div>
                  </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('ID') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $treatmentcategory->id }} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('User') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $treatmentcategory->user->user_lastname }}, {{ $treatmentcategory->user->user_firstname }} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('Treatment Category') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $treatmentcategory->treatmentcategory_name }} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('Treatment Module') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $treatmentcategory->treatmentmodule->treatmentmodule_name }} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('Privately Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $treatmentcategory->privately_insured_cuecard_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-success" >{{ __('Privately Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $treatmentcategory->privately_insured_patient_short_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('Privately Insured Patient Long Description') }}</label>
                  <div class="col-sm-8">
                   <div class="form-group">
                      {!! $treatmentcategory->privately_insured_patient_long_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('Privately Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $treatmentcategory->privately_insured_doctor_long_description !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('Legally Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $treatmentcategory->legaly_insured_cuecard_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('Legally Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $treatmentcategory->legaly_insured_patient_short_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('Legally Insured Patient Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $treatmentcategory->legaly_insured_patient_long_description !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold"class="col-sm-2 col-form-label text-success">{{ __('Legally Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $treatmentcategory->legaly_insured_doctor_long_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('Images') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      @php
                    $image = $treatmentcategory->image_id;
                    $convertToArray = json_decode($image);
                    @endphp
                    @foreach ($images as $image)
                    @if ($convertToArray)
                    @if (in_array($image->id, $convertToArray))
                   <a href="{{ asset($image->image_url) }}">
                        <img rel="tooltip" title="{{ $image->image_title }}" src="{{ asset($image->image_url) }}" alt="" style="border-radius: 8px; width: 150px;">
                    </a>
                  @endif
                  @endif
                  @endforeach 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('Videos') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                  @php
                    $video = $treatmentcategory->video_id;
                    $convertToArray = json_decode($video);
                  @endphp
                  @foreach ($videos as $video)
                    @if ($convertToArray)
                     @if (in_array($video->id, $convertToArray))
                     <a href="{{ asset($video->video_url)}}">
                        <video rel="tooltip" title="{{ $video->video_title }}" style="border-radius: 8px;" width="150" controls>
                            <source src="{{ asset($video->video_url)}}" style="border-radius: 8px;" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </a>
                     @endif
                   @endif
                  @endforeach 
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