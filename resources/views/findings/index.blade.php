@extends('layouts.app', ['activePage' => 'findings', 'titlePage' => __('Findings')])

@section('content')
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
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">saved_search</i>
                        </div>
                        <h4 class="card-title">Findings</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{ route('findings.create') }}" class="btn btn-sm btn-danger">ADD FINDING</a>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="dataTables_lenght" id="datatables_length">
                                        <label >Showing
                                        <form action="{{ route('findings.index') }}" method="GET" role="search">
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
                                                <form action="{{ route('findings.index') }}" method="GET"
                                                    role="search" id="search_form">
                                                    <span style="visibility: hidden;">space</span>
                                                    <input type="search" class="form-control form-control-sm"
                                                        name="finding_name" id="finding_name" placeholder="Search findings"
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
                                        <thead class="text-danger">
                                        <tr role="row">
                                            <th style="font-weight:bold">ID</th>
                                            <th style="font-weight:bold">User</th>
                                            <th style="font-weight:bold">Finding</th>
                                            <th style="font-weight:bold">Diagnose</th>
                                            <!-- <th style="font-weight:bold">PICD</th>
                                            <th style="font-weight:bold">PIPSD</th>
                                            <th style="font-weight:bold">PIPLD</th>
                                            <th style="font-weight:bold">PIDLD</th>
                                            <th style="font-weight:bold">LICD</th>
                                            <th style="font-weight:bold">LIPSD</th>
                                            <th style="font-weight:bold">LIPLD</th>
                                            <th style="font-weight:bold">LIDLD</th> -->
                                            <th style="font-weight:bold">Documents</th>
                                            <th style="font-weight:bold">Step</th>
                                            <th style="font-weight:bold">Images</th>
                                            <th style="font-weight:bold" class="td-actions text-right" style="width: auto;"><span style="visibility: hidden;">space</span>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                    @foreach ($findings as $key => $finding)
                                          <tr role="row" class="odd">
                                            <td>{{ $finding->id }}</td>
                                            <td>{{ $finding->user->user_lastname }}, {{ $finding->user->user_firstname }}</td>
                                            <td>{{ $finding->finding_name }}</td>
                                            <td>
                                                {{ $finding->diagnose_id ? $finding->diagnose->diagnose_name : '' }}</td>
                                            <!-- <td>{!! Str::substr($finding->privately_insured_cuecard_description, 0, 10) !!}...</td>
                                            <td>{!! Str::substr($finding->privately_insured_patient_short_description, 0, 10) !!}...</td>
                                            <td>{!! Str::substr($finding->privately_insured_patient_long_description, 0, 10) !!}...</td>
                                            <td>{!! Str::substr($finding->privately_insured_doctor_long_description, 0, 10) !!}...</td>
                                            <td>{!! Str::substr($finding->legaly_insured_cuecard_description, 0, 10) !!}...</td>
                                            <td>{!! Str::substr($finding->legaly_insured_patient_short_description, 0, 10) !!}...</td>
                                            <td>{!! Str::substr($finding->legaly_insured_patient_long_description, 0, 10) !!}...</td>
                                            <td>{!! Str::substr($finding->legaly_insured_doctor_long_description, 0, 10) !!}...</td> -->
                                            <td>@php
                                            $document = $finding->document_id;
                                            $convertToArray = json_decode($document);
                                            @endphp
                                            @foreach ($documents as $document)
                                             @if ($convertToArray)
                                            @if (in_array($document->id, $convertToArray))
                                            {{ $document->document_name }}
                                            @endif
                                            @endif
                                            @endforeach
                                            </td>
                                            <td>{{ $finding->step }}</td>
                                            <td tabindex="0" class="">
                                            @php
                                            $image = $finding->image_id;
                                            $convertToArray = json_decode($image);
                                            @endphp
                                            @foreach ($images as $image)
                                            @if ($convertToArray)
                                            @if (in_array($image->id, $convertToArray))
                                            <a href="{{ asset($image->image_url)}}">
                                            <img src="{{ asset($image->image_url)}}" alt="" style="max-width: 100px; border-radius: 8px;"><br><span>{{ $image->image_title }}</span></a>
                                            @endif
                                            @endif
                                            @endforeach
                                            </td>
                                            <td class="td-actions text-right">
                                                <form action="{{ route('findings.destroy', $finding->id) }}" method="POST">
                                                    <a type="button" rel="tooltip" title="Show" href="{{ route('findings.show', $finding->id) }}" class="btn btn-warning glyphicon glyphicon glyphicon-eye-open">
                                                    <i class="material-icons">visibility</i>
                                                  </a>
                                                    <a type="button" rel="tooltip" title="Edit" href="{{ route('findings.edit', $finding->id) }}" class="btn btn-info glyphicon glyphicon glyphicon-eye-open">
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
        var searchData = $("#finding_name").val();
        $('#search_data').attr('value', searchData)
        $("#paginate_form").submit();
    } 
</script>
  <!-- {!! $findings->links() !!} -->
@endsection