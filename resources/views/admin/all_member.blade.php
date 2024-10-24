@extends('layouts.admin')
@section('section')

<section class="section">
  <div class="card" style="padding: 10px">
    <!-- <h5 class="card-title">Filters</h5> -->
    <div class="col-sm-12 row">

      <div class="col-md-2">
        <label for="" class="form-label">Filter Status</label>
        <select name="status" id="Status" class="form-control">
          <option value="">Select</option>
          <option value="1">Active</option>
          <option value="0">Expired</option>
        </select>
      </div>

      <div class="col-md-2">
        <label for="" class="form-label">Filter Gender</label>
        <select name="gender" id="gender" class="form-control">
          <option value="">Select</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>
      </div>

    </div>
  </div>
  <div class="card" style="padding: 10px">
    <div class="card-body pd-10" style="overflow-x:auto;">
      <table class="table table-bordered text-center mt20_n_b1 table-striped" id="data-table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Sex</th>
            <th scope="col">Contact No.</th>
            <th scope="col">Address</th>
            <th scope="col">Join-Date</th>
            <th scope="col">Membership</th>
            <th scope="col">Due Date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
</section>

@endsection
@push('script')
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">

    $(document).ready(function () {

    var table = $('#data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
      url: "{{ route('data.get') }}",
      type: 'POST',
      data: function (d) {
        d._token = '{{ csrf_token() }}';
        d.status = $('#Status').val();
        d.gender = $('#gender').val();
      }
      },
      columns: [
      { data: null, name: 'srno', orderable: false, searchable: false },
      { data: 'id', name: 'id' },
      { data: 'name', name: 'name', searchable: true },
      { data: 'age', name: 'age' },
      { data: 'gender', name: 'gender' },
      { data: 'mobile', name: 'mobile' },
      { data: 'address', name: 'address' },
      { data: 'join_date', name: 'join_date' },
      { data: 'membership_status', name: 'membership_status' },
      { data: 'due_date', name: 'due_date' },
      { data: 'action', name: 'action', orderable: false, searchable: false },
      ],

      rowCallback: function (row, data, index) {
      var pageInfo = table.page.info();
      $('td:eq(0)', row).html(pageInfo.start + index + 1);
      }
    });

    $("#Status").change(function () {
      table.draw();
    });

    $("#gender").change(function () {
      table.draw();
    });

    });
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