@extends('layouts.app', ['activePage' => 'treatmenttypes', 'titlePage' => __('Treatment Types')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <form method="POST" action="{{ route('treatmenttypes.update',$treatmenttype->id) }}" autocomplete="off" class="form-horizontal">
              @csrf
              @method('PUT')
              <div class="card ">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">format_list_bulleted</i>
                  </div>
                  <h4 class="card-title">Edit Treatment Type</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('treatmenttypes.index') }}" class="btn btn-sm btn-warning">Back to list</a>
                    </div>
                  </div>
                  <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('ID') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="id" type="text" value="{{ $treatmenttype->id }}" disabled>
                    </div>
                  </div>
                </div>
                  <div class="row">
                    <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('Treatment Type') }}</label>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <input class="form-control" name="treatmenttype_name" type="text" value="{{ $treatmenttype->treatmenttype_name  }}" required="true" aria-required="true"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                  <button type="submit" class="btn btn-warning">{{ __('UPDATE TREATMENT TYPE') }}</button>
                </div>
              </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection