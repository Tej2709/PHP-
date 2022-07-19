@extends('admin.layouts.dashboard')

@section('content')

<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#categorycreateform").validate({
                rules: {
                    cname: {
                        required: true,
                        minlength: 4,
                        maxlength: 20,
                    },
                },
                messages: {
                    cname: {
                        required: "Categoryname  is required",
                        minlength: "Categoryname must be at least 4 characters",
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
                <h2>Add New Category</h2>
            </div>
            <a class="nav-link float-right" href="/category">
                <i class="fa-solid fa-circle-arrow-left"></i>
                <span>Back</span>
            </a>
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

    <form action="{{ route('category.store') }}" method="POST" id="categorycreateform">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category Name:</strong>

                    <input type="text" name="cname" class="form-control" value="{{old('cname')}}" placeholder="Enter Category Name" id="cname">
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