@extends('layouts.app', ['activePage' => 'checkpoints', 'titlePage' => __('Checkpoints')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">timeline</i>
                  </div>
                  <h4 class="card-title">Checkpoint</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('checkpoints.index') }}" class="btn btn-sm btn-rose">Back to list</a>
                    </div>
                  </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('ID') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $checkpoints->id }} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('User') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $checkpoints->user->user_lastname }}, {{ $checkpoints->user->user_firstname }} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Checkpoint') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $checkpoints->checkpoint_name }} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Privately Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $checkpoints->privately_insured_cuecard_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose" >{{ __('Privately Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $checkpoints->privately_insured_patient_short_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Privately Insured Patient Long Description') }}</label>
                  <div class="col-sm-8">
                   <div class="form-group">
                      {!! $checkpoints->privately_insured_patient_long_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Privately Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $checkpoints->privately_insured_doctor_long_description !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Legally Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $checkpoints->legaly_insured_cuecard_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Legally Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $checkpoints->legaly_insured_patient_short_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Legally Insured Patient Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $checkpoints->legaly_insured_patient_long_description !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Legally Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $checkpoints->legaly_insured_doctor_long_description !!} 
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