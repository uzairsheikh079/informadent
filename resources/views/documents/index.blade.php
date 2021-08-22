@extends('layouts.app', ['activePage' => 'documents', 'titlePage' => __('Documents')])

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
    <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">description</i>
                </div>
                <h4 class="card-title">Documents</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-right">
                        <a href="{{ route('documents.create') }}" class="btn btn-sm btn-danger">ADD DOCUMENT</a>
                    </div>
                </div>
                <div class="row">
                                <div class="col-md-6">
                                    <div class="dataTables_lenght" id="datatables_length">
                                        <label>Showing
                                        <form action="{{ route('documents.index') }}" method="GET" role="search">
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
                                                <form action="{{ route('documents.index') }}" method="GET"
                                                    role="search" id="search_form">
                                                    <span style="visibility: hidden;">space</span>
                                                    <input type="search" class="form-control form-control-sm"
                                                        name="document_name" id="document_name" placeholder="Search documents"
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
                                            <th style="font-weight:bold">Document Name</th>
                                            <th style="font-weight:bold">Document Title</th>
                                            <th style="font-weight:bold">Document Category</th>
                                            <th style="font-weight:bold">Checkpoints</th>
                                            <th style="font-weight:bold">Image</th>
                                            <th style="font-weight:bold" class="td-actions text-right" style="width: auto;"><span style="visibility: hidden;">space</span>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                    @foreach ($documents as $key => $document)
                                          <tr role="row" class="odd">
                                            <td>{{ $document->id }}</td>
                                            <td>{{ $document->user->user_lastname }}, {{ $document->user->user_firstname }}</td>
                                            <td>{{ $document->document_name }}</td>
                                            <td>{{ $document->document_title }}</td>
                                            <td>{{ $document->document_category }}</td>
                                            <td>@php
                                                $checkpoint = $document->checkpoint_id;
                                                $convertToArray = json_decode($checkpoint);
                                                @endphp
                                                @foreach ($checkpoints as $checkpoint)
                                                @if ($convertToArray)
                                                @if (in_array($checkpoint->id, $convertToArray))
                                                {{ $checkpoint->checkpoint_name }}
                                                @endif
                                                @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ $document->image_id ? asset($document->image->image_url) : '' }}">
                                            <img src="{{ $document->image_id ? asset($document->image->image_url) : '' }}" alt="" style="border-radius: 8px; width: 100px;"></a>
                                            </td>
                                            <td class="td-actions text-right">
                                            <form action="{{ route('documents.destroy', $document->id) }}" method="POST">
                                                <a type="button" rel="tooltip" title="Show" href="{{ route('documents.show', $document->id) }}" class="btn btn-warning glyphicon glyphicon glyphicon-eye-open">
                                                <i class="material-icons">visibility</i>
                                              </a>
                                                <a type="button" rel="tooltip" title="Edit" href="{{ route('documents.edit', $document->id) }}" class="btn btn-info glyphicon glyphicon glyphicon-eye-open">
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
        </div>
<script> 
    function submitForm() {
        var searchData = $("#document_name").val();
        $('#search_data').attr('value', searchData)
        $("#paginate_form").submit();
    } 
</script>
  <!-- {!! $documents->links() !!} -->
@endsection