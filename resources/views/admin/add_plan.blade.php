@extends('layouts.admin')
@section('section')

<section class="section">
  <div class="card">
    <div class="card-body">
    <h5 class="card-title">Add Membership Plan</h5>

      <!-- Multi Columns Form -->

      <form class="row g-3 needs-validation" method="post" action="{{route('admin.add_plan')}}"
        enctype='multipart/form-data' id="MemberForm">
        @csrf

        <h5 class="card-title pl-2"> Member Name : {{$member->name}}</h5>
        <input type="hidden" value="{{$member->id}}" name="member_id">

        <div class="col-md-4">
          <label for="inputPckage" class="form-label">Membership Package</label>
          <select id="inputPackage" class="form-select" name="package">
            <option value="1 Month" selected>1 Month</option>
            <option value="3 Month">3 Month</option>
            <option value="6 Month">6 Month</option>
            <option value="9 Month">9 Month</option>
            <option value="12 Month">12 Month</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="inputType" class="form-label">Membership Type</label>
          <select id="inputType" class="form-select" name="type">
            <option value="General Membership" selected>General Membership</option>
            <option value="Couple Offer">Couple Offer</option>
            <option value="Ladies Batch Offer">Ladies BAtch Offer</option>
            <option value="Student Offer">Student Offer</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="inputdate5" class="form-label">Start Date</label>
          <input type="date" class="form-control" id="inputdate5" value="{{date('Y-m-d')}}" name="join_date" required>
        </div>
        <div>
          <button type="button" id="addRow" class="btn btn-primary float-right">Add Heads</button>
        </div>

        <div class="col-sm-12">
        <table class="table table-bordered text-center mt20_n_b1" id="dynamicTable">
                        <thead>
                            <tr>
                            <th>Sr</th>
                            <th>Fee Head</th>
                            <th>Fee Amount</th>
                            <th>Fee Pay</th>
                            <th>Remove</th>
                        </tr>
                         </thead>
                        <tbody id="result">

                        </tbody>
                      </table>
        </div>
        <div>
          <button type="button" id="calculate" class="btn btn-success float-right">Calculate</button>
        </div>
        <div class="col-md-4">
          <label for="inputTotal" class="form-label">Total Amount</label>
          <input type="text" placeholder="0.00" class="form-control" id="inputTotal" name="total_amount"
            value="{{ old('total_amount') }}" readonly>
          @error('total_amount')
        <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>
        <div class="col-md-4">
          <label for="inputdiscount" class="form-label">Discount %</label> <span class="text-success" id="discount_value"></span>
          <input list="discounts" name="discount" class="form-control" id="inputdiscount">
          <datalist id="discounts">
            @foreach ($offers as $o)
        <option value="{{$o->percent}}">{{$o->head}}</option>
      @endforeach
          </datalist>
          @error('discount')
        <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>
        <div class="col-md-4">
          <label for="inputpayable" class="form-label">Payable Amount</label>
          <input type="text" placeholder="0.00" class="form-control" id="inputpayable" name="payable_amount"
            value="{{ old('payable_amount') }}" readonly>
          @error('payable_amount')
        <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>
        <div class="col-md-3">
          <label for="inputPaid" class="form-label">Paid Amount</label>
          <input type="text" placeholder="0.00" class="form-control" id="inputPaid"
            onkeypress="return onlyNumber(event)" name="paid_amount" value="{{ old('paid_amount') }}">
          @error('paid_amount')
        <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>
        <div class="col-md-3">
          <label for="inputRemaining" class="form-label">Remaining Amount</label>
          <input type="text" placeholder="0.00" class="form-control" id="inputRemaining" name="balance_amount"
            value="{{ old('balance_amount') }}" readonly>
          @error('balance_amount')
        <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>
        <div class="col-md-3">
          <label for="inputMode" class="form-label">Pay Mode</label>
          <select id="inputMode" class="form-select" name="pay_mode">
            <option value="cash" selected>Cash</option>
            <option value="card">Card</option>
            <option Value="upi">UPI</option>
          </select>
        </div>

        <div class="col-md-3">
          <label for="inputMethod" class="form-label">Pay Method</label>
          <select id="inputMethod" class="form-select" name="pay_method">
            <option value="cash" selected>Cash</option>
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


        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->

    </div>
  </div>
</section>
<!-- Model of new row -->
<table id="new-row-model" style="display: none"> 
    <tbody>
    <tr>
              <td class="sr-no"></td>
                <td><input type="text" name="heads[]"  class="form-control heads_total" required></td>
                <td><input type="text" name="amount[]"  class="form-control amount_total" required></td>
                <td><input type="text" name="paid[]" class="form-control paid_total" required></td>
                <td><button class="removeRow btn btn-danger"> X </button></td>
      </tr>
    <tbody>
</table>
@endsection
@push('style')
  <style>
    .form-control:disabled,
    .form-control[readonly] {
    background-color: unset !important;
    opacity: 1;
    }
  </style>

