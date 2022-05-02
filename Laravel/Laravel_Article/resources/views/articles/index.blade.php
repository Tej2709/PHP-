@extends('articles.layout')
 
@section('content')


    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Article application</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('articles.create') }}"> Create New Article</a>
                <a class="btn btn-link"> Inactive Data</a>
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
            <th>Slug</th>
            <th>Status</th>
            <th>Phone No    </th>
            <th width="180px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
             <td>{{ $value->name }}</td> 
            <td><a href="{{ route('articles.show',$value->id) }}">{{ (str_replace(' ','_', strtolower($value->name))) }}</a></td>
            <td>{{ $value->phno}}</td>
            <td>{{ $value->status}}</td>
           
            <td>
                <form action="{{ route('articles.destroy',$value->id) }}" method="POST">   
                    <!-- <a class="btn btn-info" href="{{ route('articles.show',$value->id) }}">Show</a>     -->
                    <a class="btn btn-primary" href="{{ route('articles.edit',$value->id) }}">Edit</a>   
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