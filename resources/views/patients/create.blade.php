@extends('layouts.sidenav')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Roles</h4>
            </div>
         
        </div>
    </div>

<div class="container-fluid"> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div class="ms-auto text-end">
                            <a class="btn btn-dark" href="{{ route('texts.index') }}">Back</a>
                        </div>
                    </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('texts.store') }}">
                            @csrf
                            <!-- Text_Name -->
                            <div class="row">
                                <strong>Text:</strong>
                                <input type="text" name="text_name" class="form-control" placeholder="Enter Text">
                            </div>
                            
                            <div class="row">
                                <strong>Checkpoints:</strong>
                                <select name="checkpoint_id" id="">
                                    <option value="">--Select a checkpoint--</option>
                                @foreach ($checkpoints as $checkpoint)
                                    <option value="{{ $checkpoint->id }}">{{ $checkpoint->checkpoint_name }}</option>
                                @endforeach
                                </select>
                            </div>
                                <div class="row">
                                <strong>Cuecard Description:</strong>
                                <textarea name="cuecard_description" id="" cols="30" rows="5"></textarea>
                            </div>

                            <div class="row">
                                <strong>Patient Short Description:</strong>
                                <textarea name="patient_short_description" id="" cols="30" rows="5"></textarea>
                            </div>

                            <div class="row">
                                <strong>Patient long Descripiton:</strong>
                                <textarea name="patient_long_description" id="" cols="30" rows="5"></textarea>
                            </div>

                            <div class="row">
                                <strong>Doctor Long Description:</strong>
                                <textarea name="doctor_long_description" id="" cols="30" rows="5"></textarea>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="btn btn-dark">Save</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div> 
</div>
</div>     
@endsection