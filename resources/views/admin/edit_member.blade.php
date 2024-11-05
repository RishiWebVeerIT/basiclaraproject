@extends('layouts.admin')
@section('section')

<section class="section">
<div class="card">
  
            <div class="card-body">
        

              <div class="d-flex justify-content-between">
              <h5 class="card-title">Member Personal Details</h5>
              <h5 class="card-title">Member ID : {{$member->id}}</h5>
              <h5 class="card-title">Biometric ID : {{$member->biometric}}</h5>
              </div>
            
              <!-- Multi Columns Form -->
              <form class="row g-3" method="post" action="{{route('admin.update_member',[$member->id])}}" enctype='multipart/form-data'>
                @csrf
                <div class="col-md-8">
                  <label for="inputName5" class="form-label">Member Name</label>
                  <input type="text" class="form-control" name="name" value="{{$member->name}}" id="inputName5" placeholder="Name">
                </div>
                <div class="col-md-4">
                  <label for="inputdate5" class="form-label">Joinining Date</label>
                  <input type="date" class="form-control" id="inputdate5" value="{{date('Y-m-d',strtotime($member->join_date))}}" name="join_date" required>
                </div>
           
                <div class="col-md-3">
                  <label for="inputMobile5" class="form-label">Mobile No.</label>
                  <input type="text" class="form-control" id="inputMobile5" value="{{$member->mobile}}" name="mobile" placeholder="Mobile">
                </div>

                <div class="col-md-3">
                  <label for="inputaltmobile5" class="form-label">Alt Mobile No.</label>
                  <input type="text" class="form-control" id="inputaltmobile5" value="{{$member->alt_mobile}}" name="alt_mobile" placeholder="Alternate No.">
                </div>

                <div class="col-md-3">
                  <label for="inputEmail5" class="form-label">Email</label>
                  <input type="email" class="form-control" id="inputEmail5" name="email" value="{{$member->email}}" placeholder="E-Mail ID">
                </div>

                <div class="col-md-3">
                  <label for="inputdob" class="form-label">D.O.B</label>
                  <input type="date" class="form-control" id="inputdob" value="{{date('Y-m-d',strtotime($member->dob))}}" name="dob">
                </div>

                <div class="col-md-3">
                  <label for="inputGender" class="form-label">Gender</label>
                  <select id="inputGender" class="form-select" name="gender">
                    <option selected>Choose...</option>
                    <option value="Male" @if($member->gender == "Male") selected @endif >Male</option>
                    <option value="Female" @if($member->gender == "Female") selected @endif >Female</option>
                    <option value="Other" @if($member->gender == "Other") selected @endif >Other</option>
                  </select>
                </div>

                <div class="col-md-3">
                  <label for="inputPrebooked" class="form-label">Pre-Booked</label>
                  <select id="inputPrebooked" class="form-select" name="pre_booked">
                    <option value="0" @if($member->pre_booked == "0") selected @endif >No</option>
                    <option Value="1" @if($member->pre_booked == "1") selected @endif >Yes</option>
                  </select>
                </div>

                <div class="col-md-3">
                  <label for="inputRefferedBy" class="form-label">Reffer By</label>
                  <select id="inputRefferedBy" class="form-select" name="reference_type">
                    <option value="1"  @if($member->reference_type == "1") selected @endif >Existing Member</option>
                    <option Value="0"  @if($member->reference_type == "0") selected @endif >Outsider</option>
                  </select>
                </div>

                <div class="col-md-3" id="reffer_id">
                  <label for="inputreffereid" class="form-label" >Reffered ID</label>
                  <input type="text" class="form-control" id="inputreffereid" name="refference_id" value="{{$member->refference_id}}" placeholder="Existing Member ID">
                </div>

                <div class="col-md-3" id="reffer_name" style="display: none;">
                  <label for="inputreffername" class="form-label" >Reffered Name</label>
                  <input type="text" class="form-control" id="inputreffername" name="refference_name" value="{{$member->refference_name}}" placeholder="Referel Name">
                </div>


                <div class="col-md-12">
                  <label for="inputAddress5" class="form-label">Address</label>
                  <textarea class="form-control" id="inputAddres5s" placeholder="Address" name="address">{{$member->address}}</textarea>
                </div>
      
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>
</section>

<section class="section">
<div class="card">
            <div class="card-body">
            <div class="d-flex justify-content-between">

            <h5 class="card-title">Receipts</h5>
            <div>
            <a class="btn btn-primary" href="{{route('admin.upgrade',[$member->id])}}">Add New Membership Plan</a>
            </div>
              
              </div>
            
              <table class="table datatable">
                <thead>
                <tr>
                      <th>Sr. No</th>
                      <th>Plan</th>
                      <th>Membership</th>
                      <th>Month</th>
                      <th>Year</th>
                      <th>Total Amount</th>
                      <th>Paid</th>
                      <th>Outstanding</th>
                      <th>Expiry Date</th>
                      <th>Status</th>
                      <th>Receipt</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach($accounts as $r)
                    <tr>
                      <th>{{$i++}}</th>
                      <td>{{$r->package}}</td>
                      <td>{{$r->type}}</td>
                      <td>{{$r->month}}</td>
                      <td>{{$r->year}}</td>
                      <td> ₹ {{$r->payable_amount}}</td>
                      <td> ₹ {{$r->paid_amount}}</td>
                      <td> ₹ {{$r->balance_amount}}</td>
                      <td>{{date('d-m-Y', strtotime($r->due_date));}}</td>
                      <td>@if($r->membership_status) <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Active</span>@else<span class="badge bg-secondary"><i class="bi bi-exclamation-octagon me-1"></i>Expired</span>  @endif</td>
                      <td><a class="btn btn-success" href="{{route('admin.member.receipts',[$member->id,$r->id])}}">Receipts</a> &nbsp; @if($r->balance_amount > 0) <a class="btn btn-primary" href="{{route('admin.outstanding',[$r->id])}}">Pay Outstanding</a> @endif 
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    
              </table>
            </div>
          </div>
</section>

@endsection

@push('script')
<script>
  $( document ).ready(function() {

        if($('#inputRefferedBy').val() == 1)
        {
            $('#reffer_id').show();
            $('#reffer_name').hide();
        }else if($('#inputRefferedBy').val() == 0){
            $('#reffer_name').show();
            $('#reffer_id').hide();
        }
});
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
</script>
@endpush

