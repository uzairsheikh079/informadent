@extends('layouts.app', ['activePage' => 'diagnose', 'titlePage' => __('Diagnosis')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
    <form method="POST" action="{{ route('diagnose.update', $diagnose->id) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')
    <div class="card ">
              <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                <i class="material-icons">person_search</i>
                </div>
                <h4 class="card-title">Edit Diagnose</h4>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('diagnose.index') }}" class="btn btn-sm btn-rose">Back to list</a>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('ID') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="diagnose_id" type="text" value="{{ $diagnose->id }}" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Diagnose') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="diagnose_name" type="text" value="{{ $diagnose->diagnose_name }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Parent Diagnose') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                        <select  class="custom-select custom-select-md" name="parent_id" >
                            <option value="">{{ $diagnose->parent_id }}</option>
                        @foreach ($diagnosis as $data)
                            <option value="{{ $data->id }}">{{ $data->diagnose_name }}</option>
                        @endforeach
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="font-weight:bold" class="col-sm-2 col-form-label text-rose">{{ __('Degree') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <select class="custom-select custom-select-md" name="degree" id="">
                          <option value="{{ $diagnose->degree }}">{{ $diagnose->degree }}</option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                          <option value="E">E</option>
                          <option value="F">F</option>
                          <option value="G">G</option>
                          <option value="H">H</option>
                          <option value="I">I</option>
                          <option value="J">J</option>
                          <option value="K">K</option>
                          <option value="L">L</option>
                          <option value="M">M</option>
                          <option value="N">N</option>
                          <option value="O">O</option>
                          <option value="P">P</option>
                          <option value="Q">Q</option>
                          <option value="R">R</option>
                          <option value="S">S</option>
                          <option value="T">T</option>
                          <option value="U">U</option>
                          <option value="V">V</option>
                          <option value="W">W</option>
                          <option value="X">X</option>
                          <option value="Y">Y</option>
                          <option value="Z">Z</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-rose">{{ __('UPDATE DIAGNOSE') }}</button>
              </div>
        </div>
        </form>
            </div>
        </div>
    </div>
</div>
@endsection