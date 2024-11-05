@extends('layouts.admin')
@section('section')

<section class="section">
<div class="card">
            <div class="card-body pd-10" id="dtble">
            <h5 class="card-title">All Relational Receipts</h5>
            <h5 class="card-title">
            <table>
                <tr>
                    <td><b>Member </b></td>
                    <td> : </td>
                    <td>{{$member->name}}</td>
                </tr>
                <tr>
                    <td><b>Package </b></td>
                    <td> : </td>
                    <td>{{$account->package}}</td>
                </tr>
                <tr>
                    <td><b>Membership </b></td>
                    <td> : </td>
                    <td>{{$account->type}}</td>
                </tr>
            </table>
            </h5>
            <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Receipt No</th>
                    <th scope="col">Of rupees</th>
                    <th scope="col">Receipt</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($receipts as $r)
                  <tr>
                    <th>{{$i++;}}</th>
                    <th>{{$r->receipt_no}}</th>
                    <th> ₹ {{$r->where('receipt_no',$r->receipt_no)->sum('paid_amount')}}</th>
                    <th><a href="{{route('admin.receipt',[$r->receipt_no])}}" class="btn btn-success">Receipt</a></th>
                  </tr>
                  @endforeach
                </tbody>
            </table>
</div>
</div>
</section>

@endsection
@push('style')
<style>
    .card-detail {
    font-size: 18px;
    font-family: "Poppins", sans-serif;
}
</style>
@endpush