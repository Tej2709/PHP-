@extends('layout.app')
@section('content')

<div class="container">
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Admin</h2>
        </div>
        <div class="pull-right" style="float:right">
    
            <a class="btn btn-success" href="admin/create"> Add New Admin</a>
           
            <a class="btn btn-warning" href="category"> Category</a>
            <a class="btn btn-info" href="product"> Product</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
    <tr class="table-success">
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Hobbies</th>
     
        <th width="200px">Action</th>
        
    </tr>
    @foreach ($data as $key => $value)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $value->name }}</td>
        <td>{{ $value->email }}</td>
        <td>{{ $value->gender }}</td>
        <td>
            @foreach($value->hobbies as $values)
            {{$values}}
            @endforeach
        </td>
 
        <td>
            <form action="{{ route('admin.destroy',$value->id) }}" method="POST">
          
            <a class="btn btn-primary" href="{{ route('admin.edit',$value->id) }}">Edit</a>

                @csrf
                @method('DELETE')
                
                
                <button type="submit" class="btn btn-danger">Delete</button>
                
            </form>
        </td>
    </tr>
    @endforeach
</table>

</div>
@endsection