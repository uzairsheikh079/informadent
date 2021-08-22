
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('texts.update', $texts->id ) }}" method="POST">
                            @csrf
                            @method('PUT')
                        <div class="row">
                            <strong>Name:</strong>
                            <input type="text" name="text_name" class="form-control" value="{{ $texts->text_name }}">
                        </div>

                        <div class="row">
                            <strong>Checkpoints:</strong>
                            <select name="checkpoint_id" id="">
                                <option value="{{ $texts->checkpoint_id }}">{{ $texts->checkpoint->checkpoint_name }}</option>
                            @foreach ($checkpoints as $checkpoint)
                                <option value="{{ $checkpoint->id }}">{{ $checkpoint->checkpoint_name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <strong>Cuecard Description:</strong>
                            <textarea name="cuecard_description" id="" cols="30" rows="5">{{ $texts->cuecard_description }}</textarea>
                        </div>
                        <div class="row">

                            <strong>Patient Short Description:</strong>
                            <textarea name="patient_short_description" id="" cols="30" rows="5">{{ $texts->patient_short_description }}</textarea>
                        </div>
                        <div class="row">
                            <strong>Patient long Descripiton:</strong>
                            <textarea name="patient_long_description" id="" cols="30" rows="5">{{ $texts->patient_long_description }}</textarea>
                        </div>

                        <div class="row">
                            <strong>Doctor Long Description:</strong>
                            <textarea name="doctor_long_description" id="" cols="30" rows="5">{{ $texts->doctor_long_description }}</textarea>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="btn btn-dark">Update</button>
                        </div>   
                        </form>
                </div>
            </div>
        </div>
    </div> 
</div>
</div>     
@endsection