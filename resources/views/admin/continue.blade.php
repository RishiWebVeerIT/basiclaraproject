@extends('layouts.admin')
@section('section')

<section class="section">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Member Personal Details</h5>

              <!-- Multi Columns Form -->

              <form class="row g-3 needs-validation" method="post" action="{{route('admin.create_member')}}" enctype='multipart/form-data'>
                @csrf
                <div class="col-md-8">
                  <label for="inputName5" class="form-label">Member Name</label>
                  <input type="text" class="form-control" name="name" id="inputName5" value="{{$member->name }}" placeholder="Name">
                  @error('name')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                </div>
                <div class="col-md-4">
                  <label for="inputdate5" class="form-label">Joinining Date</label>
                  <input type="date" class="form-control" id="inputdate5" value="{{date('Y-m-d')}}" name="join_date" required>
                </div>
                

                <div class="col-md-3">
                  <label for="inputMobile5" class="form-label">Mobile No.</label>
                  <input type="text" class="form-control" id="inputMobile5" name="mobile" placeholder="Mobile" value="{{ $member->mobile }}">
                  @error('mobile')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                </div>

                <div class="col-md-3">
                  <label for="inputaltmobile5" class="form-label">Alt Mobile No.</label>
                  <input type="text" class="form-control" id="inputaltmobile5" name="alt_mobile" placeholder="Alternate No." value="{{ old('alt_mobile') }}">
                </div>

                <div class="col-md-3">
                  <label for="inputEmail5" class="form-label">Email</label>
                  <input type="email" class="form-control" id="inputEmail5" name="email" placeholder="E-Mail ID" value="{{ $member->email }}">
                  @error('email')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                </div>

                <div class="col-md-3">
                  <label for="inputdob" class="form-label">D.O.B</label>
                  <input type="date" class="form-control" id="inputdob" name="dob" value="{{ old('dob') }}">
                  @error('dob')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                </div>

                <div class="col-md-3">
                  <label for="inputGender" class="form-label">Gender</label>
                  <select id="inputGender" class="form-select" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                    @error('gender')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </select>
                </div>

                <div class="col-md-3">
                  <label for="inputPrebooked" class="form-label">Pre-Booked</label>
                  <select id="inputPrebooked" class="form-select" name="pre_booked">
                    <option value="0" selected>No</option>
                    <option Value="1" >Yes</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="inputRefferedBy" class="form-label">Reffer By</label>
                  <select id="inputRefferedBy" class="form-select" name="reference_type">
                    <option value="1" selected>Existing Member</option>
                    <option Value="0" >Outsider</option>
                  </select>
                </div>

                <div class="col-md-3" id="reffer_id">
                  <label for="inputreffereid" class="form-label" >Reffered ID</label>
                  <input list="refferid" type="text" class="form-control" id="inputreffereid" name="refference_id" placeholder="Existing Member ID">
                  <datalist id="refferid">
                    @foreach($members as $m)
                    <option value="{{$m->id}}">{{$m->name}}</option>
                    @endforeach
                  </datalist>
                </div>

                <div class="col-md-3" id="reffer_name" style="display: none;">
                  <label for="inputreffername" class="form-label" >Reffered Name</label>
                  <input type="text" class="form-control" id="inputreffername" name="refference_name" placeholder="Referel Name" value="{{ old('refference_name') }}" >
                </div>

                <div class="col-md-12">
                  <label for="inputAddress5" class="form-label">Address</label>
                  <textarea class="form-control" id="inputAddres5s" placeholder="Address" name="address">{{ $member->address }}</textarea>
                </div>
                
                <h5 class="card-title">Membership Plan Details</h5>

                

                <div class="col-md-4">
                  <label for="inputPckage" class="form-label">Membership Package</label>
                  <select id="inputPckage" class="form-select" name="package">
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
                  <label for="inputTotal" class="form-label" >Total Amount</label>
                  <input type="text" placeholder="0.00" class="form-control" id="inputTotal" onkeypress="return onlyNumber(event)" name="total_amount" value="{{ old('total_amount') }}">
                  @error('total_amount')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                </div>
                <div class="col-md-4">
                  <label for="inputdiscount" class="form-label">Discount Amount</label>
                  <input type="text" placeholder="0.00" class="form-control" id="inputdiscount" onkeypress="return onlyNumber(event)" name="discount" value="{{ old('discount') }}">
                  @error('discount')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                </div>
                <div class="col-md-4">
                  <label for="inputpayable" class="form-label">Payable Amount</label>
                  <input type="text" placeholder="0.00" class="form-control" id="inputpayable" name="payable_amount" value="{{ old('payable_amount') }}" readonly>
                  @error('payable_amount')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                </div>
                <div class="col-md-4">
                  <label for="inputPaid" class="form-label">Paid Amount</label>
                  <input type="text" placeholder="0.00" class="form-control" id="inputPaid" onkeypress="return onlyNumber(event)" name="paid_amount" value="{{ old('paid_amount') }}">
                  @error('paid_amount')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                </div>
                <div class="col-md-4">
                  <label for="inputRemaining" class="form-label">Remaining Amount</label>
                  <input type="text" placeholder="0.00" class="form-control" id="inputRemaining" name="balance_amount" value="{{ old('balance_amount') }}" readonly>
                  @error('balance_amount')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                </div>
                <div class="col-md-4">
                  <label for="inputMode" class="form-label">Pay Mode</label>
                  <select id="inputMode" class="form-select" name="pay_mode">
                    <option value="Cash" selected>Cash</option>
                    <option Value="Online" >Online</option>
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

@endsection

@push('script')
<script>
    function onlyNumber(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
        {
            return false;
        }

        return true;
      }

      $("#inputRefferedBy").change(function(){
        if($('#inputRefferedBy').val() == 1)
        {
            $('#reffer_id').show();
            $('#reffer_name').hide();
        }else if($('#inputRefferedBy').val() == 0){
            $('#reffer_name').show();
            $('#reffer_id').hide();
        }

  });

  function account()
        {
            $total =  $('#inputTotal').val();
           $paid = $('#inputPaid').val();
           $discount = $('#inputdiscount').val();

             $payble = (parseInt($total) - parseInt($discount));
             console.log('Payble '+$payble)

             if(isNaN($payble))
             {
                $('#inputpayable').val("0.00");
             }else{
               $('#inputpayable').val($payble);
               $('#inputPaid').val($payble);
              
             }
            
             $remaining = (parseInt($payble) - parseInt($paid));

             if(isNaN($remaining))
             {
                $('#inputRemaining').val("0.00");
             }else{
                $('#inputRemaining').val($remaining);
             }
        }

        $("#inputTotal").change(function(){
            account();
        });
        $("#inputPaid").change(function(){
            account();
        });
        $("#inputdiscount").change(function(){
            account();       
        });

</script>
@endpush

