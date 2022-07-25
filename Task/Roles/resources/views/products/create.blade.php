@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
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

    <form method="post" action="/products" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="product_name">Name</label>
            <input type="text" name="pname" class="form-control" value="{{old('pname')}}" placeholder="Enter Name" id="pname">
        </div>
        <div class="form-group">
            <label for="category">Category</label>

            <select name="catid" class="form-control">
                <option value="">Select</option>
                @foreach($data as $key => $value)
                <option value="{{ $value->cname}}">{{ $value->cname}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">

            <input type="hidden" name="createby" value="{{Auth::user()->email}}" />
        </div>

        <div class="form-group">
            <label for="active">Active</label>
            <select class="form-control" name="active">
                <option value="">Select</option>
                <option name="active" value="yes">Yes</option>
                <option name="active" value="no">No</option>
            </select>
        </div>


        <div class="form-group">
            <label for="Image">Image</label>
            <input type="file" name="image" class="form-control">
            <span class="text-danger" id="imageval"></span>
        </div>

        <div class="form-group pt-2">
            <input class="btn btn-primary" type="submit" value="Submit">
            <a class="btn btn-warning" href="{{ route('products.index') }}"> Back</a>
        </div>


    </form>

</div>

@endsection