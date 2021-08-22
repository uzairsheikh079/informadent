@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Users')])

@section('content')
<head>
    <link href="https://material-dashboard-pro-laravel.creative-tim.com/css/material-dashboard.css" rel="stylesheet">
</head>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">group</i>
                        </div>
                        <h4 class="card-title">Users</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{ route('users.create') }}" class="btn btn-sm btn-warning">ADD USER</a>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="dataTables_lenght" id="datatables_length">
                                        <label >Showing
                                        <form action="{{ route('users.index') }}" method="GET" role="search">
                                            <select name="no" id="datatables_length"  onchange="this.form.submit()" aria-controls="datatables" class="custom-select custom-select-md">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </form>of {{ $count }} Entries
                                        </label>
                                    </div>
                                </div>
                                <div class="text-right col-sm-12 col-md-6">
                                    <div id="datatables_filter" class="dataTables_filter"> 
                                        <label>
                                            <span class="bmd-form-group bmd-form-group-sm">
                                                <form action="{{ route('users.index') }}" method="GET"
                                                    role="search" id="search_form">
                                                    <span style="visibility: hidden;">space</span>
                                                    <input type="search" class="form-control form-control-sm"
                                                        name="user_name" id="user_name" placeholder="Search users"
                                                        aria-controls="datatables" 
                                                        onkeyup="this.form.submit()"
                                                        value="{{ $searchTerm }}" autocomplete="off">
                                                        <input type="hidden" id="paginate_no">
                                                </form>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                    <div class="table-responsive">
                        <div id="datatables_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">

                                    <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-describedby="datatables_info" class="table table-hover">
                                        <thead class="text-warning">
                                        <tr role="row">
                                            <th style="font-weight:bold">ID</th>
                                            <th style="font-weight:bold">Salutation</th>
                                            <th style="font-weight:bold">Title</th>
                                            <th style="font-weight:bold">First Name</th>
                                            <th style="font-weight:bold">Last Name</th>
                                            <th style="font-weight:bold">Email</th>
                                            <th style="font-weight:bold">Telephone</th>
                                            <th style="font-weight:bold">Specialization</th>
                                            <th style="font-weight:bold">About</th>
                                            <th style="font-weight:bold">Role</th>
                                            <th style="font-weight:bold">Practice</th>
                                            <th style="font-weight:bold">Profile Picture</th>
                                            <th style="font-weight:bold" class="td-actions text-right" style="width: auto;"><span style="visibility: hidden;">space</span>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                    @foreach ($users as $key => $user)
                                          <tr role="row" class="odd">
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->user_salutation }}</td>
                                            <td>{{ $user->user_title }}</td>
                                            <td>{{ $user->user_firstname }}</td>
                                            <td>{{ $user->user_lastname }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->user_telephone }}</td>
                                            <td>{{ $user->user_specialization }}</td>
                                            <td style=" text-align: justify;"><!-- span id="dots"></span><span id="more"> -->{!! $user->user_description !!}<!-- </span><button class="btn btn-sm" onclick="myFunction()" id="myBtn">Read More</button> --></td>
                                            <td>{{ $user->role_id ? $user->role->role_name : '' }}</td>
                                            <td>{{ $user->practice_id ? $user->practice->practice_name : '' }}</td>
                                            <td tabindex="0" class="">
                                                <!-- Button trigger modal -->
                                                    <div class="avatar avatar-sm rounded-circle img-circle" style="width:100px; height:100px;overflow: hidden;">
                                                          <img src="{{ $user->image_id ? asset($user->image->image_url) : '' }}" alt="" style="max-width: 100px;">
                                                    </div>
                                            </td>
                                            <td class="td-actions text-right">
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    <a type="button" rel="tooltip" title="Show" href="{{ route('users.show', $user->id) }}" class="btn btn-warning glyphicon glyphicon glyphicon-eye-open">
                                                    <i class="material-icons">visibility</i>
                                                  </a>
                                                    <a type="button" rel="tooltip" title="Edit" href="{{ route('users.edit', $user->id) }}" class="btn btn-info glyphicon glyphicon glyphicon-eye-open">
                                                    <i class="material-icons">edit</i>
                                                  </a> 
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" rel="tooltip" title="Remove" class="btn btn-danger glyphicon glyphicon glyphicon-eye-open">
                                                    <i class="material-icons">close</i>
                                                  </button>
                                                </form>
                                            </td>
                                          </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<script> 
    function submitForm() {
        var searchData = $("#user_name").val();
        $('#search_data').attr('value', searchData)
        $("#paginate_form").submit();
    } 
</script>
@endsection