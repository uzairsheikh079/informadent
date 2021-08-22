@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Profile') }}</h4>
                <p class="card-category">{{ __('User information') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Change password') }}</h4>
                <p class="card-category">{{ __('Password') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status_password'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status_password') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Current Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Current Password') }}" value="" required />
                      @if ($errors->has('old_password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __('New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('New Password') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm New Password') }}" value="" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Change password') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

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
              <div class="col-sm-7">
                <img style="border-radius: 50%; height: 200px; width: 200px;" src="{{ asset($user->image->image_url) }}" alt="...">
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-3 col-form-label text-warning">Salutation</label>
              <div class="col-sm-7">
                <div class="form-group bmd-form-group is-filled">
                  {{ $user->user_salutation }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-3 col-form-label text-warning">Title</label>
              <div class="col-sm-7">
                <div class="form-group bmd-form-group is-filled">
                  {{ $user->user_title }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-3 col-form-label text-warning">First Name</label>
              <div class="col-sm-7">
                <div class="form-group bmd-form-group is-filled">
                  {{ $user->user_firstname }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-3 col-form-label text-warning">Last Name</label>
              <div class="col-sm-7">
                <div class="form-group bmd-form-group is-filled">
                  {{ $user->user_lastname }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-3 col-form-label text-warning">Email</label>
              <div class="col-sm-7">
                <div class="form-group bmd-form-group is-filled">
                  {{ $user->email }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-3 col-form-label text-warning">Telephone</label>
              <div class="col-sm-7">
                <div class="form-group bmd-form-group is-filled">
                  {{ $user->user_telephone }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-3 col-form-label text-warning">Role</label>
              <div class="col-sm-7">
                <div class="form-group bmd-form-group is-filled">
                  {{ $user->role->role_name }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-3 col-form-label text-warning">Practice</label>
              <div class="col-sm-7">
                <div class="form-group bmd-form-group is-filled">
                  {{ $user->practice->practice_name }}
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
              <img class="img" src="{{ asset($user->image->image_url) }}">
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
    <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
            @csrf
            @method('put')
            <div class="card ">
                <div class="card-header card-header-icon card-header-warning">
              <div class="card-icon">
                <i class="material-icons">password</i>
              </div>
              <h4 class="card-title">{{ __('Change password') }}</h4>
                <p class="card-category">{{ __('Password') }}</p>
            </div>
              <div class="card-body ">
                @if (session('status_password'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status_password') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning" for="input-current-password">{{ __('Current Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Current Password') }}" value="" required />
                      @if ($errors->has('old_password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning" for="input-password">{{ __('New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('New Password') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm New Password') }}" value="" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-warning">{{ __('Change password') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection