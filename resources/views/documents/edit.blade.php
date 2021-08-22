@extends('layouts.app', ['activePage' => 'documents', 'titlePage' => __('Documents')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('documents.update', $document->id) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')
        <div class="card ">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
            <i class="material-icons">description</i>
            </div>
            <h4 class="card-title">Edit Document</h4>
          </div>
          <div class="card-body ">
            <div class="row">
              <div class="col-md-12 text-right">
                  <a href="{{ route('documents.index') }}" class="btn btn-sm btn-danger">Back to list</a>
              </div>
            </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('ID') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        <input class="form-control" name="id" type="text" value="{{ $document->id }}" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Document Name') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="document_name" type="text" value="{{ $document->document_name }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Document Title') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="document_title" type="text" value="{{ $document->document_title }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Document Category') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="document_category" type="text" value="{{ $document->document_category }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Checkpoints') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        <select name="checkpoint_id[]" class="custom-select custom-select-md" id="" multiple>
                            @foreach ($checkpoints as $checkpoint)
                            @if ($arrayOfdocumentcheckpoint)
                            @if (in_array($checkpoint->id, $arrayOfdocumentcheckpoint))
                            <option value="{{ $checkpoint->id }}" selected>{{ $checkpoint->checkpoint_name }}</option>
                            @endif
                            @endif
                            @endforeach
                            @foreach ($checkpoints as $checkpoint)
                            <option value="{{ $checkpoint->id }}">{{ $checkpoint->checkpoint_name }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Image') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                          <a href="{{ $document->image_id ? asset($document->image->image_url) : '' }}"><img style="border-radius: 8px; width: 100px;" src="{{ $document->image_id ? asset($document->image->image_url) : '' }}" alt="..."></a>
                          <input class="form-check-input" type="radio" id="image_id" name="image_id" value="{{ $document->image_id ? $document->image->id : ''}}" checked> 
                          <span class="circle">
                              <span class="check"></span>
                          </span>
                        </label>
                      </div>
                        @foreach ($images as $image)
                        <div class="form-check form-check-radio form-check-inline">
                        <label class="form-check-label">
                          <a href="{{ $image->id ? asset($image->image_url) : '' }}"><img style="border-radius: 8px; width: 100px;" src="{{ $image->id ? asset($image->image_url) : '' }}" alt="..."></a>
                          <input class="form-check-input" type="radio" id="image_id" name="image_id" value="{{ $image->id }}"> 
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
                <button type="submit" class="btn btn-danger">{{ __('UPDATE DOCUMENT') }}</button>
              </div>
        </div>
        </form>
            </div>
        </div>
    </div>
</div>     
@endsection