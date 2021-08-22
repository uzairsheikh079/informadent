@extends('layouts.app', ['activePage' => 'findings', 'titlePage' => __('Findings')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">saved_search</i>
                  </div>
                  <h4 class="card-title">Finding</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('findings.index') }}" class="btn btn-sm btn-danger">Back to list</a>
                    </div>
                  </div>
                  <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Images') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group text-center">
                      @php
                        $image = $finding->image_id;
                        $convertToArray = json_decode($image);
                        @endphp
                        @foreach ($images as $image)
                        @if($convertToArray)
                        @if (in_array($image->id, $convertToArray))
                        <a href="{{ asset($image->image_url)}}">
                        <img src="{{ asset($image->image_url)}}" alt="" style="max-width: 200px; border-radius: 8px;"><br><span>{{ $image->image_title }}</span></a>  
                        @endif
                        @endif
                        @endforeach
                    </div>
                    </div>
                </div>
                  <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('ID') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $finding->id }}
                    </div>
                  </div>
                </div>
                  <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('User') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $finding->user->user_lastname }}, {{ $finding->user->user_firstname }} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Finding') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $finding->finding_name }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Diagnose') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        {{ $finding->diagnose_id ? $finding->diagnose->diagnose_name : '' }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Privately Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $finding->privately_insured_cuecard_description !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Privately Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $finding->privately_insured_patient_short_description !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Privately Insured Patient Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $finding->privately_insured_patient_long_description !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Privately Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $finding->privately_insured_doctor_long_description !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Legally Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $finding->legaly_insured_cuecard_description !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Legally Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $finding->legaly_insured_patient_short_description !!} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Legally Insured Patient Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $finding->legaly_insured_patient_long_description !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Legally Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {!! $finding->legaly_insured_doctor_long_description !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Documents') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        @php
                        $document = $finding->document_id;
                        $convertToArray = json_decode($document);
                        @endphp
                        @foreach ($documents as $document)
                        @if($convertToArray)
                        @if (in_array($document->id, $convertToArray))
                        {{ $document->document_name }}
                        @endif
                        @endif
                        @endforeach
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Step') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $finding->step }}
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


