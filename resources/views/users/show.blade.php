@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Users')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-icon card-header-warning">
            <div class="card-icon">
              <i class="material-icons">perm_identity</i>
            </div>
            <h4 class="card-title">Profile
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 text-right">
                  <a href="{{ route('users.index') }}" class="btn btn-sm btn-warning">Back to list</a>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-4 col-form-label text-warning">Profile photo</label>
              <div class="col-sm-8">
                <a data-toggle="modal" data-target="#exampleModal">
                  <div class="avatar avatar-sm rounded-circle img-circle" style="width:100px; height:100px;overflow: hidden;">
                        <img src="{{ $user->image_id ? asset($user->image->image_url) : '' }}" alt="" style="max-width: 100px;">
                  </div>
              </a>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Picture</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-center">
                      <img src="{{ $user->image_id ? asset($user->image->image_url) : '' }}" alt="" style="max-width: 300px; border-radius: 8px;">
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
              <label style="font-weight:bold" class="col-sm-3 col-form-label text-warning">Salutation</label>
              <div class="col-sm-8">
                <div class="form-group bmd-form-group is-filled">
                  {{ $user->id }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-3 col-form-label text-warning">Salutation</label>
              <div class="col-sm-8">
                <div class="form-group bmd-form-group is-filled">
                  {{ $user->user_salutation }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-3 col-form-label text-warning">Title</label>
              <div class="col-sm-8">
                <div class="form-group bmd-form-group is-filled">
                  {{ $user->user_title }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-3 col-form-label text-warning">First Name</label>
              <div class="col-sm-8">
                <div class="form-group bmd-form-group is-filled">
                  {{ $user->user_firstname }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-3 col-form-label text-warning">Last Name</label>
              <div class="col-sm-8">
                <div class="form-group bmd-form-group is-filled">
                  {{ $user->user_lastname }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-3 col-form-label text-warning">Email</label>
              <div class="col-sm-8">
                <div class="form-group bmd-form-group is-filled">
                  {{ $user->email }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-3 col-form-label text-warning">Telephone</label>
              <div class="col-sm-8">
                <div class="form-group bmd-form-group is-filled">
                  {{ $user->user_telephone }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-3 col-form-label text-warning">Role</label>
              <div class="col-sm-8">
                <div class="form-group bmd-form-group is-filled">
                  {{ $user->role_id ? $user->role->role_name : '' }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-3 col-form-label text-warning">Practice</label>
              <div class="col-sm-8">
                <div class="form-group bmd-form-group is-filled">
                  {{ $user->practice_id ? $user->practice->practice_name : '' }}
                </div>
              </div>
            </div>
        </div>
      </div>
      </div>
      <div class="col-md-4">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="#pablo">
              <a data-toggle="modal" data-target="#exampleModal">
                  <div class="avatar avatar-sm rounded-circle img-circle" style="width:100px; height:100px;overflow: hidden;">
                        <img src="{{ $user->image_id ? asset($user->image->image_url) : '' }}" alt="" style="max-width: 100px;">
                  </div>
              </a>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Picture</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-center">
                      <img src="{{ $user->image_id ? asset($user->image->image_url) : '' }}" alt="" style="max-width: 300px; border-radius: 8px;">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="card-body">
            <h6 class="card-category text-gray">{{ $user->user_specialization }}</h6>
            <h4 class="card-title">{{ $user->user_salutation }} {{ $user->user_title }} {{ $user->user_firstname }} {{ $user->user_lastname }} </h4>
            <p class="card-description">
              {{ $user->user_description }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection