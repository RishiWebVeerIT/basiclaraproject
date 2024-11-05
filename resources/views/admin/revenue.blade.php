@extends('layouts.admin')
@section('section')

<section class="section">
  <div class="card" style="padding: 10px">
    <h5 class="card-title2">Total Revenue : Rs. {{number_format($grand_total_amount,2)}}
    <br> <br>Filtered Revenue : <span id="fitered_amount"></span> </h5>
    <div class="col-sm-12 row">

    <div class="col-md-2">
          <label for="pay_mode" class="form-label">Pay Mode</label>
          <select id="pay_mode" class="form-select" name="pay_mode">
          <option value="">All</option>
            <option value="cash">Cash</option>
            <option value="card">Card</option>
            <option Value="upi">UPI</option>
          </select>
        </div>

        <div class="col-md-2">
          <label for="pay_method" class="form-label">Pay Method</label>
          <select id="pay_method" class="form-select" name="pay_method">
          <option value="">All</option>
            <option value="cash">Cash</option>
            <optgroup label="UPI Methods">
              <option value="phonepe">PhonePe</option>
              <option value="gpay">Google Pay (GPay)</option>
              <option value="paytm">Paytm</option>
              <option value="amazonpay">Amazon Pay</option>
              <option value="bhim">BHIM</option>
              <option value="mobikwik">MobiKwik</option>
              <option value="freecharge">Freecharge</option>
              <option value="airtelpaymentsbank">Airtel Payments Bank</option>
              <option value="jio">Jio Money</option>
              <option value="icicibankimobile">ICICI Bank iMobile</option>
              <option value="yono">SBI YONO</option>
              <option value="axisbankbuzz">Axis Bank Buzz</option>
              <option value="olamoney">Ola Money</option>
            </optgroup>
            <!-- .................................................... -->
            <optgroup label="Credit Cards">
              <option value="visa-credit">Visa Credit Card</option>
              <option value="mastercard-credit">MasterCard Credit Card</option>
              <option value="rupay-credit">RuPay Credit Card</option>
              <option value="amex-credit">American Express Credit Card</option>
              <option value="diners-club-credit">Diners Club Credit Card</option>
            </optgroup>
            <!-- .................................................... -->
            <optgroup label="Debit Cards">
              <option value="visa-debit">Visa Debit Card</option>
              <option value="mastercard-debit">MasterCard Debit Card</option>
              <option value="rupay-debit">RuPay Debit Card</option>
              <option value="maestro-debit">Maestro Debit Card</option>
            </optgroup>
            <!-- .................................................... -->
            <optgroup label="Prepaid Cards">
              <option value="visa-prepaid">Visa Prepaid Card</option>
              <option value="mastercard-prepaid">MasterCard Prepaid Card</option>
              <option value="rupay-prepaid">RuPay Prepaid Card</option>
            </optgroup>
          </select>
        </div>

        <div class="col-md-2">
          <label for="month" class="form-label">Filter Month</label>
          <select class="form-control" name="month" id="month">
            <option value="">All</option>
            @for($i = 01; $i <= 12; $i++)
                <option value="{{$i}}">{{date('M', strtotime('Dec' . ' + ' . $i . ' months'))}}</option>
            @endfor
          </select>
        </div>

        <div class="col-md-2">
          <label for="" class="form-label">Filter Year</label>
          <select class="form-control" name="year" id="year">
            <option value="">All</option>
            @for($i = 2023; $i <= (date('Y') + 2); $i++)
        <option value="{{$i}}">{{$i}}</option>
      @endfor
          </select>
        
        </div>
        <div class="col-md-2">
          <label for="date" class="form-label">Filter Date</label>
          <input type="date" class="form-control" id="date" name="date">
        </div>

        <div class="col-md-2">
          <label for="date" class="form-label">Received By</label>
          <select name="received_by" id="received_by" class="form-select">
          <option value="">All</option>
            @foreach ($users as $u)
            <option value="{{$u->id}}">{{$u->name}}</option>
            @endforeach
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
            <th scope="col">Receipt No.</th>
            <th scope="col">Member ID</th>
            <th scope="col">Member Name</th>
            <th scope="col">Of Ruppes</th>
            <th scope="col">Generated At</th>
            <th scope="col">Received By</th>
            <th scope="col">Pay Mode</th>
            <th scope="col">Pay Method</th>
            <th scope="col">Receipt</th>
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
      filter_amount();
      function filter_amount() {
    $.ajax({
      url: "{{ route('get.filter.revenue.data') }}",  // The route you defined
      type: "POST",
      data: {
      _token: "{{ csrf_token() }}",   // CSRF token for security
      pay_mode: $('#pay_mode').val(),
        pay_method: $('#pay_method').val(),
        date: $('#date').val(),
        received_by: $('#received_by').val(),
        year: $('#year').val(),
        month: $('#month').val(),
      },
      success: function (response) {
      if (response.amount) {
        $('#fitered_amount').html('Rs. '+response.amount);

      }
      },
      error: function (xhr, status, error) {
      console.log("Error: " + error);
      console.log("Status: " + status);
      console.dir(xhr);
      }
    });
    }


    var table = $('#data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
      url: "{{ route('revenue.data.get') }}",
      type: 'POST',
      data: function (d) {
        d._token = '{{ csrf_token() }}';
        d.pay_mode = $('#pay_mode').val();
        d.pay_method = $('#pay_method').val();
        d.date = $('#date').val();
        d.received_by = $('#received_by').val();
        d.year = $('#year').val();
        d.month = $('#month').val();
      }
      },
      columns: [
      { data: null, name: 'srno', orderable: false, searchable: false },
      { data: 'receipt_no', name: 'receipt_no' },
      { data: 'mem_id', name: 'mem_id' },
      { data: 'mem_name', name: 'mem_name' },
      { data: 'amount', name: 'amount', searchable: true },
      { data: 'date', name: 'date' },
      { data: 'name', name: 'name' },
      { data: 'pay_mode', name: 'pay_mode' },
      { data: 'pay_method', name: 'pay_method' },
      { data: 'action', name: 'action', orderable: false, searchable: false },
      ],

      rowCallback: function (row, data, index) {
      var pageInfo = table.page.info();
      $('td:eq(0)', row).html(pageInfo.start + index + 1);
      }
    });

    $("#pay_mode").change(function () {
      table.draw();
      filter_amount();
    });
    $("#pay_method").change(function () {
      table.draw();
      filter_amount();
    });
    $("#date").change(function () {
      table.draw();
      filter_amount();
    });
    $("#received_by").change(function () {
      table.draw();
      filter_amount();
    });
    $("#year").change(function () {
      table.draw();
      filter_amount();
    });
    $("#month").change(function () {
      table.draw();
      filter_amount();
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

    .card-title2 {
    padding: 20px 0 15px 0;
    font-size: 18px;
    font-weight: 500;
    color: #012970;
    font-family: "Poppins", sans-serif;
}
  </style>
  <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" rel="stylesheet">
@endpush
