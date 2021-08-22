@extends('layouts.app', ['activePage' => 'treatmentmodules', 'titlePage' => __('Treatment Modules')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">view_module</i>
                  </div>
                  <h4 class="card-title">Treatment Module</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('treatmentmodules.index') }}" class="btn btn-sm btn-primary">Back to list</a>
                    </div>
                  </div>
                  <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('ID') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $treatmentmodule->id }}

                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('User') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                       {{ $treatmentmodule->user->user_lastname }}, {{ $treatmentmodule->user->user_firstname }}
                    </div>
                  </div>
                </div>
                  <div class="row">
                    <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Treatment Module') }}</label>
                    <div class="col-sm-8">
                      <div class="form-group">
                        {{ $treatmentmodule->treatmentmodule_name }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="text-right">
        <a type="button" rel="tooltip" title="Back" href="{{ route('treatmentmodules.index') }}" class="btn btn-info glyphicon glyphicon glyphicon-eye-open">
            <i class="material-icons">arrow_back_ios</i>
        </a>
    </div>
    <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Show Treatment Module') }}</h4>
                <p class="card-category">{{ __('Detailed Information') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('ID') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      {{ $treatmentmodule->id }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('User') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      {{ $treatmentmodule->user->email }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Treatment Module') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      {{ $treatmentmodule->treatmentmodule_name }}
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