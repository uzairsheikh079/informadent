@extends('layouts.app', ['activePage' => 'documents', 'titlePage' => __('Documents')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
            <i class="material-icons">description</i>
            </div>
            <h4 class="card-title">Document</h4>
          </div>
          <div class="card-body ">
            <div class="row">
              <div class="col-md-12 text-right">
                  <a href="{{ route('documents.index') }}" class="btn btn-sm btn-danger">Back to list</a>
              </div>
            </div>
            <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Document Image') }}</label>
                  <div class="col-sm-8">
                      <a href="{{ $document->image_id ? asset($document->image->image_url) : '' }}"><img style="border-radius: 8px; width: 200px;" src="{{ $document->image_id ? asset($document->image->image_url) : '' }}" alt="..."></a>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('ID') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        {{ $document->id }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('User') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        {{ $document->user->user_lastname }}, {{ $document->user->user_firstname }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Document Name') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        {{ $document->document_name }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Document Title') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        {{ $document->document_title }}
                    </div>
                  </div>
                </div><div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Document Category') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        {{ $document->document_category }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Checkpoints') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      @php
                        $checkpoint = $document->checkpoint_id;
                        $convertToArray = json_decode($checkpoint);
                        @endphp
                        @foreach ($checkpoints as $checkpoint)
                         @if ($convertToArray)
                        @if (in_array($checkpoint->id, $convertToArray))
                        {{ $checkpoint->checkpoint_name }}
                        @endif
                        @endif
                        @endforeach
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