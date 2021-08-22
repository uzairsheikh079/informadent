@extends('layouts.app', ['activePage' => 'peoplepresentat', 'titlePage' => __('People Present At')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header card-header-icon card-header-warning">
            <div class="card-icon">
              <i class="material-icons">emoji_people</i>
            </div>
            <h4 class="card-title">People</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 text-right">
                  <a href="{{ route('peoplepresentat.index') }}" class="btn btn-sm btn-warning">Back to list</a>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('ID') }}</label>
              <div class="col-sm-8">
                <div class="form-group">
                  {{ $peoplepresentat->id }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('People') }}</label>
              <div class="col-sm-8">
                <div class="form-group">
                  {{ $peoplepresentat->ppa_name }}
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