@extends('layouts.app', ['activePage' => 'treatmentcategories', 'titlePage' => __('Treatment Categories')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <form method="POST" action="{{ route('treatmentcategories.update', $treatmentcategory->id ) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="card ">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">category</i>
                  </div>
                  <h4 class="card-title">Edit Treatment Category</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('treatmentcategories.index') }}" class="btn btn-sm btn-success">Back to list</a>
                    </div>
                  </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('ID') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="id" type="text" value="{{ $treatmentcategory->id }}" disabled> 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('Treatment Category') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="treatmentcategory_name" type="text" value="{{ $treatmentcategory->treatmentcategory_name }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
              <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('Treatment Module') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group{{ $errors->has('treatmentmodule_id') ? ' has-success' : '' }}">
                       <select class="custom-select custom-select-md" name="treatmentmodule_id" id="">
                            <option value="{{ $treatmentcategory->treatmentmodule_id }}"> {{$treatmentcategory->treatmentmodule->treatmentmodule_name}}</option>
                        @foreach ($treatmentmodules as $treatmentmodule)
                            <option value="{{ $treatmentmodule->id }}">{{ $treatmentmodule->treatmentmodule_name }}</option>
                        @endforeach
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-success">{{ __('Privately Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_cuecard_description">{{ $treatmentcategory->privately_insured_cuecard_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-success">{{ __('Privately Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_patient_short_description">{{ $treatmentcategory->privately_insured_patient_short_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-success">{{ __('Privately Insured Patient long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_patient_long_description">{{ $treatmentcategory->privately_insured_patient_long_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-success">{{ __('Privately Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="privately_insured_doctor_long_description">{{ $treatmentcategory->privately_insured_doctor_long_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-success">{{ __('Legally Insured Cuecard Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_cuecard_description" >{{ $treatmentcategory->legaly_insured_cuecard_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-success">{{ __('Legally Insured Patient Short Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_patient_short_description" >{{ $treatmentcategory->legaly_insured_patient_short_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-success">{{ __('Legally Insured Patient long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_patient_long_description">{{ $treatmentcategory->legaly_insured_patient_long_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label  style="font-weight:bold"  class="col-sm-2 col-form-label text-success">{{ __('Legally Insured Doctor Long Description') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <textarea class="summernote" cols="30" rows="5" name="legaly_insured_doctor_long_description">{{ $treatmentcategory->legaly_insured_doctor_long_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('Images') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                    @foreach ($images as $image)
                        @if ($arrayOftreatmentcategoryimage)
                          @if (in_array($image->id, $arrayOftreatmentcategoryimage))
                            <div class="form-check form-check-radio form-check-inline">
                              <label class="form-check-label">
                                <a href="{{ asset($image->image_url) }}">
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
                                <label class="form-check-label">
                                  <a href="{{ asset($image->image_url) }}">
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
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-success">{{ __('Videos') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                    @foreach ($videos as $video)
                        @if ($arrayOftreatmentcategoryvideo)
                            @if (in_array($video->id, $arrayOftreatmentcategoryvideo))
                                <div class="form-check form-check-radio form-check-inline">
                                  <label class="form-check-label"><a href="{{ asset($video->video_url)}}">
                              <video rel="tooltip" title="{{ $video->video_title }}" style="border-radius: 8px;" width="100" controls>
                                  <source src="{{ asset($video->video_url)}}" style="border-radius: 8px;" type="video/mp4">
                                  Your browser does not support the video tag.
                              </video>
                          </a>
                                    <input class="form-check-input" type="checkbox" id="video_id" name="video_id[]" value="{{ $video->id }}" checked> 
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                            @endif
                          @endif
                    @endforeach 
                    @foreach ($videos as $video)        
                                <div class="form-check form-check-radio form-check-inline">
                                  <label class="form-check-label"><a href="{{ asset($video->video_url)}}">
                              <video rel="tooltip" title="{{ $video->video_title }}" style="border-radius: 8px;" width="100" controls>
                                  <source src="{{ asset($video->video_url)}}" style="border-radius: 8px;" type="video/mp4">
                                  Your browser does not support the video tag.
                              </video>
                          </a>
                                    <input class="form-check-input" type="checkbox" id="video_id" name="video_id[]" value="{{ $video->id }}"> 
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
                <button type="submit" class="btn btn-success">{{ __('UPDATE TREATMENT CATEGORY') }}</button>
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