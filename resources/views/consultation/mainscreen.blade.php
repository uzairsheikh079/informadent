@extends('layouts2.app', ['activePage' => 'consultation', 'titlePage' => __('consultation')])

@section('content')
<head>
    <link href="https://material-dashboard-pro-laravel.creative-tim.com/css/material-dashboard.css" rel="stylesheet">
</head>
<nav class="navbar bg-secondary">
  <div class="container-fluid">

      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
      <i class="material-icons">add_circle_outline</i>
      Patient Anlegen
      </button>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <i class="material-icons">info</i><span style="visibility: hidden;">sp</span>
              <h5 class="modal-title" id="exampleModalLabel">Patient Information</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <div class="col-md-12">
             	<div class="row">
	             	<div class="col-md-6">
	             		<div class="card">
             			<div class="card-body">
	         			<div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">perm_identity</i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Patient Number">
                </div>
                <div class="input-group mt-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">health_and_safety</i>
                    </span>
                  </div>
                  <select class="custom-select custom-select-md" name="healthinsurance_name">
                      <option selected disabled>Select Healthinsurance</option>
                  @foreach ($healthinsurances as $hi)
                      <option value="{{ $hi->id }}">{{ $hi->healthinsurance_name }}</option>
                  @endforeach
                  </select>
                </div>
                <div class="input-group mt-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">emoji_people</i>
                    </span>
                  </div>
                  <select class="custom-select custom-select-md" name="ppa_name" multiple>
                      <option selected disabled>Select People</option>
                  @foreach ($people as $people)
                      <option value="{{ $people->id }}">{{ $people->ppa_name }}</option>
                  @endforeach
                  </select>
                </div>
                <div class="input-group mt-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">supervised_user_circle</i>
                    </span>
                  </div>
                  <input type="text" name="supervisor" class="form-control" placeholder="Supervisor">
                </div>
                <div class="input-group mt-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">support_agent</i>
                    </span>
                  </div>
                  <input type="text" name="authorized_representative" class="form-control" placeholder="Authorized representative">
                </div>
                <div class="input-group mt-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">interpreter_mode</i>
                    </span>
                  </div>
                  <input type="text" name="interpreter" class="form-control" placeholder="Interpreter">
                </div>
                <div class="input-group mt-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">wheelchair_pickup</i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="helper" placeholder="Helper">
                </div>
	             		</div>
             			</div>
	             	</div>
             		<div class="col-md-6">
             			<div class="card">
             			<div class="card-body">
             			<div class="input-group mt-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">policy</i><span style="visibility: hidden;">p</span>Consents
                    </span>
                  </div>
                </div>
                <div class="input-group mt-3">
                  <div class="form-check form-check-radio">
                      @foreach($consents as $consent)
                      <label class="form-check-label mt-2" style="font-size: 15;">
                          <input class="form-check-input" type="radio" name="consent_name" id="exampleRadios1" value="option1" >
                          {{ $consent->consent_name }}
                          <span class="circle">
                              <span class="check"></span>
                          </span>
                      </label>
                      @endforeach
                  </div>
                </div>
             			</div>
             			</div>
             		</div>
             	</div>
             </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-warning">Next</button>
            </div>
          </div>
        </div>
      </div>


      <form class="form-inline ml-auto">
          <div class="form-group no-border">
            <input style="width: 300px;" type="text" class="form-control" placeholder="Search">
          </div>
      </form>
      <div class="col-sm-1"></div>
            <button style="background-color: black;" type="submit" class="btn btn">
              Speichern
            </button>
            <div class="col-sm-1"></div>
                <div class="btn-group">
                  <button type="button" class="btn btn-secondary" >{{ Auth::user()->user_lastname }} {{ Auth::user()->user_firstname }}</button>
                  <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img style="border-radius: 80px; width: 20px; height: 20px;" class="profile-image" src="{{ asset('material') }}/img/cover.jpg">
                  </button> 
                    <span class="sr-only">Toggle Dropdown</span>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                  </div>
                </div>
  </div>      
</nav>

<div class="content">
  <div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
          <div class="table-responsive">
            <div id="datatables_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                      <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-describedby="datatables_info" class="table table-hover">
                          <thead>
                          <tr role="row">
                              <th style="font-weight:bold; background-color: gray;">Indication Group</th>
                              <th style="font-weight:bold">Degree</th>
                              <th style="font-weight:bold">Step 1</th>
                              <th style="font-weight:bold">Step 2</th>
                              <th style="font-weight:bold">Step 3</th>
                              <th style="font-weight:bold">Step 4</th>
                              <th style="font-weight:bold">Step 5</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($diagnosesTableData as $diagnose)
                            <tr role="row" class="odd">
                              @php $prevDiagId = $diagnose->did @endphp
                              @if($prevDiagId != $diagnose->did)
                              <td>{{ $diagnose }}</td>
                              @endif
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

@endsection