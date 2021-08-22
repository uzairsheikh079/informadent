@extends('layouts.app', ['activePage' => 'roles', 'titlePage' => __('Roles')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header card-header-icon card-header-danger">
            <div class="card-icon">
              <i class="material-icons">recent_actors</i>
            </div>
            <h4 class="card-title">Role</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 text-right">
                  <a href="{{ route('roles.index') }}" class="btn btn-sm btn-danger">Back to list</a>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('ID') }}</label>
              <div class="col-sm-8">
                <div class="form-group">
                  {{ $role->id }}
                </div>
              </div>
            </div>
            <div class="row">
              <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Role') }}</label>
              <div class="col-sm-8">
                <div class="form-group">
                  {{ $role->role_name }}
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