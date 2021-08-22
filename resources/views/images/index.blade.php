@extends('layouts.app', ['activePage' => 'images', 'titlePage' => __('Images')])

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
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">image</i>
                </div>
                <h4 class="card-title">Images</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-right">
                        <a href="{{ route('images.create') }}" class="btn btn-sm btn-warning">ADD IMAGES</a>
                    </div>
                </div>
                <div class="row">
                                <div class="col-md-6">
                                    <div class="dataTables_lenght" id="datatables_length">
                                        <label>Showing
                                        <form action="{{ route('images.index') }}" method="GET" role="search">
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
                                                <form action="{{ route('images.index') }}" method="GET"
                                                    role="search" id="search_form">
                                                    <span style="visibility: hidden;">space</span>
                                                    <input type="search" class="form-control form-control-sm"
                                                        name="image_name" id="image_name" placeholder="Search image"
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
                                            <th style="font-weight:bold">User</th>
                                            <th style="font-weight:bold">Image Name</th>
                                            <th style="font-weight:bold">Image Title</th>
                                            <th style="font-weight:bold">Image Category</th>
                                            <!-- <th style="font-weight:bold">PICD</th>
                                            <th style="font-weight:bold">PIPSD</th>
                                            <th style="font-weight:bold">PIPLD</th>
                                            <th style="font-weight:bold">PIDLD</th>
                                            <th style="font-weight:bold">LICD</th>
                                            <th style="font-weight:bold">LIPSD</th>
                                            <th style="font-weight:bold">LIPLD</th>
                                            <th style="font-weight:bold">LIDLD</th> -->
                                            <th style="font-weight:bold">Image</th>
                                            <th style="font-weight:bold" class="td-actions text-right" style="width: auto;"><span style="visibility: hidden;">space</span>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                    @foreach ($images as $key => $image)
                                          <tr role="row" class="odd">
                                            <td>{{ $image->id }}</td>
                                            <td>{{ $image->user->user_lastname }}, {{ $image->user->user_firstname }}</td>
                                            <td>{{ $image->image_name }}</td>
                                            <td>{{ $image->image_title }}</td>
                                            <td>{{ $image->image_category }}</td>
                                            <!-- <td>{!! Str::substr($image->privately_insured_cuecard_description, 0, 10) !!}...</td>
                                            <td>{!! Str::substr($image->privately_insured_patient_short_description, 0, 10) !!}...</td>
                                            <td>{!! Str::substr($image->privately_insured_patient_long_description, 0, 10) !!}...</td>
                                            <td>{!! Str::substr($image->privately_insured_doctor_long_description, 0, 10) !!}...</td>
                                            <td>{!! Str::substr($image->legaly_insured_cuecard_description, 0, 10) !!}...</td>
                                            <td>{!! Str::substr($image->legaly_insured_patient_short_description, 0, 10) !!}...</td>
                                            <td>{!! Str::substr($image->legaly_insured_patient_long_description, 0, 10) !!}...</td>
                                            <td>{!! Str::substr($image->legaly_insured_doctor_long_description, 0, 10) !!}...</td> -->
                                            <td>
                                            <a href="{{ $image->image_url }}">
                                            <img src="{{ $image->image_url }}" alt="" style="border-radius: 8px; width: 40px;"></a>
                                            </td>
                                            <td class="td-actions text-right">
                                            <form action="{{ route('images.destroy', $image->id) }}" method="POST">
                                                <a type="button" rel="tooltip" title="Show" href="{{ route('images.show', $image->id) }}" class="btn btn-warning glyphicon glyphicon glyphicon-eye-open">
                                                <i class="material-icons">visibility</i>
                                              </a>
                                                <a type="button" rel="tooltip" title="Edit" href="{{ route('images.edit', $image->id) }}" class="btn btn-info glyphicon glyphicon glyphicon-eye-open">
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
        var searchData = $("#image_name").val();
        $('#search_data').attr('value', searchData)
        $("#paginate_form").submit();
    } 
</script>
  <!-- {!! $images->links() !!} -->
@endsection


