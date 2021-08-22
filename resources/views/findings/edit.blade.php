@extends('layouts.app', ['activePage' => 'findings', 'titlePage' => __('Findings')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <form method="POST" action="{{ route('findings.update',$finding->id) }}" autocomplete="off" class="form-horizontal">
              @csrf
              @method('PUT')
              <div class="card ">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">saved_search</i>
                  </div>
                  <h4 class="card-title">Edit Finding</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('findings.index') }}" class="btn btn-sm btn-danger">Back to list</a>
                    </div>
                  </div>
                  <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('ID') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        <input class="form-control" name="id" type="text" value="{{ $finding->id }}" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-danger">{{ __('Finding') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="finding_name" type="text" value="{{ $finding->finding_name }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-danger">{{ __('Diagnose') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                       <select name="diagnose_id" class="form-control" required="true" aria-required="true">
                            <option value="{{ $finding->diagnose_id }}">{{ $finding->diagnose->diagnose_name }}</option>
                        @foreach ($diagnosis as $diagnose)
                            <option value="{{ $diagnose->id }}">{{ $diagnose->diagnose_name }}</option>
                        @endforeach
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-danger">{{ __('Privately Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_cuecard_description">{{ $finding->privately_insured_cuecard_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-danger">{{ __('Privately Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_patient_short_description">{{ $finding->privately_insured_patient_short_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-danger">{{ __('Privately Insured Patient long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_patient_long_description">{{ $finding->privately_insured_patient_long_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-danger">{{ __('Privately Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_doctor_long_description">{{ $finding->privately_insured_doctor_long_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-danger">{{ __('Legally Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_cuecard_description" >{{ $finding->legaly_insured_cuecard_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-danger">{{ __('Legally Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_patient_short_description" >{{ $finding->legaly_insured_patient_short_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-danger">{{ __('Legally Insured Patient long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_patient_long_description">{{ $finding->legaly_insured_patient_long_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-danger">{{ __('Legally Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_doctor_long_description">{{ $finding->legaly_insured_doctor_long_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Documents') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        <select name="document_id[]" class="custom-select custom-select-md" required="true" aria-required="true" multiple>
                           @foreach ($documents as $document)
                            @if ($arrayOffindingdocument)
                            @if (in_array($document->id, $arrayOffindingdocument))
                            <option value="{{ $document->id }}" selected>{{ $document->document_name }}</option>
                            @endif
                            @endif
                            @endforeach
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
                      <input class="form-control" name="step" type="text" value="{{ $finding->step }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Images') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      @foreach ($images as $image)
                        @if ($arrayOffindingimage)
                            @if (in_array($image->id, $arrayOffindingimage))
                              <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label"><a href="{{ asset($image->image_url) }}">
                                <img rel="tooltip" title="{{ $image->image_title }}" src="{{ asset($image->image_url) }}" alt="" style="border-radius: 8px; width: 100px;">
                            </a>
                                  <input class="form-check-input" type="checkbox" id="image_id" name="image_id[]" value="{{ $image->id }}" checked> 
                                  <span class="form-check-sign">
                                      <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                              @endif
                              @endif
                            @endforeach
                            @foreach ($images as $image)
                              <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label"><a href="{{ asset($image->image_url) }}">
                                <img rel="tooltip" title="{{ $image->image_title }}" src="{{ asset($image->image_url) }}" alt="" style="border-radius: 8px; width: 100px;">
                            </a>
                                  <input class="form-check-input" type="checkbox" id="image_id" name="image_id[]" value="{{ $image->id }}"> 
                                  <span class="form-check-sign">
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
                  <button type="submit" class="btn btn-danger">{{ __('UPDATE FINDING') }}</button>
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

  {{-- <script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
  </script> --}}     
@endsection