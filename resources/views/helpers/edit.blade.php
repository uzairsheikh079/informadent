@extends('layouts.app', ['activePage' => 'helpers', 'titlePage' => __('Helpers')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <form method="POST" action="{{ route('helpers.update',$helper->id) }}" autocomplete="off" classRoles="form-horizontal">
                      @csrf
                      @method('PUT')
              <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">wheelchair_pickup</i>
                  </div>
                  <h4 class="card-title">Edit Helper</h4>
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
                      <input class="form-control" name="helper_name" type="text" value="{{ $helper->helper_name }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-primary">{{ __('Practice') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <select class="custom-select custom-select-md" name="practice_id">
                          <option value="{{ $helper->practice_id }}">{{ $helper->practice->practice_name }}</option>
                          @foreach ($practices as $practice)
                          <option value="{{ $practice->id }}">{{ $practice->practice_name }}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary">{{ __('UPDATE HELPER') }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
</div> 
@endsection