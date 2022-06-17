@extends('layouts.app')
@section('content')
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Product</h2>
        </div>
        <div class="pull-right" style="float:right">
     
            <a class="btn btn-warning" href="product/create">Add New Product</a>
            <a class="btn btn-info" href="category">Category</a>
            <a class="btn btn-secondary" href="{{ route('admin.index') }}"> AdminList</a>
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
        <th width="280px">Action</th>
    </tr>
    <tbody id="tbody">
    @foreach($data as $key => $value)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $value->pname }}</td>
        <td>{{ $value->catid }}</td>
     
        <td><img src=" {{ asset('public/images/' . $value->image)}}" width="160" height="80"></td>
        <td>{{ $value->createby}}</td>
        <td>{{ $value->active}}</td>
        <td>
    
        <form action="{{ route('product.destroy',$value->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ route('product.edit',$value->id) }}">Edit</a>  
                @csrf
                @method('DELETE')   
                <button type="submit" class="btn btn-danger">Delete</button>
                
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>




    {!! $data->link() !!}
    </div>
@endsection