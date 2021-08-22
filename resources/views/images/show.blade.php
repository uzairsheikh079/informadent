@extends('layouts.app', ['activePage' => 'images', 'titlePage' => __('Images')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">image</i>
                  </div>
                  <h4 class="card-title">Image</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('images.index') }}" class="btn btn-sm btn-warning">Back to list</a>
                    </div>
                  </div>
                <div class="row">
                <label style="font-weight:bold" class="col-sm-4 col-form-label text-warning">Image</label>
                <div class="col-sm-8">
                  <a href="{{ $image->image_url }}"><img style="border-radius: 8px; width: 200px;" src="{{ $image->image_url }}" alt="..."></a>
                </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('ID') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $image->id }} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('User') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $image->user->email }} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('Image Name') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $image->image_name }} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('Image Title') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $image->image_title }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('Image Category') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                       {{ $image->image_category }} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('Privately Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $image->privately_insured_cuecard_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning" >{{ __('Privately Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $image->privately_insured_patient_short_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('Privately Insured Patient Long Description') }}</label>
                  <div class="col-sm-8">
                   <div class="form-group">
                      {!! $image->privately_insured_patient_long_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('Privately Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $image->privately_insured_doctor_long_description !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('Legally Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $image->legaly_insured_cuecard_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('Legally Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $image->legaly_insured_patient_short_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('Legally Insured Patient Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $image->legaly_insured_patient_long_description !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('Legally Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $image->legaly_insured_doctor_long_description !!} 
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