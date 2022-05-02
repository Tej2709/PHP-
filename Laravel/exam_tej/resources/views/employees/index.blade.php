@extends('employees.layout')
 
@section('content')


    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employees application</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employees.create') }}"> Add Employee</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   {{ $datanew['newdata'] }}
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Salary</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
             <td>{{ $value->name }} 
            <td>{{ $value->email }}</td>
            <td>{{ $value->salary }}</td>
            <td>{{ $value->status }}</td>
            <!-- <td>{{ \Str::limit($value->description, 100) }}</td> -->
            <td>
                <form action="{{ route('employees.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('employees.show',$value->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('employees.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    
    {!! $data->links() !!}          
@endsection