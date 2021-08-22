@extends('layouts.app', ['activePage' => 'treatmenttypes', 'titlePage' => __('Treatment Types')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <form method="POST" action="{{ route('treatmenttypes.store') }}" autocomplete="off" class="form-horizontal">
              @csrf
              <div class="card ">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">format_list_bulleted</i>
                  </div>
                  <h4 class="card-title">Add Treatment Type</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('treatmenttypes.index') }}" class="btn btn-sm btn-warning">Back to list</a>
                    </div>
                  </div>
                  <div class="row">
                    <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">{{ __('Treatment Type') }}</label>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <input class="form-control" name="treatmenttype_name" type="text" placeholder="{{ __('treatment type...') }}" required="true" aria-required="true"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                  <button type="submit" class="btn btn-warning">{{ __('ADD TREATMENT TYPE') }}</button>
                </div>
              </div>
              </form>
            </div>
        </div>
    </div>
</div>   
@endsection