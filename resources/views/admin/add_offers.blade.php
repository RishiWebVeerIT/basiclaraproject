@extends('layouts.admin')
@section('section')

<section class="section">

    <div class="card" style="padding: 10px">
        <div class="d-grid gap-2 d-md-flex justify-content-between">
            <h5 class="card-title">All Fee Heads</h5>
            <div class="d-flex align-items-center">
<button type="button" class="btn btn-primary" onclick="AddModal()">Add Offer</button>
            </div>

        </div>

        <div class="col-sm-12 row">

    
      <div class="col-md-4">
        <label for="" class="form-label">Filter Scroll</label>
        <select class="form-control" name="is_scroll" id="is_scroll">
          <option value="">Select</option>
          <option value="1">Scrolling</option>
          <option value="0">Static</option>
        </select>
      </div>

      <div class="col-md-4">
        <label for="" class="form-label">Filter Status</label>
        <select class="form-control" name="status" id="status">
          <option value="">Select</option>
          <option value="1">Active</option>
          <option value="0">Expired</option>
        </select>
      </div>
    </div>
    <div class="card-body pd-10" style="overflow-x:auto;">

      <table class="table table-bordered text-center mt20_n_b1 table-striped" id="data-table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Head</th>
            <th scope="col">Discount ( % )</th>
            <th scope="col">Status</th>
            <th scope="col">Scroll</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
</section>

{{-- ========================================== Add Modal================================================ --}}
<div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Add Offer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" method="post" action="{{route('admin.store.offer')}}" enctype='multipart/form-data'>
                @csrf
                <div class="col-md-8">
                  <label for="inputName5" class="form-label">Offer Head <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="head" id="inputName5" value="{{ old('name') }}" placeholder="Head" required>
                      @error('head')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                </div>

                <div class="col-md-4">
                  <label for="inputPaid" class="form-label">Off Percentage<span class="text-danger">*</span></label>
                  <input type="text" placeholder="%" class="form-control" id="inputPaid" onkeypress="return onlyNumber(event)" name="percent" value="{{ old('percent') }}" required>
                  @error('percent')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                </div>


                <div class="col-md-8">
                  <label for="inputdescription5" class="form-label">Description</label>
                  <input type="text" class="form-control" name="description" id="inputdescription5" value="{{ old('description') }}" placeholder="Description">
                </div>

                <div class="col-md-4">
                  <label for="inputType" class="form-label">Scroll on Top</label>
                  <select id="inputType" class="form-select" name="is_scroll">
                    <option value="0" selected>No</option>
                    <option value="1">Yes</option>
                  </select>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                   <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              </form><!-- End Multi Columns Form -->
            </div>
        </div>
    </div>
</div>
{{-- ==========================================Add Modal End ================================================ --}}

{{-- ==========================================Edit Modal================================================ --}}
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Update Fee Head</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="col-md-8">
                  <label for="edithead" class="form-label">Offer Head <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="head" id="edithead" value="{{ old('name') }}" placeholder="Head" required>
                      @error('head')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                </div>

                <div class="col-md-4">
                  <label for="editpercent" class="form-label">Off Percentage<span class="text-danger">*</span></label>
                  <input type="text" placeholder="%" class="form-control" id="editpercent" onkeypress="return onlyNumber(event)" name="percent" value="{{ old('percent') }}" required>
                  @error('percent')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                </div>


                <div class="col-md-8">
                  <label for="inputdescription5" class="form-label">Description</label>
                  <input type="text" class="form-control" name="description" id="editinputdescription5" value="{{ old('description') }}" placeholder="Description">
                </div>

                <div class="col-md-4">
                  <label for="inputyear5" class="form-label">For Year</label>
                  <select  class="form-control" name="year" id="editinputyear5">
                    @for($i = 2023; $i <= (date('Y') + 2); $i++)
                    <option value="{{$i}}" @if(date('Y') == $i) selected @endif >{{$i}}</option>
                    @endfor
                  </select>

                  <input type="hidden" name="editid" id="edit_id">

                </div>

                <div class="col-md-6">
                  <label for="editscroll" class="form-label">Scroll on Top</label>
                  <select id="editscroll" class="form-select" name="scroll">
                    <option value="0" selected>No</option>
                    <option value="1">Yes</option>
                  </select>
                </div>
            
                <div class="text-center">
                  <button type="button" class="btn btn-primary" onclick="save_update()">Update</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div><!-- End Multi Columns Form -->
            </div>
        </div>
    </div>
</div>
{{-- ==========================================Edit Modal End ================================================ --}}
@endsection


@push('script')
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">

function AddModal()
{
   $('#AddModal').modal('show');
}
function hideModal()
{
   $('#AddModal').modal('hide');
    $('#myModal').modal('hide');
}

function onlyNumber(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
        {
            return false;
        }

        return true;
      }

    

      var table = $('#data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
      url: "{{ route('offers.data.get') }}",
      type: 'POST',
      data: function (d) {
        d._token = '{{ csrf_token() }}';
        d.status = $('#status').val();
        d.scroll = $('#is_scroll').val();
      }
      },
      columns: [
      { data: null, name: 'srno', orderable: false, searchable: false },
      { data: 'head', name: 'head', searchable: true },
      { data: 'percent', name: 'percent' },
      { data: 'status', name: 'status' },
      { data: 'is_scroll', name: 'is_scroll' },
      { data: 'action', name: 'action', orderable: false, searchable: false },
      ],

      rowCallback: function (row, data, index) {
      var pageInfo = table.page.info();
      $('td:eq(0)', row).html(pageInfo.start + index + 1);
      }
    })

    $("#status").change(function () {
      table.draw();
    });

    $("#is_scroll").change(function () {
      table.draw();
    });

    $(document).ready(function () {  table.ajax.reload(); });

    function change_status(mode, id) {
            $.ajax({
            url: "{{ route('offers.change.status') }}",  // The route you defined
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",   // CSRF token for security
                id: id,
                mode: mode
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.success);
                    table.ajax.reload();
                }
            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
                console.log("Status: " + status);
                console.dir(xhr);
            }
        });
    }

  </script>
@endpush

@push('style')
  <style>
    .mt20_n_b1 {
    margin-top: 20px;
    border-top: 1px solid black;
    }
  </style>
  <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" rel="stylesheet">
@endpush
