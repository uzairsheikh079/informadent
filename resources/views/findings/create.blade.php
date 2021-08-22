@extends('layouts.app', ['activePage' => 'findings', 'titlePage' => __('Findings')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <form method="POST" action="{{ route('findings.store') }}" autocomplete="off" class="form-horizontal">
              @csrf
              <div class="card ">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">saved_search</i>
                  </div>
                  <h4 class="card-title">Add Finding</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('findings.index') }}" class="btn btn-sm btn-danger">Back to list</a>
                    </div>
                  </div>
                  <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Finding') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="finding_name" type="text" placeholder="{{ __('finding...') }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Diagnose') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        <select name="diagnose_id" id="" class="custom-select custom-select-md" required="true" aria-required="true">
                            <option>Select Diagnose</option>
                        @foreach ($diagnosis as $diagnose)
                            <option value="{{ $diagnose->id }}">{{ $diagnose->diagnose_name }}</option>
                        @endforeach
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Privately Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_cuecard_description" ></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Privately Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_patient_short_description" ></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Privately Insured Patient Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_patient_long_description"> </textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Privately Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_doctor_long_description"> </textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Legally Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_cuecard_description" > </textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Legally Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_patient_short_description"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Legally Insured Patient Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_patient_long_description"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Legally Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_doctor_long_description"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Documents') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        <select name="document_id[]" class="custom-select custom-select-md" required="true" aria-required="true" multiple>
                            <option selected disabled>Select Documents</option>
                            @foreach ($documents as $document)
                                <option value="{{ $document->id }}">{{ $document->document_name }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Step') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="step" id="input-name" type="text" placeholder="{{ __('step...') }}" value="" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Images') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      @foreach ($images as $image)
                      <div class="form-check form-check-radio form-check-inline">
                        <label>
                          <a href="{{ asset($image->image_url) }}">
                          <img rel="tooltip" title="{{ $image->image_title }}" src="{{ asset($image->image_url) }}" alt="" style="border-radius: 8px; width: 100px;">
                          </a>
                          <input class="form-check-input" type="checkbox" id="image_id" name="image_id[]" value="{{ $image->id }}"> 
                          <span class="form-check-sign">
                              <span class="check"></span>
                          </span>
                        </label>
                       
                      </div>
                       <label style="width: 100px;">{{ $image->image_title }}</label>
                      @endforeach
                    </div>
                    </div>
                </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                  <button type="submit" class="btn btn-danger">{{ __('ADD FINDING') }}</button>
                </div>
              </div>
              </form>
            </div>
        </div>
    </div>
</div>              
<script>
  $('.summernote').summernote({
    tabsize: 2,
    height: 120,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph', ]],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
</script>
@endsection