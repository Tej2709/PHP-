@extends('layouts.app')

@section('content')
<html>
<head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script>
         $(document).ready(function() {
            $("#admineditform").validate({
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
            <h2>Edit admin </h2>
        </div>
        <div class="pull-right" style="float:right">
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
<form action="{{ route('admin.update', $admin->id) }}" method="POST" id="admineditform">
    @csrf
    @method('PUT')


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $admin->name }}" class="form-control"
                    placeholder="Enter Your Name" required autofocus="off" id="name">
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>

        

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{ $admin->email }}" class="form-control"
                    placeholder="Enter your email" autofocus="off" id="email">
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group form-control">
                <strong>Gender:</strong>
                <input type="radio" name="gender" value="male" {{ ($admin->gender=="male")? "checked" : "" }}>Male
                <input type="radio" name="gender" value="female" {{ $admin->gender=="female"? "checked" : "" }}>Female
                @if ($errors->has('gender'))
                <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group form-control">
                <strong>Hobbies:</strong><br>

                <input class="form-check-input" type="checkbox" name="hobbies[]" value="Cricket"
                    {{ in_array('Cricket', $admin->hobbies ) ? 'checked' : '' }}> Cricket

                <input class="form-check-input" type="checkbox" name="hobbies[]" value="Singing"
                    {{ in_array('Singing', $admin->hobbies ) ? 'checked' : '' }}> Singing

                <input class="form-check-input" type="checkbox" name="hobbies[]" value="Swimming"
                    {{ in_array('Swimming', $admin->hobbies ) ? 'checked' : '' }}> Swimming

                <input class="form-check-input" type="checkbox" name="hobbies[]" value="Shopping"
                    {{ in_array('Shopping', $admin->hobbies ) ? 'checked' : '' }}> Shopping

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
</html>
@endsection
