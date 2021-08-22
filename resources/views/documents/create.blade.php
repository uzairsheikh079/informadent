@extends('layouts.app', ['activePage' => 'documents', 'titlePage' => __('Documents')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('documents.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="card ">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
            <i class="material-icons">description</i>
            </div>
            <h4 class="card-title">Add Document</h4>
          </div>
          <div class="card-body ">
            <div class="row">
              <div class="col-md-12 text-right">
                  <a href="{{ route('documents.index') }}" class="btn btn-sm btn-danger">Back to list</a>
              </div>
            </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Document Name') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="document_name" type="text" placeholder="{{ __('document name...') }}" value="" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Document Title') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="document_title" type="text" placeholder="{{ __('document title...') }}" value="" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Document Category') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="document_category" type="text" placeholder="{{ __('document category...') }}" value="" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Checkpoints') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        <select name="checkpoint_id[]" class="custom-select custom-select-md" id="" multiple>
                            <option style="font-weight: bold;" selected disabled>--Select Checkpoints--</option>
                          @foreach ($checkpoints as $checkpoint)
                            <option value="{{ $checkpoint->id }}">{{ $checkpoint->checkpoint_name }}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Document Image') }}</label>
                    <div class="col-sm-8">
                    <div class="form-group">
                        @foreach ($image as $images)
                        <div class="form-check form-check-radio form-check-inline">
                          <label class="form-check-label">
                          <a href="{{ asset($images->image_url) }}"><img style="border-radius: 8px; width: 100px;" src="{{ asset($images->image_url) }}" alt="..."></a>
                          <input class="form-check-input" type="radio" id="image_id" name="image_id" value="{{ $images->id }}" required> 
                          <span class="circle">
                              <span class="check"></span>
                          </span>
                        </label>
                      </div>
                        @endforeach
                    </div>
                    </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-danger">{{ __('ADD DOCUMENT') }}</button>
              </div>
        </div>
        </form>
            </div>
        </div>
    </div>
</div>
@endsection