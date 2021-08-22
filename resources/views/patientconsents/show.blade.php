@extends('layouts.app', ['activePage' => 'patientconsents', 'titlePage' => __('Patient Consents')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header card-header-icon card-header-success">
            <div class="card-icon">
              <i class="material-icons">policy</i>
            </div>
            <h4 class="card-title">Patient Consent</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 text-right">
                  <a href="{{ route('patientconsents.index') }}" class="btn btn-sm btn-success">Back to list</a>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('ID') }}</label>
              <div class="col-sm-8">
                <div class="form-group">
                  {{ $patientconsent->id }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('Patient Consent') }}</label>
              <div class="col-sm-8">
                <div class="form-group">
                  {{ $patientconsent->consent_name }}
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