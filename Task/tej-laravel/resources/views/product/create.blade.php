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
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-danger" href="{{ route('product.index') }}" style="float:right";> Back</a>
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

<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" id="productcreateform">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="pname" class="form-control" value="{{old('pname')}}" placeholder="Enter Name" id="pname">
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong>Category</strong>
                <select name="catid" class="form-control">
                    <option value="">Select</option>
                        @foreach($data as $key => $value)
                            <option value="{{ $value->cname}}">{{ $value->cname}}</option>
                        @endforeach
                </select>

            @if ($errors->has('dropdown'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('dropdown') }}</strong>
                </span>
            @endif
                </select>
                <span class="text-danger"></span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <input type="hidden" name="createby" value="{{Auth::user()->email}}" />

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
        <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <br>
                        <strong>Select Image:</strong>
                        <input type="file" name="image" class="form-control">
                        <span class="text-danger" id="imageval"></span>
                    </div>
                </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
</div>
@endsection