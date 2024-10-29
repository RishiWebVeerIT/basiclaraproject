@extends('layouts.admin')
@section('section')

<section class="section">

    <div class="card" style="padding: 10px">
        <div class="d-grid gap-2 d-md-flex justify-content-between">
            <h5 class="card-title">All Fee Heads</h5>
            <div class="d-flex align-items-center">
<button type="button" class="btn btn-primary" onclick="AddModal()">Add Fees Head</button>
            </div>

        </div>

        <div class="col-sm-12 row">

      <div class="col-md-2">
        <label for="" class="form-label">Filter Year</label>
        <select  class="form-control" name="year" id="year">
            <option value="">All</option>
                    @for($i = 2023; $i <= (date('Y')+2); $i++)
                    <option value="{{$i}}" @if(date('Y') == $i) selected @endif >{{$i}}</option>
                    @endfor
                  </select>

      </div>
      <div class="col-md-4">
        <label for="" class="form-label">Filter Package</label>
        <select id="package" class="form-select">
                    <option value="">All</option>
                    <option value="1 Month">1 Month</option>
                    <option value="3 Month">3 Month</option>
                    <option value="6 Month">6 Month</option>
                    <option value="9 Month">9 Month</option>
                    <option value="12 Month">12 Month</option>
                  </select>
      </div>
      <div class="col-md-4">
        <label for="" class="form-label">Filter Membership Type</label>
                  <select id="type" class="form-select">
                    <option value="">All</option>
                    <option value="General Membership">General Membership</option>
                    <option value="Couple Offer">Couple Offer</option>
                    <option value="Ladies Batch Offer">Ladies Batch Offer</option>
                    <option value="Student Offer">Student Offer</option>
                  </select>
      </div>

    </div>
    <div class="card-body pd-10" style="overflow-x:auto;">

      <table class="table table-bordered text-center mt20_n_b1 table-striped" id="data-table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Head</th>
            <th scope="col">Amount</th>
            <th scope="col">Year</th>
            <th scope="col">Package</th>
            <th scope="col">M. Type</th>
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
                <h5 class="modal-title" id="myModalLabel">Add Fee Head</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" method="post" action="{{route('admin.add.fees.structure')}}" enctype='multipart/form-data'>
                @csrf
                <div class="col-md-8">
                  <label for="inputName5" class="form-label">Fee Head <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="head" id="inputName5" value="{{ old('name') }}" placeholder="Head" required>
                      @error('head')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                </div>

                <div class="col-md-4">
                  <label for="inputPaid" class="form-label">Amount<span class="text-danger">*</span></label>
                  <input type="text" placeholder="0.00" class="form-control" id="inputPaid" onkeypress="return onlyNumber(event)" name="amount" value="{{ old('amount') }}" required>
                  @error('amount')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                </div>


                <div class="col-md-8">
                  <label for="inputdescription5" class="form-label">Description</label>
                  <input type="text" class="form-control" name="description" id="inputdescription5" value="{{ old('description') }}" placeholder="Description">
                </div>

                <div class="col-md-4">
                  <label for="inputyear5" class="form-label">For Year</label>
                  <select  class="form-control" name="year" id="inputyear5">
                    @for($i = 2023; $i <= (date('Y')+2); $i++)
                    <option value="{{$i}}" @if(date('Y') == $i) selected @endif >{{$i}}</option>
                    @endfor
                  </select>
                </div>

                 <div class="col-md-6">
                  <label for="inputPckage" class="form-label">Membership Package</label>
                  <select id="inputPckage" class="form-select" name="package">
                    <option value="1 Month" selected>1 Month</option>
                    <option value="3 Month">3 Month</option>
                    <option value="6 Month">6 Month</option>
                    <option value="9 Month">9 Month</option>
                    <option value="12 Month">12 Month</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="inputType" class="form-label">Membership Type</label>
                  <select id="inputType" class="form-select" name="type">
                    <option value="General Membership" selected>General Membership</option>
                    <option value="Couple Offer">Couple Offer</option>
                    <option value="Ladies Batch Offer">Ladies Batch Offer</option>
                    <option value="Student Offer">Student Offer</option>
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
                <div class="row g-3 needs-validation">
                @csrf
                <div class="col-md-8">
                  <label for="inputName5" class="form-label">Fee Head <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="head" id="editinputName5" value="{{ old('name') }}" placeholder="Head" required>
                      @error('head')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                </div>

                <div class="col-md-4">
                  <label for="inputPaid" class="form-label">Amount<span class="text-danger">*</span></label>
                  <input type="text" placeholder="0.00" class="form-control" id="editinputPaid" onkeypress="return onlyNumber(event)" name="amount" value="{{ old('amount') }}" required>
                  @error('amount')
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
                    @for($i = 2023; $i <= (date('Y')+2); $i++)
                    <option value="{{$i}}" @if(date('Y') == $i) selected @endif >{{$i}}</option>
                    @endfor
                  </select>

                  <input type="hidden" name="editid" id="edit_id">

                </div>

                 <div class="col-md-6">
                  <label for="inputPckage" class="form-label">Membership Package</label>
                  <select id="editinputPckage" class="form-select" name="package">

                    <option value="1 Month">1 Month</option>
                    <option value="3 Month">3 Month</option>
                    <option value="6 Month">6 Month</option>
                    <option value="9 Month">9 Month</option>
                    <option value="12 Month">12 Month</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="inputType" class="form-label">Membership Type</label>
                  <select id="editinputType" class="form-select" name="type">

                    <option value="General Membership">General Membership</option>
                    <option value="Couple Offer">Couple Offer</option>
                    <option value="Ladies Batch Offer">Ladies Batch Offer</option>
                    <option value="Student Offer">Student Offer</option>
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



    var table = $('#data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
      url: "{{ route('feehead.data.get') }}",
      type: 'POST',
      data: function (d) {
        d._token = '{{ csrf_token() }}';
        d.year = $('#year').val();
        d.package = $('#package').val();
        d.type = $('#type').val();
      }
      },
      columns: [
      { data: null, name: 'srno', orderable: false, searchable: false },
      { data: 'head', name: 'head', searchable: true },
      { data: 'price', name: 'price' },
      { data: 'year', name: 'year' },
      { data: 'package', name: 'package' },
      { data: 'membership_type', name: 'membership_type' },
      { data: 'action', name: 'action', orderable: false, searchable: false },
      ],

      rowCallback: function (row, data, index) {
      var pageInfo = table.page.info();
      $('td:eq(0)', row).html(pageInfo.start + index + 1);
      }
    })

    $("#year").change(function () {
      table.draw();
    });

    $("#package").change(function () {
      table.draw();
    });

    $("#type").change(function () {
      table.draw();
    });

 $(document).ready(function () {  table.ajax.reload(); });

       function onlyNumber(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
        {
            return false;
        }

        return true;
      }

      function is_delete(id) {
            $.ajax({
            url: "{{ route('admin.delete.fees.structure') }}",  // The route you defined
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",   // CSRF token for security
                id: id,
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

        function openModalButton(id) {
            $('#myModal').modal('show');

            $.ajax({
            url: "{{ route('admin.get.fees.structure') }}",  // The route you defined
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",   // CSRF token for security
                id: id,
            },
            success: function(response) {
                if (response.data) {
                     $('#editinputName5').val(response.data.head);

            $('#editinputPaid').val(response.data.price);

            $('#editinputyear5').val(response.data.year);

            $('#editinputdescription5').val(response.data.description);
                $('#edit_id').val(response.data.id);

                $('#editinputPckage').val(response.data.package);
                $('#editinputType').val(response.data.membership_type);
                }

            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
                console.log("Status: " + status);
                console.dir(xhr);
            }
        });

        }

        function save_update()
        {
            let head = $('#editinputName5').val();
            let price = $('#editinputPaid').val();
            let year = $('#editinputyear5').val();
            let description = $('#editinputdescription5').val();
            let id = $('#edit_id').val();
            let package = $('#editinputPckage').val();
            let membership_type = $('#editinputType').val();

            $.ajax({
            url: "{{ route('admin.update.fees.structure') }}",  // The route you defined
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",   // CSRF token for security
                head:head,
                price:price,
                year:year,
                description:description,
                id:id,
                package:package,
                membership_type:membership_type,
            },
            success: function(response) {
                if (response.data) {
                    toastr.success(response.data);
                    table.ajax.reload();
                    $('#myModal').modal('hide');
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
