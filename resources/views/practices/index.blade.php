@extends('layouts.app', ['activePage' => 'practices', 'titlePage' => __('Practices')])

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
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">foundation</i>
                </div>
                <h4 class="card-title">Practices</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-right">
                        <a href="{{ route('practices.create') }}" class="btn btn-sm btn-rose">ADD PRACTICE</a>
                    </div>
                </div>
                <div class="row">
                                <div class="col-md-6">
                                    <div class="dataTables_lenght" id="datatables_length">
                                        <label>Showing
                                        <form action="{{ route('practices.index') }}" method="GET" role="search">
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
                                                <form action="{{ route('practices.index') }}" method="GET"
                                                    role="search" id="search_form">
                                                    <span style="visibility: hidden;">space</span>
                                                    <input type="search" class="form-control form-control-sm"
                                                        name="practice_name" id="practice_name" placeholder="Search practices"
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
                                        <thead class="text-rose">
                                        <tr role="row">
                                            <th style="font-weight:bold">ID</th>
                                            <th style="font-weight:bold">Practice Name</th>
                                            <th style="font-weight:bold">Practice Email</th>
                                            <th style="font-weight:bold">Practice Address</th>
                                            <th style="font-weight:bold">Practice Telephone</th>
                                            <th style="font-weight:bold">Clinic Name</th>
                                            <th style="font-weight:bold">Practice Logo</th>
                                            <th style="font-weight:bold" class="td-actions text-right" style="width: auto;"><span style="visibility: hidden;">space</span>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                    @foreach ($practices as $key => $practice)
                                          <tr role="row" class="odd">
                                            <td>{{ $practice->id }}</td>
                                            <td>{{ $practice->practice_name }}</td>
                                            <td>{{ $practice->practice_email }}</td>
                                            <td>{{ $practice->street_no }} {{ $practice->house_no }} {{ $practice->post_code }} {{ $practice->city }} {{ $practice->country }}</td>
                                            <td>{{ $practice->practice_telephone }}</td>
                                            <td>{{ $practice->clinic_id ? $practice->clinic->clinic_name : '' }}</td>
                                            <td tabindex="0" class="">
                                            <img src="{{ $practice->image_id ? asset($practice->image->image_url) : '' }}" alt="" style="border-radius: 8px; width: 100px;">
                                            </td>
                                            <td class="td-actions text-right">
                                            <form action="{{ route('practices.destroy', $practice->id) }}" method="POST">
                                                <a type="button" rel="tooltip" title="Show" href="{{ route('practices.show', $practice->id) }}" class="btn btn-warning glyphicon glyphicon glyphicon-eye-open">
                                                <i class="material-icons">visibility</i>
                                              </a>
                                                <a type="button" rel="tooltip" title="Edit" href="{{ route('practices.edit', $practice->id) }}" class="btn btn-info glyphicon glyphicon glyphicon-eye-open">
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
        var searchData = $("#practice_name").val();
        $('#search_data').attr('value', searchData)
        $("#paginate_form").submit();
    } 
</script>
<!-- {!! $practices->links() !!} -->
@endsection