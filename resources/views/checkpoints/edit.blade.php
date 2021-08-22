@extends('layouts.app', ['activePage' => 'checkpoints', 'titlePage' => __('Checkpoints')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <form method="POST" action="{{ route('checkpoints.update',$checkpoint->id) }}" autocomplete="off" class="form-horizontal">
              @csrf
              @method('PUT')
              <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">timeline</i>
                  </div>
                  <h4 class="card-title">Edit Checkpoint</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('checkpoints.index') }}" class="btn btn-sm btn-rose">Back to list</a>
                    </div>
                  </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('ID') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="id" type="text" value="{{ $checkpoint->id }}" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Checkpoint') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="checkpoint_name" type="text" value="{{ $checkpoint->checkpoint_name }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-rose">{{ __('Privately Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_cuecard_description">{{ $checkpoint->privately_insured_cuecard_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-rose">{{ __('Privately Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_patient_short_description">{{ $checkpoint->privately_insured_patient_short_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-rose">{{ __('Privately Insured Patient long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_patient_long_description">{{ $checkpoint->privately_insured_patient_long_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-rose">{{ __('Privately Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_doctor_long_description">{{ $checkpoint->privately_insured_doctor_long_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-rose">{{ __('Legally Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_cuecard_description" >{{ $checkpoint->legaly_insured_cuecard_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-rose">{{ __('Legally Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_patient_short_description" >{{ $checkpoint->legaly_insured_patient_short_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-rose">{{ __('Legally Insured Patient long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_patient_long_description">{{ $checkpoint->legaly_insured_patient_long_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-rose">{{ __('Legally Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_doctor_long_description">{{ $checkpoint->legaly_insured_doctor_long_description }}</textarea>
                    </div>
                  </div>
                </div>

              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-rose">{{ __('UPDATE CHECKPOINT') }}</button>
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