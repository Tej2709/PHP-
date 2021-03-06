@extends('layouts.app')
@section('content')

<div class="container">
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Category</h2>
        </div>
        <div class="pull-right" style="float:right">
            <a class="btn btn-warning" href="category/create">Add New Category</a>
            <a class="btn btn-info" href="product">Product list</a>
            <a class="btn btn-danger" href="{{ route('admin.index') }}"> Back</a>
        </div>
    </div>
</div>
<div id="msg">
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
</div>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Category</th>
        <th>Active</th>
        <th width="280px">Action</th>
    </tr>
    @foreach($data as $key => $value)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $value->cname }}</td>
        <td>{{ $value->active }}</td>
        <td>
            <form action="{{ route('category.destroy',$value->id) }}" method="POST">

            <a class="btn btn-primary" href="{{ route('category.edit',$value->id) }}">Edit</a>  
                @csrf
                @method('DELETE')
                
                <button type="submit" class="btn btn-danger">Delete</button>
                
            </form>
        </td>
    </tr>
    @endforeach
</table>

</div
@endsection