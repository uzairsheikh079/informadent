@extends('layouts.app', ['activePage' => 'patientconsents', 'titlePage' => __('Patient Consents')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('patientconsents.store') }}" autocomplete="off" class="form-horizontal">
        @csrf
        <div class="card ">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
            <i class="material-icons">policy</i>
            </div>
            <h4 class="card-title">Add Patient Consent</h4>
          </div>
          <div class="card-body ">
            <div class="row">
              <div class="col-md-12 text-right">
                  <a href="{{ route('patientconsents.index') }}" class="btn btn-sm btn-success">Back to list</a>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('Patient Consent') }}</label>
              <div class="col-sm-8">
                <div class="form-group">
                  <input class="form-control" name="consent_name" type="text" placeholder="{{ __('patient consent...') }}" value="" required="true" aria-required="true"/>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-success">{{ __('ADD PATIENT CONSENT') }}</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div> 
@endsection