@endpush
@push('script')
  <script>
    $('#MemberForm').submit(function() {
      calculate();
      return true;
});

    $('#calculate').click(function () {
    calculate();
    });

    function calculate() {

    let total = 0;
    $('.amount_total').each(function () {
      let value = parseFloat($(this).val()) || 0; // default to 0 if input is empty
      total += value;
    });
    $('#inputTotal').val(total);

    let paidtotal = 0;
    $('.paid_total').each(function () {
      let value2 = parseFloat($(this).val()) || 0; // default to 0 if input is empty
      paidtotal += value2;
    });
    $('#inputPaid').val(paidtotal);

     account();

    }
    $(document).ready(function () {

    $('#addRow').click(function () {
      // var newRow = $('#templateRow').find('tr').clone();
      // $('#dynamicTable tbody').append(`<tr>
      //         <td class="sr-no"></td>
      //           <td><input type="text" name="heads[]"  class="form-control heads_total" required></td>
      //           <td><input type="text" name="amount[]"  class="form-control amount_total" required></td>
      //           <td><input type="text" name="paid[]" class="form-control paid_total" required></td>
      //           <td><button class="removeRow btn btn-danger"> X </button></td>
      //         </tr>`);

              var new_row = $("#new-row-model tbody").clone();
    $("#dynamicTable tbody").append(new_row.html());
      updateSerialNumbers();
    });
    });

    function onlyNumber(event) {
    var angka = (event.which) ? event.which : event.keyCode
    if (angka != 46 && angka > 31 && (angka < 48 || angka > 57)) {
      return false;
    }

    return true;
    }

    $("#inputRefferedBy").change(function () {
    if ($('#inputRefferedBy').val() == 1) {
      $('#reffer_id').show();
      $('#reffer_name').hide();
    } else if ($('#inputRefferedBy').val() == 0) {
      $('#reffer_name').show();
      $('#reffer_id').hide();
    }

    });

    $(document).on('click', '.removeRow', function () {
    $(this).closest('tr').remove();
    updateSerialNumbers();
    calculate();
    });

    function updateSerialNumbers() {
    $('#dynamicTable tbody tr').each(function (index) {
      $(this).find('.sr-no').text(index + 1);
      $(this).find('td:eq(2) input').attr('id', 'total_id_' + index);
      $(this).find('td:eq(3) input').attr('id', 'paid_id_' + index);
    });
    rowIndex = $('#dynamicTable tbody tr').length;
    }


    function updateDiscountAmount() {
    $('#dynamicTable tbody tr').each(function (index) {
      $baseamt = $('#total_id_' + index).val();
      $discount = $('#inputdiscount').val();
      $discountVal = $baseamt - (($baseamt * $discount) / 100);
      $('#paid_id_' + index).val($discountVal);
    });
    account();
    }

    function account() {

      if( $('#inputdiscount').val() == '')
      {
        $percent = 0;
      }else{
        $percent = $('#inputdiscount').val() ;
      }
    $total = $('#inputTotal').val();
    $paid = $('#inputPaid').val();
    $discount = $percent;
    $discountVal = ((parseInt($total) * parseInt($discount)) / 100);
    $payble = (parseInt($total) - parseInt($discountVal));

    if( $('#inputdiscount').val() != '')
      {
        $('#discount_value').text('Total Discount '+parseInt($discountVal)+' ₹');
      }

    if (isNaN($payble)) {
      $('#inputpayable').val("0.00");
    } else {
      $('#inputpayable').val($payble);
    }

    $remaining = (parseInt($payble) - parseInt($paid));

    if (isNaN($remaining)) {
      $('#inputRemaining').val("0.00");
    } else {
      $('#inputRemaining').val($remaining);
    }
    }

    $("#inputTotal").change(function () {
    account();
    });
    $("#inputPaid").change(function () {
    account();
    });
    $("#inputdiscount").change(function () {
      updateDiscountAmount()
    calculate();
    });

    $('#inputPackage').change(function () {
  
    allot_fee_structure();
    });

    $('#inputType').change(function () {

    allot_fee_structure();
    });

    $(document).ready(function () {
    allot_fee_structure();
    });


    function allot_fee_structure() {
      $('#result').html('');
    $.ajax({
      url: "{{ route('admin.allot.fees.structure') }}",  // The route you defined
      type: "POST",
      data: {
      _token: "{{ csrf_token() }}",   // CSRF token for security
      package: $('#inputPackage').val(),
      membership_type: $('#inputType').val(),
      },
      success: function (response) {
      if (response.table) {
        $('#result').html(response.table);
        calculate();
        updateSerialNumbers();
      }
      },
      error: function (xhr, status, error) {
      console.log("Error: " + error);
      console.log("Status: " + status);
      console.dir(xhr);
      }
    });
    }
  </script>
@endpush