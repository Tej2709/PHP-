@extends('layouts.app')

@section('content')
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
<form action="{{ route('admin.update', $admin->id) }}" method="POST">
    @csrf
    @method('PUT')


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $admin->name }}" class="form-control"
                    placeholder="Enter Your Name" required autofocus="off">
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>

        

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{ $admin->email }}" class="form-control"
                    placeholder="Enter your email" autofocus="off">
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
@endsection