@extends('layouts.sidenav')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Texts</h4>
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
                            <a class="btn btn-dark" href="{{ route('texts.create') }}"> Create New Text</a>
                        </div>
                    </div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
                                
<table class="table table-striped">
    <tr>
        <th>No</th>
        <th>Text</th>
        <th>Checkpoint</th>
        <th>Cuecard Description</th>
        <th>Patient Short Description</th>
        <th>Patient Long Description</th>
        <th>Doctor Long Description</th>
        <th width="280px">Action</th>
    </tr>
@foreach ($data as $key => $value)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $value->text_name }}</td>
        <th>{{ $value->checkpoint->checkpoint_name }}</th>
        <th>{{ $value->cuecard_description }}</th>
        <th>{{ $value->patient_short_description }}</th>
        <th>{{ $value->patient_long_description }}</th>
        <th>{{ $value->doctor_long_description }}</th>
        <td>
<form action="{{ route('texts.destroy',$value->id) }}" method="POST">   
    <a class="btn btn-dark" href="{{ route('texts.show',$value->id) }}">Show</a>    
    <a class="btn btn-dark" href="{{ route('texts.edit',$value->id) }}">Edit</a>   
    @csrf
@method('DELETE')      
    <button type="submit" class="btn btn-dark">Delete</button>
</form>
        </td>
    </tr>
@endforeach
</table>  
                </div>
            </div>
        </div>
    </div> 
</div>
</div>  
{!! $data->links() !!}    
@endsection