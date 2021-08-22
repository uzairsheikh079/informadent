@extends('layouts.app', ['activePage' => 'treatmentmodules', 'titlePage' => __('Treatment Module')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <form method="POST" action="{{ route('treatmentmodules.update',$treatmentmodule->id) }}" autocomplete="off" class="form-horizontal">
              @csrf
              @method('PUT')
              <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">view_module</i>
                  </div>
                  <h4 class="card-title">Edit Treatment Module</h4>
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
                      <input class="form-control" name="id" type="text" value="{{ $treatmentmodule->id  }}" disabled>
                    </div>
                  </div>
                </div>
                  <div class="row">
                    <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Treatment Module') }}</label>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <input class="form-control" name="treatmentmodule_name" type="text" value="{{ $treatmentmodule->treatmentmodule_name  }}" required="true" aria-required="true"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary">{{ __('UPDATE TREATMENT MODULE') }}</button>
                </div>
              </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection