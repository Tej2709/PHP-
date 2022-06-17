@extends('layouts.app')
  
@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Category</h2>
        </div>
        <div class="pull-right" style="float:right">
            <a class="btn btn-danger" href="{{ route('category.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('category.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category Name:</strong>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">Selecte</option>
                <input type="text" name="cname" class="form-control" value="{{old('cname')}}" placeholder="Enter Category Name">
                @if ($errors->has('cname'))
                    <span class="text-danger">{{ $errors->first('cname') }}</span>
                @endif
            </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Active:</strong>               
                <select class="form-control" name="active">   
                    <option value="">Select</option>
                    <option name="active" value="yes">Yes</option>
                    <option name="active" value="no">No</option>
                </select>
                @if ($errors->has('active'))
                    <span class="text-danger">{{ $errors->first('active') }}</span>
                @endif
            </div>
        </div>       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
</div>
@endsection