@extends('employees.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Employee</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
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

<form action="{{ route('employees.store') }}" method="POST">
    @csrf

    <div class="row">
        <!-- NAME FIELD -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter Employees name"
                    autocomplete="off">
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        <!--EMAIL FIELD-->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="Enter Employees Email"
                    autocomplete="off">
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>

                @endif

            </div>

        </div>

        <!--SALARY-->

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Salary</strong>
                <input type="text" name="salary" class="form-control" placeholder="Enter Employees salary"
                    autocomplete="off">
                @if ($errors->has('salary'))
                <span class="text-danger">{{ $errors->first('salary') }}</span>
                @endif
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City</strong>
                <input type="text" name="city" class="form-control" placeholder="Enter Employees city"
                    autocomplete="off">
                @if ($errors->has('city'))
                <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>State</strong>
                <input type="text" name="state" class="form-control" placeholder="Enter Employees state"
                    autocomplete="off">
                @if ($errors->has('state'))
                <span class="text-danger">{{ $errors->first('state') }}</span>
                @endif
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Country</strong>
                <input type="text" name="country" class="form-control" placeholder="Enter Employees Country"
                    autocomplete="off">
                @if ($errors->has('country'))
                <span class="text-danger">{{ $errors->first('country') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pincode</strong>
                <input type="text" name="pincode" class="form-control" placeholder="Enter Employees pincode"
                    autocomplete="off">
                @if ($errors->has('pincode'))
                <span class="text-danger">{{ $errors->first('pincode') }}</span>
                @endif
            </div>
        </div>

        <!--STATUS-->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group form-control">
                <strong>Status:</strong>
                <input type="radio" name="status" value="active" checked>Active
                <input type="radio" name="status" value="inactive">Inactive
                @if ($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>

</form>
@endsection