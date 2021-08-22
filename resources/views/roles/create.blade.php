@extends('layouts.app', ['activePage' => 'roles', 'titlePage' => __('Roles')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <form method="POST" action="{{ route('roles.store') }}" autocomplete="off" class="form-horizontal">
              @csrf
              <div class="card ">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">recent_actors</i>
                  </div>
                  <h4 class="card-title">Add Role</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('roles.index') }}" class="btn btn-sm btn-danger">Back to list</a>
                    </div>
                  </div>
                  <div class="row">
                    <label style="font-weight:bold" class="col-sm-2 col-form-label text-danger">{{ __('Role') }}</label>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <input class="form-control" name="role_name" type="text" placeholder="{{ __('role...') }}" required="true" aria-required="true"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                  <button type="submit" class="btn btn-danger">{{ __('ADD ROLE') }}</button>
                </div>
              </div>
              </form>
            </div>
        </div>
    </div>
</div> 
@endsection
