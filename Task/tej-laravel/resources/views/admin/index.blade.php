@extends('layouts.app')
@section('content')

<div class="container">
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Admin</h2>
        </div>
        <div class="pull-right" style="float:right">
            @if(auth()->user()->usertype=="1")
            <a class="btn btn-success" href="admin/create"> Add New Admin</a>
            @endif
            <a class="btn btn-warning" href="category"> Category</a>
            <a class="btn btn-info" href="product"> Product</a>
            @if(auth()->user()->usertype=="1")
            @if(request()->has('trashed'))
            <a class="btn btn-danger" href="{{ route('admin.index')}}">Admins</a>
            @else
            <a class="btn btn-primary" href="{{ route('admin.index',['trashed'=>'users']) }}"> Deleted </a>
            @endif
            @endif
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
{{ $datanew['newdata'] }}
<table class="table table-bordered">
    <tr class="table-success">
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Hobbies</th>
        @if(auth()->user()->usertype=="1")
        <th width="200px">Action</th>
        @endif
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
        @if(auth()->user()->usertype=="1")
        <td>
            <form action="{{ route('admin.destroy',$value->id) }}" method="POST">
          @if(request()->has('trashed'))
          <a class="btn btn-info" href="{{ route('admin.restore',$value->id) }}">Restore</a>
          @else
          <a class="btn btn-primary" href="{{ route('admin.edit',$value->id) }}">Edit</a>
          @endif
            
            @if(request()->has('trashed'))
            <a class="btn btn-primary delete" href="{{ route('admin.fdelete',$value->id) }}" >Force Delete</a>
            @else
                @csrf
                @method('DELETE')
                
                
                <button type="submit" class="btn btn-danger delete" >Delete</button>
            @endif
               

        @endif
            </form>
        </td>
    </tr>
    @endforeach
</table>

</div>
@endsection

@section('scripts')
<script type="text/javascript">
    
    $document.ready(function() {
        $('.delete').click(function(e) {
            if(!confirm('Are you sure you want to delete this'))
            {
                e.preventDefault();
            }
        });
    });

    </script>
@endsection

