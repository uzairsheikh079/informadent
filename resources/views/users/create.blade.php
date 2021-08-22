@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Users')])

@section('content')

<head>
    <link href="https://material-dashboard-pro-laravel.creative-tim.com/css/material-dashboard.css" rel="stylesheet">
</head>
<div class="content">
<div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="POST" action="{{ route('users.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="card ">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">person</i>
                </div>
                <h4 class="card-title">Add User</h4>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('users.index') }}" class="btn btn-sm btn-warning">Back to list</a>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">Profile photo</label>
                  <div class="col-sm-8 text-center">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-new thumbnail img-square">
                        <img src="https://material-dashboard-pro-laravel.creative-tim.com/material/img/placeholder.jpg" alt="...">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail img-square"></div>
                      <div>
                        <span class="btn btn-warning btn-file">
                          <span class="fileinput-new">Select image</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" name="image_url" id="input-picture">
                        </span>
                          <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">Salutation</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <select required="true" aria-required="true" class="custom-select custom-select-md" name="user_salutation">
                          <option selected disabled>Select Salutation</option>
                          <option value="Herr.">Herr.</option>
                          <option value="Frau.">Frau.</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">Title</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <select required="true" aria-required="true" class="custom-select custom-select-md" name="user_title">
                          <option selected disabled>Select Title</option>
                          <option value="Dr.">Dr.</option>
                          <option value="Prof.">Prof.</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">First Name</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="user_firstname" type="text" placeholder="firstname..." required="">
                     </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">Last Name</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="user_lastname" type="text" placeholder="lastname..." required="">
                     </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">Email</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="email" type="email" placeholder="email..." required="">
                     </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">Phone</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="user_telephone" type="text" placeholder="phone..." required="">
                     </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">Specialization</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="user_specialization" type="text" placeholder="specialization..." required="">
                     </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">About</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                       <textarea class="summernote" cols="30" rows="5" name="user_description"></textarea>
                     </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">Role</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <select name="role_id" id="datatables_length" aria-controls="datatables" class="custom-select custom-select-md">
                        <option selected disabled>Select Role</option>
                      @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                      @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-warning">Practice</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <select name="practice_id" id="datatables_length" aria-controls="datatables" class="custom-select custom-select-md">
                        <option selected disabled>Select Practice</option>
                      @foreach ($practices as $practice)
                        <option value="{{ $practice->id }}">{{ $practice->practice_name }}</option>
                      @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-warning">Add User</button>
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


