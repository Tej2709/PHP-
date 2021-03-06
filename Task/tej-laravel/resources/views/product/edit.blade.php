@extends('layouts.app')

@section('content')
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script>
    
         $(document).ready(function() {
            $("#productcreateform").validate({
                rules: {
                    pname: {
                        required: true,
                        minlength:4,
                        maxlength: 20,
                    },
                },
                messages: {
                    pname: {
                        required: "Categoryname  is required",
                        minlength:"Categoryname must be at least 4 characters",
                        maxlength: "Name  be more than 20 characters"
                    },
                   
                }
            });
        });
    </script>
     <style>
    label.error {
         color: #dc3545;
         font-size: 14px;
    }
</style>
</head>
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Product</h2>
        </div>
        <div class="pull-right" style="float:right">
            <a class="btn btn-danger" href="{{ route('product.index') }}"> Back</a>
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

<form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="pname" value="{{ $product->pname }}" class="form-control"
                    placeholder="Product">
                @if ($errors->has('pname'))
                <span class="text-danger">{{ $errors->first('pname') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                <select class="form-control" name="category">
                    <option value="">Select</option>
                        @foreach($data as $key => $value)
                                 <option value="{{$value->cname}}" {{ $product->catid=="$value->cname"? "selected" : "" }}>{{$value->cname}}</option>
                        @endforeach
                   
                </select>   
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <input type="hidden" name="createby" value="{{Auth::user()->email}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Active:</strong>
                <select class="form-control" name="active">
                    <option value="">Select</option>
                    <option value="yes" {{ $product->active=="yes"? "selected" : "" }}>Yes</option>
                    <option value="no" {{ $product->active=="no"? "selected" : "" }}>No</option>
                </select>   
                    @if ($errors->has('active'))
                    <span class="text-danger">{{ $errors->first('active') }}</span>
                    @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Select Image:</strong>
                        <input type="file" name="image" class="form-control">
                        <span class="text-danger" id="imageval"></span>
                    </div>
                </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div> -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</div>
@endsection