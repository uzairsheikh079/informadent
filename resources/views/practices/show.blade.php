@extends('layouts.app', ['activePage' => 'practices', 'titlePage' => __('Practices')])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
    <div class="card ">
              <div class="card-header card-header-rose card-header-icon">
            <div class="card-icon">
            <i class="material-icons">foundation</i>
            </div>
            <h4 class="card-title">Practice</h4>
          </div>
              <div class="card-body ">
                <div class="row">
              <div class="col-md-12 text-right">
                  <a href="{{ route('practices.index') }}" class="btn btn-sm btn-rose">Back to list</a>
              </div>
            </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-4 col-form-label text-rose">Practice Logo</label>
                  <div class="col-sm-8">
                    <!-- Button trigger modal -->
                    <a data-toggle="modal" data-target="#exampleModal">
                        <img src="{{ $practice->image_id ? asset($practice->image->image_url) : '' }}" alt="" style="width: 200px; border-radius: 8px;">
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Logo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center">
                            <img src="{{ $practice->image_id ? asset($practice->image->image_url) : '' }}" alt="" style="border-radius: 8px; width: 300px;">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('ID') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        {{ $practice->id }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Practice Name') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        {{ $practice->practice_name }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Practice Email') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        {{ $practice->practice_email }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Practice Address') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        {{ $practice->street_no }}, {{ $practice->house_no }}, {{ $practice->post_code }} {{ $practice->city }}, {{ $practice->country }}.
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Practice Telephone') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      {{ $practice->practice_telephone }} 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Clinic') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        {{ $practice->clinic_id ? $practice->clinic->clinic_name : '' }}
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