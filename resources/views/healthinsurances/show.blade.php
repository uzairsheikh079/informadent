@extends('layouts.app', ['activePage' => 'healthinsurances', 'titlePage' => __('Health Insurance')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header card-header-icon card-header-danger">
            <div class="card-icon">
              <i class="material-icons">health_and_safety</i>
            </div>
            <h4 class="card-title">Health Insurance</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 text-right">
                  <a href="{{ route('healthinsurances.index') }}" class="btn btn-sm btn-danger">Back to list</a>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('ID') }}</label>
              <div class="col-sm-8">
                <div class="form-group">
                  {{ $healthinsurance->id }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Health Insurance') }}</label>
              <div class="col-sm-8">
                <div class="form-group">
                  {{ $healthinsurance->healthinsurance_name }}
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