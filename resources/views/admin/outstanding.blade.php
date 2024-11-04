@extends('layouts.admin')
@section('section')

<section class="section">

  <div class="card">
    <div class="card-body">
      <form class="row g-3 needs-validation" method="post" action="{{route('admin.pay.outstanding')}}"
        enctype='multipart/form-data' id="MemberForm">
        @csrf

        <h5 class="card-title">{{$bills[0]->name}} - Membership Plan Details</h5>

        <div class="col-md-3">
          <label for="inputPckage" class="form-label">Membership Package</label>
         <input type="text" value="{{$bills[0]->package}}" readonly class="form-control">
         <input type="hidden" value="{{$account_no}}" name="account_no">
        </div>
        <div class="col-md-3">
          <label for="inputType" class="form-label">Membership Type</label>
          <input type="text" value="{{$bills[0]->type}}" readonly class="form-control">
        </div>
        <div class="col-md-3">
          <label for="inputPckage" class="form-label">Month</label>
         <input type="text" value="{{$bills[0]->month}}" readonly class="form-control">
        </div>
        <div class="col-md-3">
          <label for="inputType" class="form-label">Year</label>
          <input type="text" value="{{$bills[0]->year}}" readonly class="form-control">
        </div>
    
        <div class="col-sm-12">
        <table class="table table-bordered text-center mt20_n_b1" id="dynamicTable">
                        <thead>
                            <tr>
                            <th>Sr</th>
                            <th>Fee Head</th>
                            <th>Amount</th>
                            @if($bills[0]->discount != '')
                            <th>Amount (with Discount {{$bills[0]->discount}} %)</th>
                            @endif
                            <th>Paid</th>
                            <th>Remaining</th>
                            <th>Pay</th>
                        </tr>
                         </thead>
                        <tbody id="result">
                          <?php $i = 1; ?>
                          @foreach ($bills as $b)
                            <tr>
                              <td>{{ $i++ }}</td>
                              <td>{{$b->head}}</td>
                              <td>{{$b->amount}}</td>
                              @if($bills[0]->discount != '')
                              <td>{{$b->after_discount_amount}}</td>
                              @endif
                              <td>{{$b->paid_amount}}</td>
                              <td>{{$b->outstanding}}</td>
                              <td><input type="text" name="pay[]" class="form-control pay_total" value="{{$b->outstanding}}" @if($b->outstanding <= 0) readonly @else required @endif></td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
        </div>
        <div>
          <button type="button" id="calculate" class="btn btn-success float-right">Calculate</button>
        </div>
        <div class="col-md-3">
          <label for="inputTotal" class="form-label">Total Amount</label>
          <input type="text" placeholder="0.00" class="form-control" id="inputTotal" name="total_amount"
            value="{{ $bills[0]->total_amount }}" readonly>
          @error('total_amount')
        <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>
        <div class="col-md-3">
          <label for="inputdiscount" class="form-label">Discount %</label> <span class="text-success" id="discount_value"></span>
          <input list="discounts" name="discount" class="form-control" value="{{ $bills[0]->discount }}" id="inputdiscount" readonly>
          <datalist id="discounts">
            @foreach ($offers as $o)
        <option value="{{$o->percent}}">{{$o->head}}</option>
      @endforeach
          </datalist>
          @error('discount')
        <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>
        <div class="col-md-3">
          <label for="inputpayable" class="form-label">Payable</label>
          <input type="text" placeholder="0.00" class="form-control" id="inputpayable" name="payable_amount"
            value="{{ $bills[0]->payable_amount }}" readonly>
          @error('payable_amount')
        <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>
        <div class="col-md-3">
          <label for="inputPaid" class="form-label">Paid</label>
          <input type="text" placeholder="0.00" class="form-control" id="inputPaid"
            onkeypress="return onlyNumber(event)" name="paid_amount" value="{{ $bills[0]->total_paid_amount }}" readonly>
          @error('paid_amount')
        <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>
        <div class="col-md-3">
          <label for="inputoutstanding" class="form-label">Outstanding</label>
          <input type="text" placeholder="0.00" class="form-control" id="inputoutstanding" name="balance_amount"
            value="{{ $bills[0]->balance_amount }}" readonly>
          @error('balance_amount')
        <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>

        <div class="col-md-3">
          <label for="inputcurentlypaying" class="form-label">Current Pay Amount</label>
          <input type="text" placeholder="0.00" class="form-control" id="inputcurentlypaying" name="current_pay_amount"  readonly>
          @error('balance_amount')
        <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>

        <div class="col-md-3">
          <label for="inputRemaining" class="form-label">Remaining</label>
          <input type="text" placeholder="0.00" class="form-control" id="inputRemaining" name="remaining_amount" readonly>
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
          <button type="submit" class="btn btn-success">Pay</button>
        </div>
      </form><!-- End Multi Columns Form -->

    </div>
  </div>
</section>
<!-- Model of new row -->
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

    $(document).ready(function () { calculate(); } );

    function calculate() {

    let total = 0;
    $('.pay_total').each(function () {
      let value = parseFloat($(this).val()) || 0; // default to 0 if input is empty
      total += value;
    });
    $('#inputcurentlypaying').val(total);
    let t = {{ $bills[0]->balance_amount }} - total;
    $('#inputRemaining').val(t);
    }

    function onlyNumber(event) {
    var angka = (event.which) ? event.which : event.keyCode
    if (angka != 46 && angka > 31 && (angka < 48 || angka > 57)) {
      return false;
    }

    return true;
    }
  </script>
@endpush
