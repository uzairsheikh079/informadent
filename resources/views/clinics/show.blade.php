@extends('layouts.app', ['activePage' => 'clinics', 'titlePage' => __('Clinics')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header card-header-icon card-header-success">
            <div class="card-icon">
              <i class="material-icons">local_hospital</i>
            </div>
            <h4 class="card-title">Clinic</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 text-right">
                  <a href="{{ route('clinics.index') }}" class="btn btn-sm btn-success">Back to list</a>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('ID') }}</label>
              <div class="col-sm-8">
                <div class="form-group">
                  {{ $clinic->id }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('Clinic') }}</label>
              <div class="col-sm-8">
                <div class="form-group">
                  {{ $clinic->clinic_name }}
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