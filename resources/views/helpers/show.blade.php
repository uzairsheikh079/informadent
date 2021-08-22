@extends('layouts.app', ['activePage' => 'helpers', 'titlePage' => __('Helpers')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card ">
               <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                <i class="material-icons">wheelchair_pickup</i>
                </div>
                <h4 class="card-title">Helper</h4>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('helpers.index') }}" class="btn btn-sm btn-primary">Back to list</a>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('ID') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                    {{ $helper->id }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Helper Name') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                    {{ $helper->helper_name }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Practice') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                    {{ $helper->practice_id ? $helper->practice->practice_name : '' }}
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