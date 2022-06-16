@extends('layouts.app')



@section('content')

<div class="container">
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Product</h2>
        </div>

    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<br>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Product</th>
        <th>Category</th>
        <th>Image</th>
        <th>Created By</th>
        <th>Active</th>
    </tr>


    @foreach($data as $key => $value)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $value->pname }}</td>
        <td>{{ $value->catid }}</td>

        <td><img src=" {{ asset('public/images/' . $value->image)}}" width="160" height="80"></td>
        <td>{{ $value->createby}}</td>
        <td>{{ $value->active}}</td>
    </tr>
    @endforeach
</table>

</div>
@endsection