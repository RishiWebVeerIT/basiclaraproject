@extends('layouts.master')
@section('section')
<h3 class="mb-t-b-30">Add Services</h3><br><br>
<div class="bg-light shadow pd-60px" >
@include('errnotify.error')
<form action="{{route('admin.services.update',$data->id)}}" method="POST"  enctype="multipart/form-data">
    @csrf
    <div>
        <div class="form-group">
            <label class="text-dark h5"><span class="text-danger">*</span>Title : </label>
            <input type="text" name="title" value="{{$data->title}}" class="form-control mb-3" placeholder="Title" required>
        </div>
        <div class="form-group">
            <label class="text-dark h5"><span class="text-danger">*</span>Icon : </label>
            <small class="text-danger">Please Add Font Awesome 4/5 Icons</small>
            <input type="text" name="icon" value="{{$data->logo}}" class="form-control mb-3" placeholder="icon" required>
        </div>
        <div class="mb-3">
            <label class="form-label text-dark h5">Add Image</label>
            <input class="form-control" name="image" type="file" accept="image/*" onchange="loadFile(event)">
          </div>
        <div class="profile-pic" style="overflow: hidden">
            <img src="{{URL('storage/app')}}/{{$data->image}}" id="output" width="400" />
          </div>
          <div class="form-group">
            <label class="text-dark h5"><span class="text-danger">*</span>Thum Into Text : </label>
            <input type="text" name="thumb_content" value="{{$data->thumb_content}}" class="form-control mb-3" placeholder="Title" required>
        </div>
          <div class="form-group">
            <label for="description" class="text-dark h5"><span class="text-danger">*</span>Content</label>
            <textarea class="form-control" name="content" rows="8" cols="50" required>{{$data->content}}</textarea>
        </div>
    </div>
    <button type="submit" class="btn add-btn btn-primary" style="float: right">Add</button>
</form>
</div>
<br><br><br>
@php $services = App\Models\Services::All(); $i = 1;@endphp
@if(count($services) > 0)

<h3 class="mb-t-b-30">All Services</h3><br><br>
<div class="bg-light shadow pd-60px" style="overflow-x:auto;">

    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="th-sm">SR. NO.
            </th>
            <th class="th-sm">ICON
            </th>
            <th class="th-sm">IMAGE
            </th>
            <th class="th-sm">TTITLE
            </th>
            <th class="th-sm">ABOUT
            </th>
            <th class="th-sm">ACTION
            </th>
          </tr>
        </thead>
        <tbody>
          @forelse ($services as $data)
          <tr>
              <td><p class="center">{{$i}}</p></td>
              <td >{!! $data->logo !!}</td>
              <td ><img src="{{URL('storage/app')}}/{{$data->image}}" alt="{{$data->slug.'-image'}}" width="100px;" height="100px;"></td>
              <td >{{$data->title}}</td>
              <td >{{ Str::limit($data->content, 40) }}</td>
              <td >
                <a href="{{route('admin.services.update.form',$data->id)}}" role="button" class="btn btn-info"><i class="fa fa-sharp fa-regular fa-pen-to-square"></i>&nbsp;Edit</a>&nbsp;&nbsp;
                <a href="{{route('admin.services.delete',$data->id)}}" role="button" class="btn btn-danger"><i class="fa fa-solid fa-trash"></i>&nbsp;Delete</a>
              </td>
            </tr>
          @php $i++; @endphp
          @empty
              No Data Found
          @endforelse
        </tbody>
        <tfoot>
          <tr>
              <th>SR. NO.
              </th>
              <th>ICON
              </th>
              <th>IMAGE
              </th>
              <th>TITLE
              </th>
              <th>ABOUT
              </th>
              <th>ACTION
            </th>
          </tr>
        </tfoot>
      </table>
</div>
@endif
@endsection
@push('style')
    <style>
.center{
    vertical-align: middle;

}
    </style>
@endpush

@push('script')
<script type="text/javascript">
    CKEDITOR.replace( 'content' );
</script>
@endpush
