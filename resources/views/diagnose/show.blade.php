@extends('layouts.app', ['activePage' => 'diagnose', 'titlePage' => __('Diagnosis')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
    <div class="card ">
              <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                <i class="material-icons">person_search</i>
                </div>
                <h4 class="card-title">Diagnose</h4>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('diagnose.index') }}" class="btn btn-sm btn-rose">Back to list</a>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('ID') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                    {{ $diagnosis->id }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('User') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                    {{ $diagnosis->user->user_firstname }} {{ $diagnosis->user->user_lastname }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Diagnose') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $diagnosis->diagnose_name }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Parent ID') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        {{ $diagnosis->parent_id }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Degree') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $diagnosis->degree }}
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