@extends('layouts.admin')
@section('section')

<section class="section">
<div class="card">
            <div class="card-body pd-10" id="dtble">
            <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Contact No.</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact At</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($enquiry as $e)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$e->name}} @if($e->new) <span class="badge rounded-pill bg-info">New</span> @endif</td>
                    <td>{{$e->age}}</td>
                    <td>{{$e->mobile}}</td>
                    <td>{{$e->address}}</td>
                    <td>{{date('d-F-Y ',strtotime($e->created_at))}}</td>
                    <td><a href="{{route('admin.continue_member',[$e->id])}}" class="btn btn-success">+</a>
                   </td>

                  </tr>
                  @endforeach
                </tbody>
            </table>
</div>
</div>
</section>

@endsection