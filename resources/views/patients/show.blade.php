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

                    <div class="form-group row">
                        <strong>Text:</strong>
                        {{ $texts->text_name }}
                    </div>
            
                    <div class="form-group row">
                        <strong>Checkpoint:</strong>
                        {{ $texts->checkpoint->checkpoint_name }}
                    </div>

                    <div class="form-group row">
                        <strong>Cuecard Description:</strong>
                        {{ $texts->cuecard_description }}
                    </div>

                    <div class="form-group row">
                        <strong>Patient Short Description:</strong>
                        {{ $texts->patient_short_description }}
                    </div>

                    <div class="form-group row">
                        <strong>Patient Long Description:</strong>
                        {{ $texts->patient_long_description }}
                    </div>

                    <div class="form-group row">
                        <strong>Doctor Long Description:</strong>
                        {{ $texts->doctor_long_description }}
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
</div>     
@endsection