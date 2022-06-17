
@extends('layouts.app')
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script>
         $(document).ready(function() {
            $("#admincreateform").validate({
                rules: {
                    name: {
                        required: true,
                        minlength:2,
                        maxlength: 20,
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 50
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                  
                   
                },
                messages: {
                    name: {
                        required: "Name  is required",
                        minlength:"Name must be at least 2 characters",
                        maxlength: "Name cannot be more than 20 characters"
                    },
                   
                    email: {
                        required: "Email is required",
                        email: "Email must be a valid email address",
                        maxlength: "Email cannot be more than 50 characters",
                    },
                   
                    password: {
                        required: "Password is required",
                        minlength: "Password must be at least 5 characters"
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
@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Admin</h2>
        </div>
        <div class="pull-left" style="float: right">
            <a class="btn btn-danger" href="{{ route('admin.index') }}"> Back</a>
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
   
<form action="{{ route('admin.store') }}" method="POST" id="admincreateform">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Name" id="name">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Enter Email" id="email">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" name="password" class="form-control" value="{{old('password')}}" placeholder="Enter password" id="password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>
      
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class=" form-control">
                <strong>Gender:</strong>
                
                <input type="radio" name="gender" value="male" checked value="{{old('gender')}}" id="gender">Male
                <input type="radio" name="gender" value="female" value="{{old('gender')}}" id="gender">Female
            
                @if ($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group form-control">
                        <br>
                        <strong id="hobbies">Hobbies:</strong><br>
                        <input type="checkbox" name="hobbies[]" value="Cricket" >Cricket<br>
                        <input type="checkbox" name="hobbies[]" value="Singing" >Singing<br>
                        <input type="checkbox" name="hobbies[]" value="Swimming" >Swimming<br>
                        <input type="checkbox" name="hobbies[]" value="Shopping" >Shopping<br>
                @if ($errors->has('hobbies'))
                    <span class="text-danger">{{ $errors->first('hobbies') }}</span>
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